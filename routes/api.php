<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Livraison;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route pour mettre à jour la localisation du livreur
Route::post('/livraison/update-localisation/{id}', function (Request $request, $id) {
    $request->validate([
        'localisation_livreur' => 'required|string', // Validation des coordonnées GPS
    ]);

    $livraison = Livraison::findOrFail($id);
    $livraison->localisation_livreur = $request->input('localisation_livreur');
    $livraison->save();

    return response()->json(['message' => 'Localisation mise à jour avec succès']);
});

// Route pour récupérer la localisation du livreur
Route::get('/livraison/{id}', function ($id) {
    $livraison = Livraison::findOrFail($id);
    return response()->json(['localisation_livreur' => $livraison->localisation_livreur]);
});
