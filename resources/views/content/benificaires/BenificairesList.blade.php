@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Benificaires List')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Benificaires List
</h4>

<!-- Benificaire Table -->
<div class="card">
  <h5 class="card-header">Benificaire Table</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Address</th>
          <th>Phone Number</th>
          <th>Email</th>
          <th>Type</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($benificaires as $benif)
        <tr>
          <td>{{ $benif->nom }}</td>
          <td>{{ $benif->addresse }}</td>
          <td>{{ $benif->tel }}</td>
          <td>{{ $benif->email }}</td>
          <td>{{ $benif->type }}</td>
          <td>
                <!-- Boutons pour les actions -->
                <a href="{{ route('benificaires.show', $benif->id) }}" class="btn btn-info">Détails</a>
                <a href="{{ route('benificaires.edit', $benif->id) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('benificaires.destroy', $benif->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!--/ Benificaire Table -->
@endsection
