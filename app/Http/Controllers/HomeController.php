<?php

namespace App\Http\Controllers;

use App\Models\Benificaire;
use App\Models\Product;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('stock_status', 'disponible')->get();
        $benificaires = Benificaire::latest()->take(5)->get();

        // Créer une instance de Guzzle Client
        $client = new Client();

        // Récupérer les coordonnées pour chaque bénéficiaire
        foreach ($benificaires as $benif) {
            $address = urlencode($benif->adresse);
            try {
                // Faire une requête GET à l'API Nominatim avec un User-Agent
                $response = $client->request('GET', "https://nominatim.openstreetmap.org/search?format=json&q={$address}", [
                    'headers' => [
                        'User-Agent' => 'Laravel' // Change ceci par le nom de ton application
                    ]
                ]);

                $data = json_decode($response->getBody(), true);
                if (!empty($data)) {
                    $benif->latitude = $data[0]['lat'];
                    $benif->longitude = $data[0]['lon'];
                } else {
                    // Valeurs par défaut si l'adresse n'est pas trouvée
                    $benif->latitude = 0;
                    $benif->longitude = 0;
                }
            } catch (\Exception $e) {
                // Gérer l'exception, par exemple, en définissant des valeurs par défaut
                $benif->latitude = 0;
                $benif->longitude = 0;
            }
        }

        return view('frontend.main', compact('products', 'benificaires'));
    }
}
