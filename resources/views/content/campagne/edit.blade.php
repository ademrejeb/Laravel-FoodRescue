@extends('layouts.commonMaster')

@section('title', 'Modifier la Campagne')

@section('layoutContent')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Modifier la Campagne</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('campagnes.update', $campagne->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nom" class="form-label">Nom de la Campagne</label>
                <input type="text" name="nom" class="form-control" value="{{ old('nom', $campagne->nom) }}" required>
            </div>

            <div class="mb-3">
                <label for="date_debut" class="form-label">Date de Début</label>
                <input type="date" name="date_debut" class="form-control" value="{{ old('date_debut', $campagne->date_debut) }}" required>
            </div>

            <div class="mb-3">
                <label for="date_fin" class="form-label">Date de Fin</label>
                <input type="date" name="date_fin" class="form-control" value="{{ old('date_fin', $campagne->date_fin) }}" required>
            </div>

            <div class="mb-3">
                <label for="objectif_quantite" class="form-label">Objectif Quantité</label>
                <input type="number" name="objectif_quantite" class="form-control" value="{{ old('objectif_quantite', $campagne->objectif_quantite) }}">
            </div>

            <div class="mb-3">
                <label for="statut" class="form-label">Statut</label>
                <select name="statut" class="form-control" required>
                    <option value="active" {{ old('statut', $campagne->statut) == 'active' ? 'selected' : '' }}>Actif</option>
                    <option value="inactive" {{ old('statut', $campagne->statut) == 'inactive' ? 'selected' : '' }}>Inactif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('campagnes.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection
