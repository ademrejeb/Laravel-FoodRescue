<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PartenaireController extends Controller
{
    // Afficher la liste des partenaires
    public function index()
    {
        $partenaires = Partenaire::all();
        return view('partenaires.index', compact('partenaires'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('partenaires.create');
    }

    // Stocker un nouveau partenaire
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|string|in:entreprise,organisation',
           'contact' => 'required|regex:/^\+\d+$/|max:255',
            'secteur_activite' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'site' => 'required|url|regex:/^https:\/\//',

        ], [
          'contact.regex' => 'Le numéro de contact doit commencer par un "+" suivi de chiffres uniquement.',
          'site.regex' => 'Le lien doit commencer par https://.',
      ]
      );
         // Gestion du fichier logo
    $logoPath = null;
    if ($request->hasFile('logo')) {
        $logoPath = $request->file('logo')->store('logos', 'public');
    }

           // Création d'un nouveau partenaire
    $partenaire = new Partenaire();
    $partenaire->nom = $request->nom;
    $partenaire->type = $request->type;
    $partenaire->contact = $request->contact;
    $partenaire->secteur_activite = $request->secteur_activite;
    $partenaire->logo = $logoPath; // Utiliser la variable $logoPath ici
    $partenaire->site = $request->site;

    // Sauvegarder le partenaire
    $partenaire->save();

        return redirect()->route('partenaires.index')->with('success', 'Partenaire créé avec succès.');
    }

    // Afficher un partenaire spécifique
    // public function show(Partenaire $partenaire)
    // {
    //     return view('partenaires.show', compact('partenaire'));
    // }
    public function show($id)
    {
        // Récupérer le partenaire avec ses sponsors associés
        $partenaire = Partenaire::with('sponsorships')->find($id);

        // Vérifier si le partenaire existe
        if (!$partenaire) {
            return redirect()->route('partenaires.index')->with('error', 'Partenaire non trouvé');
        }

        // Afficher la vue avec les détails du partenaire
        return view('partenaires.show', compact('partenaire'));
    }

    // Afficher le formulaire d'édition
    public function edit(Partenaire $partenaire)
    {
        return view('partenaires.edit', compact('partenaire'));
    }

    // Mettre à jour un partenaire spécifique
    public function update(Request $request, Partenaire $partenaire)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'type' => 'required|in:entreprise,organisation',
        'contact' => 'required|regex:/^\+\d+$/|max:255',
        'secteur_activite' => 'required|string|max:255',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'site' => 'required|url|regex:/^https:\/\//',
    ], [
        'contact.regex' => 'Le numéro de contact doit commencer par un "+" suivi de chiffres uniquement.',
        'site.regex' => 'Le lien doit commencer par https://.',
    ]);

    // Mise à jour des attributs
    $partenaire->nom = $request->nom;
    $partenaire->type = $request->type;
    $partenaire->contact = $request->contact;
    $partenaire->secteur_activite = $request->secteur_activite;
    $partenaire->site = $request->site;

    // Gérer le logo
    if ($request->hasFile('logo')) {
        // Supprimer l'ancien logo si nécessaire
        if ($partenaire->logo) {
            Storage::disk('public')->delete($partenaire->logo);
        }

        // Stocker le nouveau logo
        $partenaire->logo = $request->file('logo')->store('logos', 'public');
    }

    // Sauvegarder les modifications
    $partenaire->save();

    return redirect()->route('partenaires.index')->with('success', 'Partenaire mis à jour avec succès.');
}


    // Supprimer un partenaire spécifique
    public function destroy(Partenaire $partenaire)
    {
        $partenaire->delete();
        return redirect()->route('partenaires.index')->with('success', 'Partenaire supprimé avec succès.');
    }

}
