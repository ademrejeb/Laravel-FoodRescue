<?php

namespace App\Http\Controllers;

use App\Models\Donator;
use App\Models\Campagne;
use App\Models\Contributions;
use Illuminate\Http\Request;

class ContributionController extends Controller
{
    // Afficher la liste des contributions
    public function index()
    {
        $contributions = Contributions::with(['donateur', 'campagne'])->get(); // Correction de l'association
        return view('content.contribution.index', compact('contributions'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        $donateurs = Donator::all();
        $campagnes = Campagne::all();
        return view('content.contribution.create', compact('donateurs', 'campagnes'));
    }

    // Enregistrer une nouvelle contribution
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'quantite' => 'required', // Changement de 'amount' à 'quantite'
            'date' => 'required|date',
            'donateur_id' => 'required|exists:donators,id',
            'campagne_id' => 'required|exists:campagnes,id',
        ]);
        Contributions::create($validatedData);

        return redirect()->route('contributions.index')->with('success', 'Contribution ajoutée avec succès.');
    }

    // Afficher les détails d'une contribution
    public function show($id)
    {
        $contribution = Contributions::with(['donateur', 'campagne'])->findOrFail($id);
        return view('content.contribution.show', compact('contribution'));
    }

    // Afficher le formulaire d'édition
    public function edit($id)
    {
        $contribution = Contributions::findOrFail($id);
        $donateurs = Donator::all();
        $campagnes = Campagne::all();
        return view('content.contribution.edit', compact('contribution', 'donateurs', 'campagnes'));
    }

    // Mettre à jour une contribution
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'quantite' => 'required|numeric',
            'date' => 'required|date',
            'donateur_id' => 'required|exists:donators,id',
            'campagne_id' => 'required|exists:campagnes,id',
        ]);

        $contribution = Contributions::findOrFail($id);
        $contribution->update($validatedData);

        return redirect()->route('contributions.index')->with('success', 'Contribution mise à jour avec succès.');
    }

    // Supprimer une contribution
    public function destroy($id)
    {
        $contribution = Contributions::findOrFail($id);
        $contribution->delete();

        return redirect()->route('contributions.index')->with('success', 'Contribution supprimée avec succès.');
    }
}
