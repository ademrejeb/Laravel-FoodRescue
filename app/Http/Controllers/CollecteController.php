<?php

namespace App\Http\Controllers;

use App\Models\Collecte;
use App\Models\Donator; // Assurez-vous d'importer le modèle Donator
use Illuminate\Http\Request;

class CollecteController extends Controller
{
    public function index()
    {
        $collectes = Collecte::all();
        return view('collectes.index', compact('collectes'));
    }

    public function create()
    {
        $donateurs = Donator::all(); // Récupérer tous les donateurs
        return view('collectes.create', compact('donateurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_collecte' => 'required|date|after:today',
            'statut' => 'required|string|in:planifié,en cours,terminé',
            'quantite_collecte' => 'nullable|numeric|min:0', // Quantité facultative
            'donateur_id' => 'nullable|exists:donators,id'  // Vérifier si le donateur existe
        ]);

        // Créer la collecte avec les attributs requis
        Collecte::create($request->all());
        return redirect()->route('collectes.index')->with('success', 'Collecte créée avec succès.');
    }

    public function show(Collecte $collecte)
    {
        return view('collectes.show', compact('collecte'));
    }

    public function edit(Collecte $collecte)
    {
        $donateurs = Donator::all(); // Récupérer tous les donateurs pour la vue d'édition
        return view('collectes.edit', compact('collecte', 'donateurs'));
    }

    public function update(Request $request, Collecte $collecte)
    {
        $request->validate([
            'date_collecte' => 'required|date|after:today',
            'statut' => 'required|string|in:planifié,en cours,terminé',
            'donateur_id' => 'nullable|exists:donators,id'  // Vérifier si le donateur existe
        ], [
            'date_collecte.after' => 'La date de collecte doit être une date future.',
            'statut.in' => 'Le statut doit être l’un des suivants : planifié, en cours, terminé.',
        ]);

        $collecte->update($request->all());
        return redirect()->route('collectes.index')->with('success', 'Collecte mise à jour avec succès.');
    }

    public function destroy(Collecte $collecte)
    {
        $collecte->delete();
        return redirect()->route('collectes.index')->with('success', 'Collecte supprimée avec succès.');
    }
}
