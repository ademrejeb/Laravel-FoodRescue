@extends('layouts.commonMaster')

@section('title', 'Détails de la Campagne')

@section('layoutContent')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Détails de la Campagne</h4>

        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <strong>Nom de la Campagne:</strong>
                    <p>{{ $campagne->nom }}</p>
                </div>
                <div class="mb-3">
                    <strong>Date de Début:</strong>
                    <p>{{ $campagne->date_debut }}</p>
                </div>
                <div class="mb-3">
                    <strong>Date de Fin:</strong>
                    <p>{{ $campagne->date_fin }}</p>
                </div>
                <div class="mb-3">
                    <strong>Objectif Quantité:</strong>
                    <p>{{ $campagne->objectif_quantite }}</p>
                </div>
                <div class="mb-3">
                    <strong>Statut:</strong>
                    <p>{{ $campagne->statut }}</p>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('campagnes.index') }}" class="btn btn-secondary">Retour à la liste des Campagnes</a>
                <a href="{{ route('campagnes.edit', $campagne->id) }}" class="btn btn-primary">Modifier</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal" data-id="{{ $campagne->id }}">
                    Supprimer
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirmation de suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cette campagne ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script pour mettre à jour dynamiquement l'action du formulaire de suppression -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var confirmModal = document.getElementById('confirmModal');
        confirmModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Bouton qui a déclenché le modal
            var campagneId = button.getAttribute('data-id'); // Extraire l'ID de la campagne
            var deleteForm = document.getElementById('deleteForm');
            var actionUrl = "{{ url('campagnes') }}/" + campagneId; // Construire l'URL de suppression
            deleteForm.setAttribute('action', actionUrl); // Mettre à jour l'action du formulaire
        });
    });
</script>

@endsection
