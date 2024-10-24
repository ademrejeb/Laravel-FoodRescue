<?php

namespace App\Http\Controllers;

use App\Models\Benificaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BenificaireController extends Controller
{
    // Afficher la liste des bénéficiaires
    public function index()
{
    $benificaires = Benificaire::all();

    // Calculer la priorité pour chaque bénéficiaire
    foreach ($benificaires as $benificaire) {
        $benificaire->priority = $this->calculatePriority($benificaire);
    }

    // Trier les bénéficiaires par priorité
    $benificaires = $benificaires->sortByDesc('priority');

    return view('content.benificaires.BenificairesList', compact('benificaires'));
}


    // Afficher le formulaire de création
    public function create()
    {
        return view('content.benificaires.create');
    }

    // Enregistrer un nouveau bénéficiaire
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string',
            'tel' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'type' => 'required|string|in:Association,Organisation caritative',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
        ]);

        // Création du bénéficiaire
        $benificaire = new Benificaire($request->except('image'));

        // Gestion de l'image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public'); // Stockage de l'image
            $benificaire->image = $path; // Ajout du chemin de l'image
        }

        $benificaire->save();

        return redirect()->route('benificaires.index')->with('success', 'Bénéficiaire ajouté avec succès.');
    }

    // Afficher les détails d'un bénéficiaire spécifique
    public function show($id)
    {
        $benificaire = Benificaire::findOrFail($id);
        return view('content.benificaires.show', compact('benificaire'));
    }

    // Afficher le formulaire de modification
    public function edit($id)
    {
        $benificaire = Benificaire::findOrFail($id);
        return view('content.benificaires.edit', compact('benificaire'));
    }

    // Mettre à jour les informations d'un bénéficiaire
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string',
            'tel' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'type' => 'required|string|in:Association,Organisation caritative',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
        ]);

        // Trouver le bénéficiaire
        $benificaire = Benificaire::findOrFail($id);
        $benificaire->fill($request->except('image'));

        // Gestion de l'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si nécessaire
            if ($benificaire->image) {
                Storage::disk('public')->delete($benificaire->image);
            }

            // Stocker la nouvelle image
            $path = $request->file('image')->store('images', 'public');
            $benificaire->image = $path; // Mise à jour du chemin de l'image
        }

        $benificaire->save();

        return redirect()->route('benificaires.index')->with('success', 'Bénéficiaire mis à jour avec succès.');
    }

    // Supprimer un bénéficiaire
    public function destroy($id)
    {
        $benificaire = Benificaire::findOrFail($id);
        
        // Supprimer l'image si elle existe
        if ($benificaire->image) {
            Storage::disk('public')->delete($benificaire->image);
        }

        $benificaire->delete();

        return redirect()->route('benificaires.index')->with('success', 'Bénéficiaire supprimé avec succès.');
    }
    public function dashboard()
{
    $notifications = auth()->user()->notifications;

    return view('content.benificaires.dashboard', compact('notifications'));
}
public function calculatePriority(Benificaire $benificaire)
{
    // Initialiser la priorité à 0
    $priority = 0;

    // Critère 2: Taille de l'organisation (en fonction du nombre de demandes ou des besoins réguliers)
    $demandesCount = $benificaire->demandes->count();
    if ($demandesCount > 10) {
        $priority += 30; // Grande organisation, on ajoute 30
    } elseif ($demandesCount > 5) {
        $priority += 15; // Moyenne organisation, on ajoute 15
    }

    // Critère 3: Fréquence des besoins (demande quotidienne a plus de priorité)
    foreach ($benificaire->demandes as $demande) {
        if ($demande->frequence_besoin === 'quotidien') {
            $priority += 40; // Priorité forte pour besoins quotidiens
        } elseif ($demande->frequence_besoin === 'hebdomadaire') {
            $priority += 20; // Moins de priorité pour besoins hebdomadaires
        }
    }

    // Critère 4: Type du bénéficiaire (par exemple, organisation caritative peut avoir plus de priorité)
    if ($benificaire->type === 'Organisation caritative') {
        $priority += 25; // Organisation caritative, ajout de 25 points
    }

    // Retourner le score final de priorité
    return $priority;
}


}
