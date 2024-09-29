@extends('layouts.contentNavbarLayout')

@section('title', 'Tables - Partenaires List')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Liste des Partenaires
</h4>

<!-- Partenaire Table -->
<div class="card">
  <h5 class="card-header">Table des Partenaires</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Type</th>
          <th>Contact</th>
          <th>Secteur d'Activité</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @if($partenaires->count())
          @foreach($partenaires as $partenaire)
          <tr>
            <td>{{ $partenaire->id }}</td>
            <td>{{ $partenaire->nom }}</td>
            <td>{{ $partenaire->type }}</td>
            <td>{{ $partenaire->contact }}</td>
            <td>{{ $partenaire->secteur_activite }}</td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('partenaires.show', $partenaire->id) }}"><i class="bx bx-show me-1"></i> Voir</a>
                  <a class="dropdown-item" href="{{ route('partenaires.edit', $partenaire->id) }}"><i class="bx bx-edit-alt me-1"></i> Modifier</a>
                  <form action="{{ route('partenaires.destroy', $partenaire->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item" onclick="return confirm('Confirmer la suppression?')"><i class="bx bx-trash me-1"></i> Supprimer</button>
                  </form>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        @else
          <tr>
            <td colspan="6" class="text-center">Aucun partenaire trouvé.</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
<!--/ Partenaire Table -->
@endsection
