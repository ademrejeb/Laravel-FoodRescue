<?php

namespace App\Http\Controllers;

use App\Models\Sponsorship;
use App\Models\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;

class SponsorshipController extends Controller
{
    // Afficher la liste des sponsorships
    public function index()
    {
        $sponsorships = Sponsorship::with('partenaire')->get();
        return view('sponsorships.index', compact('sponsorships'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        $partenaires = Partenaire::all();
        return view('sponsorships.create', compact('partenaires'));
    }

    // Stocker un nouveau sponsorship
    public function store(Request $request)
    {
        $request->validate([
            'partenaire_id' => 'required|exists:partenaires,id',
            'type_soutien' => 'required|string|in:financier,matériel,service',
            'montant' => 'nullable|numeric',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
        ]);
    
        // Créer le sponsorship
        $sponsorship = Sponsorship::create($request->all());
    
        // Rediriger vers la page de contrat avec l'ID du sponsorship
        return redirect()->route('sponsorships.contract', $sponsorship->id)->with('success', 'Sponsoring créé avec succès.');
    }

    // Afficher le contrat pour un sponsorship spécifique
    public function contract($id)
    {
        $sponsorship = Sponsorship::findOrFail($id);
        return view('sponsorships.contract', compact('sponsorship'));
    }

    // Afficher un sponsorship spécifique
    public function show($id)
    {
        $sponsorship = Sponsorship::with('partenaire')->findOrFail($id);
        return view('sponsorships.show', compact('sponsorship'));
    }

    // Afficher le formulaire d'édition
    public function edit(Sponsorship $sponsorship)
    {
        $partenaires = Partenaire::all();
        return view('sponsorships.edit', compact('sponsorship', 'partenaires'));
    }

    // Mettre à jour un sponsorship spécifique
    public function update(Request $request, Sponsorship $sponsorship)
    {
        $request->validate([
            'partenaire_id' => 'required|exists:partenaires,id',
            'type_soutien' => 'required|string|in:financier,matériel,service',
            'montant' => 'nullable|numeric',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
        ]);

        $sponsorship->update($request->all());

        return redirect()->route('sponsorships.index')->with('success', 'Sponsoring mis à jour avec succès.');
    }

    // Supprimer un sponsorship spécifique
    public function destroy(Sponsorship $sponsorship)
    {
        $sponsorship->delete();
        return redirect()->route('sponsorships.index')->with('success', 'Sponsoring supprimé avec succès.');
    }

    // Statistiques des sponsorships
    public function statistiques()
    {
        $totalContributions = Sponsorship::sum('montant') ?? 0;
        $moyenneContributions = Sponsorship::avg('montant') ?? 0;

        $contributionsParType = Sponsorship::select('type_soutien')
            ->selectRaw('SUM(montant) as total')
            ->groupBy('type_soutien')
            ->get();

        $topPartenaires = Partenaire::withCount(['sponsorships as total_contributions' => function($query) {
                $query->select(DB::raw("SUM(montant)"));
            }])
            ->orderBy('total_contributions', 'desc')
            ->take(5)
            ->get();

        $contributionsRecentes = Sponsorship::orderBy('date_debut', 'desc')
            ->take(5)
            ->get();

        return view('sponsorships.statistiques', [
            'total_contributions' => $totalContributions,
            'moyenne_contributions' => $moyenneContributions,
            'contributions_par_type' => $contributionsParType,
            'top_partenaires' => $topPartenaires,
            'contributions_recentes' => $contributionsRecentes,
        ]);
    }

    // Analyse des contributions par période
    public function analyseParPeriode()
    {
        $contributionsParMois = Sponsorship::select(DB::raw("DATE_FORMAT(date_debut, '%Y-%m') as mois"), DB::raw("SUM(montant) as total"))
            ->groupBy('mois')
            ->orderBy('mois', 'asc')
            ->get();

        $mois = $contributionsParMois->pluck('mois');
        $totaux = $contributionsParMois->pluck('total');

        return view('analyse_par_periode', compact('mois', 'totaux'));
    }

    // Signer un contrat
    public function signContrat(Request $request, $id)
    {
        $sponsorship = Sponsorship::findOrFail($id);
        
        // Validation de la signature
        $request->validate([
            'signature_sponsor' => 'required|string',
        ]);
        
        if ($request->has('signature_sponsor')) {
            $signature = $request->input('signature_sponsor');
            
            // Supprimer le préfixe 'data:image/png;base64,' avant de sauvegarder
            $signature = str_replace('data:image/png;base64,', '', $signature);
            $signature = str_replace(' ', '+', $signature);

            // Sauvegarder la signature dans la base de données
            $sponsorship->signature = $signature;
            $sponsorship->save();
        }

        return redirect()->route('sponsorships.show', $id)->with('success', 'Contrat signé avec succès.');
    }

    // Afficher le contrat signé
    public function showContrat($id)
    {
        $sponsorship = Sponsorship::with('partenaire')->findOrFail($id);
        return view('sponsorships.contrat', compact('sponsorship'));
    }

    // Télécharger le contrat au format PDF
    public function downloadContract($id)
    {
        $sponsorship = Sponsorship::findOrFail($id);

        // Instancier Dompdf
        $dompdf = new Dompdf();

        // Charger la vue du contrat
        $html = view('sponsorships.contrat', compact('sponsorship'))->render();

        // Charger le HTML dans Dompdf
        $dompdf->loadHtml($html);

        // (Optionnel) Configurer le format de papier et l'orientation
        $dompdf->setPaper('A4', 'portrait');

        // Rendre le HTML en PDF
        $dompdf->render();

        // Télécharger le fichier PDF
        return $dompdf->stream('contrat_sponsoring.pdf', ['Attachment' => true]);
    }
    
}
