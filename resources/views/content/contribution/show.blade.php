@extends('layouts.commonMaster')

@section('layoutContent')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Détails de la Contribution</h4>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Contribution N°{{ $contribution->id }}</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Donateur:</strong>
                    <p>{{ $contribution->donateur->nom }}</p>
                </div>
                <div class="mb-3">
                    <strong>Campagne:</strong>
                    <p>{{ $contribution->campagne->nom }}</p>
                </div>
                <div class="mb-3">
                    <strong>Montant:</strong>
                    <p>{{ $contribution->montant }}</p>
                </div>
                <div class="mb-3">
                    <strong>Date:</strong>
                    <p>{{ $contribution->date }}</p>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('contributions.index') }}" class="btn btn-secondary">Retour à la liste des Contributions</a>
            </div>
        </div>
    </div>
</div>
@endsection
