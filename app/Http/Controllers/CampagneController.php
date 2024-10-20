<?php

namespace App\Http\Controllers;

use App\Models\Campagne;
use Illuminate\Http\Request;

class CampagneController extends Controller
{
    // Afficher la liste des campagnes
    public function index()
    {
        $campagnes = Campagne::withCount('contributions')->get();
        return view('content.campagne.index', compact('campagnes'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('content.campagne.create');
    }

    // Enregistrer une nouvelle campagne
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'objectif_quantite' => 'nullable|integer', // Ajoutez si nécessaire
            'statut' => 'required|string|in:active,inactive', // Assurez-vous que le statut est requis
        ]);

        Campagne::create($validatedData);

        return redirect()->route('campagnes.index')->with('success', 'Campagne ajoutée avec succès.');
    }

    // Afficher les détails d'une campagne
    public function show($id)
    {
        $campagne = Campagne::findOrFail($id);
        return view('content.campagne.show', compact('campagne'));
    }

    // Afficher le formulaire d'édition
    public function edit($id)
    {
        $campagne = Campagne::findOrFail($id);
        return view('content.campagne.edit', compact('campagne'));
    }

    // Mettre à jour une campagne
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'objectif_quantite' => 'nullable|integer',
            'statut' => 'required|string|in:active,inactive',
        ]);

        $campagne = Campagne::findOrFail($id);
        $campagne->update($validatedData);

        return redirect()->route('campagnes.index')->with('success', 'Campagne mise à jour avec succès.');
    }

    // Supprimer une campagne
    public function destroy($id)
    {
        $campagne = Campagne::findOrFail($id);
        $campagne->delete();

        return redirect()->route('campagnes.index')->with('success', 'Campagne supprimée avec succès.');
    }
}
