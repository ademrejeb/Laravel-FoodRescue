<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;
use App\Models\Transporteur;
class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sortBy = $request->input('sort_by', 'type');  
        $orderBy = $request->input('order_by', 'asc'); 
    
        // Récupérer les véhicules triés
        $vehicules = Vehicule::orderBy($sortBy, $orderBy)->paginate(5);
    
        // Passer les variables de tri à la vue
        return view('vehicules.index', compact('vehicules', 'sortBy', 'orderBy'))
            ->with(request()->input('page'));
    }


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    // Récupérer les transporteurs depuis la base de données
    $Transporteur = Transporteur::all(); // Cela dépend de ton modèle "Transporteur"
    
    return view('vehicules.create', compact('Transporteur'));
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'type' => 'required|string',
        'capacite' => 'required|numeric',
        'disponibilite' => 'required|string',
        'transporteur_id' => 'required|exists:transporteurs,id' // Valide que l'ID du transporteur existe
    ]);

    // Crée le véhicule avec toutes les données, y compris transporteur_id
    Vehicule::create($request->all());

    return redirect()->route('vehicules.index')
                     ->with('success', 'Véhicule créé avec succès.');
}

   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicule $vehicule)
    {
        return view('vehicules.show',compact('vehicule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicule $vehicule)
    {
        return view('vehicules.edit',compact('vehicule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicule $vehicule)
    {
        $request->validate([
           'type' => 'required|string',       // 'type' doit être une chaîne de caractères
            'capacite' => 'required|numeric',  // 'capacite' doit être un nombre
            'disponibilite' => 'required|string', // 'disponibilite' 
        ]);

        $vehicule->update($request->all());

        return redirect()->route('vehicules.index')
                        ->with('success','Vehicule updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();

        return redirect()->route('vehicules.index')
                        ->with('success','Vehicule deleted successfully');
    }

   
}