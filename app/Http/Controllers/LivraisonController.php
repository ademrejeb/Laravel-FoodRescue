<?php

namespace App\Http\Controllers;

use App\Models\Livraison;
use App\Models\Collecte;
use Illuminate\Http\Request;

class LivraisonController extends Controller
{
    // Afficher toutes les livraisons
    public function index()
    {
        $livraisons = Livraison::with('collecte')->get();
        return view('livraisons.index', compact('livraisons'));
    }

    // Formulaire de création d'une livraison
    public function create()
    {
        $collectes = Collecte::all(); // Récupérer toutes les collectes
        return view('livraisons.create', compact('collectes'));
    }

    // Sauvegarder une nouvelle livraison
    public function store(Request $request)
    {
        $request->validate([
            'collecte_id' => 'required',
            'date_livraison' => 'required|date',
            'statut' => 'required|string',
        ]);

        Livraison::create($request->all());
        return redirect()->route('livraisons.index')->with('success', 'Livraison créée avec succès.');
    }

    // Afficher les détails d'une livraison spécifique
    public function show(Livraison $livraison)
    {
        return view('livraisons.show', compact('livraison'));
    }

    // Editer une livraison
    public function edit(Livraison $livraison)
    {
        $collectes = Collecte::all();
        return view('livraisons.edit', compact('livraison', 'collectes'));
    }

    // Mettre à jour une livraison
    public function update(Request $request, Livraison $livraison)
    {
        $request->validate([
            'collecte_id' => 'required',
            'date_livraison' => 'required|date',
            'statut' => 'required|string',
        ]);

        $livraison->update($request->all());
        return redirect()->route('livraisons.index')->with('success', 'Livraison mise à jour.');
    }

    // Supprimer une livraison
    public function destroy(Livraison $livraison)
    {
        $livraison->delete();
        return redirect()->route('livraisons.index')->with('success', 'Livraison supprimée.');
    }
}
