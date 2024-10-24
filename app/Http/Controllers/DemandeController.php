<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Benificaire;
use App\Models\Product;
use App\Notifications\DemandeMatched;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    public function index()
    {
        $demandes = Demande::orderBy('priorite', 'desc')->get();
        return view('demandes.index', compact('demandes'));
    }

    public function create()
    {
        $benificaires = Benificaire::all();
        return view('demandes.create', compact('benificaires'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_produit' => 'required|string',
            'quantite' => 'required|integer',
            'frequence_besoin' => 'required|in:quotidien,hebdomadaire,mensuel',
            'statut' => 'required|in:en attente,satisfait',
            'benificaire_id' => 'required|exists:benificaires,id',
        ]);

        // Créez la demande
        $demande = Demande::create($request->all());

        // Calcul de la priorité
        $this->calculerPriorite($demande);

        return redirect()->route('demandes.index')->with('success', 'Demande créée avec succès.');
    }

    public function show(Demande $demande)
    {
        return view('demandes.show', compact('demande'));
    }

    public function edit(Demande $demande)
    {
        $benificaires = Benificaire::all();
        return view('demandes.edit', compact('demande', 'benificaires'));
    }

    public function update(Request $request, Demande $demande)
    {
        $request->validate([
            'type_produit' => 'required|string',
            'quantite' => 'required|integer',
            'frequence_besoin' => 'required|in:quotidien,hebdomadaire,mensuel',
            'statut' => 'required|in:en attente,satisfait',
            'benificaire_id' => 'required|exists:benificaires,id',
        ]);

        // Mettez à jour la demande avec les nouvelles données
        $demande->update($request->all());

        // Recalculez la priorité après mise à jour
        $this->calculerPriorite($demande);

        return redirect()->route('demandes.index')->with('success', 'Demande mise à jour avec succès.');
    }

    public function destroy(Demande $demande)
    {
        $demande->delete();
        return redirect()->route('demandes.index')->with('success', 'Demande supprimée avec succès.');
    }

    public function checkMatches($demandeId)
    {
        $demande = Demande::find($demandeId);

        $typeProduit = $demande->type_produit;
        $quantiteDemande = $demande->quantite;

        $produitsEnStock = Product::where('name', $typeProduit)
            ->where('quantity', '>=', $quantiteDemande)
            ->where('stock_status', 'disponible')
            ->get();

        // Envoyer une notification si des produits correspondants sont trouvés
        if ($produitsEnStock->count() > 0) {
            $demande->benificaire->notify(new DemandeMatched($demande));
        }

        return view('demandes.match', compact('demande', 'produitsEnStock'));
    }

    public function calculerPriorite(Demande $demande)
    {
        $priorite = 0;

        // Facteur 1: Urgence (exemple: "quotidien" a plus de priorité)
        if ($demande->frequence_besoin == 'quotidien') {
            $priorite += 3;
        } elseif ($demande->frequence_besoin == 'hebdomadaire') {
            $priorite += 2;
        } else {
            $priorite += 1;
        }

        // Facteur 2: Type de bénéficiaire
        if ($demande->benificaire->type == 'Organisation caritative') {
            $priorite += 5;
        } elseif ($demande->benificaire->type == 'Association') {
            $priorite += 1;
        }

        // Facteur 3: Type de produit
        if (in_array($demande->type_produit, ['Lait', 'Riz', 'Eau'])) {
            $priorite += 3;
        }

        // Sauvegarde de la priorité
        $demande->priorite = $priorite;
        $demande->save();
    }
}
