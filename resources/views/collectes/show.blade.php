@extends('layouts.commonMaster')

@section('layoutContent')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Détails de la Collecte</h4>

        <div class="card">
            <div class="card-body">
                <h5>Date de Collecte: <strong>{{ $collecte->date_collecte }}</strong></h5>
                <h5>Statut: <strong>{{ $collecte->statut }}</strong></h5>
            </div>
        </div>

        <a href="{{ route('collectes.edit', $collecte->id) }}" class="btn btn-warning mt-3">Modifier</a>
        <form action="{{ route('collectes.destroy', $collecte->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-3">Supprimer</button>
        </form>
        <a href="{{ route('collectes.index') }}" class="btn btn-secondary mt-3">Retour à la Liste</a>
    </div>
</div>
@endsection