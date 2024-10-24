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
}
