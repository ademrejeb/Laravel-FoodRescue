<?php

namespace App\Http\Controllers;

use App\Models\RecurringCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ThankYouMail;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;

class RecurringCollectionController extends Controller
{
    public function create()
    {
        return view('recurring_collections.create');
    }

    public function store(Request $request)
    {
        // Valider les données d'entrée
        $request->validate([
            'frequency' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string|regex:/^\+?[0-9]{7,15}$/', // Numéro de téléphone au format international
            'comments' => 'nullable|string|profanity',
            'contact_preference' => 'required|string',
        ], [
            'comments.profanity' => 'Your comments contain inappropriate language. Please remove any offensive words.',
        ]);

        // Créer une nouvelle collection récurrente
        $recurringCollection = RecurringCollection::create([
            'user_id' => Auth::id(),
            'frequency' => $request->frequency,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'comments' => $request->comments,
            'contact_preference' => $request->contact_preference,
        ]);

        // Envoi de la vérification selon la préférence de contact
        if ($request->contact_preference === 'email') {
            // Envoi d'un e-mail de remerciement
            Mail::to($request->email)->send(new ThankYouMail($request->name, $request->email));
        } elseif (in_array($request->contact_preference, ['phone', 'sms'])) {
            // Envoi du SMS de remerciement avec Twilio
            $this->sendSmsThankYou($request->phone);
        }

        return redirect()->route('home')->with('success', 'Inscription réussie! Un message de remerciement vous a été envoyé par ' . ($request->contact_preference === 'email' ? 'e-mail' : 'SMS') . '.');
    }

    // Fonction pour envoyer un SMS de remerciement avec Twilio
    private function sendSmsThankYou($phone)
    {
        try {
            // Récupérer les identifiants Twilio du fichier .env
            $sid = env('TWILIO_SID');
            $token = env('TWILIO_AUTH_TOKEN');
            $twilioNumber = env('TWILIO_PHONE_NUMBER');

            // Créer le client Twilio
            $client = new Client($sid, $token);

            // Envoi du message SMS de remerciement
            $client->messages->create(
                $phone, // Numéro du destinataire
                [
                    'from' => $twilioNumber, // Numéro Twilio
                    'body' => 'Merci pour votre inscription chez nous, ' . Auth::user()->name . ' ! Nous apprécions votre engagement.',
                ]
            );

            Log::info('SMS de remerciement envoyé avec succès à ' . $phone);
        } catch (\Exception $e) {
            // Log en cas d'erreur lors de l'envoi du SMS
            Log::error('Erreur lors de l\'envoi du SMS : ' . $e->getMessage());
        }
    }
}
