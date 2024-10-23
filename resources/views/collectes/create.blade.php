@extends('layouts.commonMaster')

@section('layoutContent')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Créer une Collecte</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('collectes.store') }}">
            @csrf
            <div class="mb-3">
                <label for="date_collecte" class="form-label">Date de Collecte</label>
                <input type="date" class="form-control" id="date_collecte" name="date_collecte" value="{{ old('date_collecte') }}" required>
            </div>
            <div class="mb-3">
                <label for="statut" class="form-label">Statut</label>
                <select class="form-select" id="statut" name="statut" required>
                    <option value="planifié" {{ old('statut') == 'planifié' ? 'selected' : '' }}>Planifié</option>
                    <option value="en cours" {{ old('statut') == 'en cours' ? 'selected' : '' }}>En Cours</option>
                    <option value="terminé" {{ old('statut') == 'terminé' ? 'selected' : '' }}>Terminé</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="quantite_collecte" class="form-label">Quantité Collectée (en kg)</label>
                <input type="number" step="0.01" class="form-control" id="quantite_collecte" name="quantite_collecte" value="{{ old('quantite_collecte') }}" required>
            </div>
            <div class="mb-3">
                <label for="donateur_id" class="form-label">Commerce Donateur</label>
                <select class="form-select" id="donateur_id" name="donateur_id" required>
                    <option value="">Sélectionner un donateur</option>
                    @foreach ($donateurs as $donateur)
                        <option value="{{ $donateur->id }}" {{ old('donateur_id') == $donateur->id ? 'selected' : '' }}>{{ $donateur->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
            <a href="{{ route('collectes.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection
