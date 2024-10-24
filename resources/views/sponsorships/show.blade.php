@extends('layouts.commonMaster')

@section('layoutContent')
    <div class="container my-5">
        <h1 class="mb-4 text-center">Détails du Sponsoring</h1>
        
        <div class="card shadow border-light">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Sponsoring #{{ $sponsorship->id }}</h5>
                <!-- Bouton de retour à la liste des sponsors en haut à droite -->
                <a href="{{ route('sponsorships.index') }}" class="btn btn-outline-primary">
                    <i class="tf-icons bx bx-arrow-back"></i> Retour 
                </a>
            </div>
            
            <div class="card-body">
                <div class="mb-3">
                    <strong>Partenaire :</strong>
                    <span class="text-muted">{{ $sponsorship->partenaire->nom ?? 'N/A' }}</span>
                </div>
                
                <div class="mb-3">
                    <strong>Type de Soutien :</strong>
                    <span class="text-muted">{{ ucfirst($sponsorship->type_soutien) ?? 'N/A' }}</span>
                </div>
                
                <div class="mb-3">
                    <strong>Montant :</strong>
                    <span class="text-muted">{{ $sponsorship->montant ? number_format($sponsorship->montant, 2) : 'N/A' }}</span>
                </div>
                
                <div class="mb-3">
                    <strong>Date de Début :</strong>
                    <span class="text-muted">{{ \Carbon\Carbon::parse($sponsorship->date_debut)->format('d-m-Y') ?? 'N/A' }}</span>
                </div>
                
                <div class="mb-3">
                    <strong>Date de Fin :</strong>
                    <span class="text-muted">{{ \Carbon\Carbon::parse($sponsorship->date_fin)->format('d-m-Y') ?? 'N/A' }}</span>
                </div>

                <!-- Bouton pour voir le contrat avec signature -->
                <div>
                    <strong>Contrat :</strong>
                    <a href="{{ route('sponsorships.showContrat', $sponsorship->id) }}" class="btn btn-outline-success mt-2">
                        <i class="tf-icons bx bx-file"></i> Voir le Contrat
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
