@extends('layouts.commonMaster')

@section('title', 'Gestion des Campagnes')

@section('layoutContent')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Tables /</span> Liste des Campagnes
</h4>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="mb-3">
    <a href="{{ route('campagnes.create') }}" class="btn btn-primary">Ajouter une Campagne</a>
</div>

<div class="card">
    <h5 class="card-header">Table des Campagnes</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Contributions Totales</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @if($campagnes->count())
                    @foreach ($campagnes as $campagne)
                        <tr>
                            <td>{{ $campagne->nom }}</td> <!-- Changement de 'title' à 'nom' -->
                            <td>{{ $campagne->date_debut }}</td> <!-- Changement de 'start_date' à 'date_debut' -->
                            <td>{{ $campagne->date_fin }}</td> <!-- Changement de 'end_date' à 'date_fin' -->
                            <td>{{ $campagne->contributions_count }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('campagnes.show', $campagne->id) }}">
                                            <i class="bx bx-show me-1"></i> Voir
                                        </a>
                                        <a class="dropdown-item" href="{{ route('campagnes.edit', $campagne->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Modifier
                                        </a>
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#confirmModal" data-id="{{ $campagne->id }}">
                                            <i class="bx bx-trash me-1"></i> Supprimer
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">Aucune campagne trouvée.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

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

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var confirmModal = document.getElementById('confirmModal');
    confirmModal.addEventListener('show.bs.modal', function (event) {
      var button = event.relatedTarget;
      var campagneId = button.getAttribute('data-id');
      var deleteForm = document.getElementById('deleteForm');
      var actionUrl = "{{ url('campagnes') }}/" + campagneId;
      deleteForm.setAttribute('action', actionUrl);
    });
  });
</script>

@endsection
