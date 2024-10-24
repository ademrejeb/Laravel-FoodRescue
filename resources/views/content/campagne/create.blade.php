@extends('layouts.commonMaster')

@section('title', 'Ajouter une Campagne')

@section('layoutContent')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Ajouter une Campagne</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('campagnes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom de la Campagne</label>
                <input type="text" name="nom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="date_debut" class="form-label">Date de Début</label>
                <input type="date" name="date_debut" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="date_fin" class="form-label">Date de Fin</label>
                <input type="date" name="date_fin" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="objectif_quantite" class="form-label">Objectif Quantité</label>
                <input type="number" name="objectif_quantite" class="form-control" min="0">
            </div>

            <div class="mb-3">
                <label for="statut" class="form-label">Statut</label>
                <select name="statut" class="form-control" required>
                    <option value="active">Actif</option>
                    <option value="inactive">Inactif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
            <a href="{{ route('campagnes.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection
