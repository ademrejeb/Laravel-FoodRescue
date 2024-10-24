@extends('layouts.commonMaster')

@section('title', 'Détails du Partenaire')

@section('layoutContent')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Détails /</span> Partenaire: <a href="{{ $partenaire->site }}" target="_blank">{{ $partenaire->nom }}</a>
</h4>

<!-- Partenaire Details Card -->
<div class="card mb-4" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); animation: fadeIn 0.5s;">
    <div class="card-header" style="background-color: white; color: #333; padding: 15px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <a href="{{ $partenaire->site }}" target="_blank">
                    <img src="{{ asset('storage/' . $partenaire->logo) }}" alt="{{ $partenaire->nom }} Logo" style="width: 100px; height: auto;"> <!-- Ajustez la largeur ici -->
                </a>
                <h5 class="mb-0 ms-2" style="font-size: 1.2rem;">
                    <a href="{{ $partenaire->site }}" target="_blank">{{ $partenaire->nom }}</a>
                </h5>
            </div>
            <a href="{{ route('partenaires.index') }}" class="btn btn-secondary btn-sm">
                <i class="tf-icons bx bx-arrow-back"></i> Retour
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h6><strong>Type :</strong></h6>
                <p class="text-muted">{{ $partenaire->type }}</p>
            </div>
            <div class="col-md-6">
                <h6><strong>Contact :</strong></h6>
                <p class="text-muted">{{ $partenaire->contact }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h6><strong>Secteur d'Activité :</strong></h6>
                <p class="text-muted">{{ $partenaire->secteur_activite }}</p>
            </div>
        </div>

        <h5 class="mt-4">Sponsoring Associés</h5>
        @if($partenaire->sponsorships->count())
            <ul class="list-group">
                @foreach($partenaire->sponsorships as $sponsorship)
                    <li class="list-group-item d-flex justify-content-between align-items-center" style="transition: background-color 0.3s; cursor: pointer;" onmouseover="this.style.backgroundColor='#f1f1f1'" onmouseout="this.style.backgroundColor='white'">
                        <div>
                            <strong>{{ $sponsorship->type_soutien }}</strong><br>
                            <small>{{ $sponsorship->montant ?? 'N/A' }} - Du {{ $sponsorship->date_debut }} au {{ $sponsorship->date_fin }}</small>
                        </div>
                        <a href="{{ route('sponsorships.show', $sponsorship->id) }}" class="btn btn-outline-primary btn-sm">Voir Détails</a>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="alert alert-warning mt-3" role="alert">
                Aucun sponsoring associé.
            </div>
        @endif
    </div>
</div>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
</style>
@endsection
