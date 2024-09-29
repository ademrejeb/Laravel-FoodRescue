<?php

namespace App\Http\Controllers;

use App\Models\Collecte;
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
        return view('collectes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_collecte' => 'required|date',
            'statut' => 'required|string',
        ]);
        Collecte::create($request->all());
        return redirect()->route('collectes.index')->with('success', 'Collecte créée avec succès.');
    }

    public function show(Collecte $collecte)
    {
        return view('collectes.show', compact('collecte'));
    }

    public function edit(Collecte $collecte)
    {
        return view('collectes.edit', compact('collecte'));
    }

    public function update(Request $request, Collecte $collecte)
    {
        $request->validate([
            'date_collecte' => 'required|date',
            'statut' => 'required|string',
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
