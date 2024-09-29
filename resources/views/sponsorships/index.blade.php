@extends('layouts.contentNavbarLayout')

@section('title', 'Tables - Sponsorship List')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Sponsorship List
</h4>

<!-- Sponsorship Table -->
<div class="card">
  <h5 class="card-header">Sponsorship Table</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Partenaire</th>
          <th>Type de Soutien</th>
          <th>Montant</th>
          <th>Date Début</th>
          <th>Date Fin</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($sponsorships as $sponsorship)
        <tr>
          <td>{{ $sponsorship->id }}</td>
          <td>{{ $sponsorship->partenaire->nom }}</td>
          <td>{{ ucfirst($sponsorship->type_soutien) }}</td>
          <td>{{ $sponsorship->montant ? number_format($sponsorship->montant, 2) : 'N/A' }}</td>
          <td>{{ \Carbon\Carbon::parse($sponsorship->date_debut)->format('d-m-Y') }}</td>
          <td>{{ \Carbon\Carbon::parse($sponsorship->date_fin)->format('d-m-Y') }}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('sponsorships.show', $sponsorship->id) }}">
                  <i class="bx bx-show me-1"></i> Voir
                </a>
                <a class="dropdown-item" href="{{ route('sponsorships.edit', $sponsorship->id) }}">
                  <i class="bx bx-edit-alt me-1"></i> Modifier
                </a>
                <form action="{{ route('sponsorships.destroy', $sponsorship->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="dropdown-item" onclick="return confirm('Confirmer la suppression?')">
                    <i class="bx bx-trash me-1"></i> Supprimer
                  </button>
                </form>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!--/ Sponsorship Table -->
@endsection
