@extends('layouts.commonMaster')

@section('layoutContent')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Collectes</h4>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('collectes.create') }}" class="btn btn-primary mb-3">Ajouter une Collecte</a>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Liste des Collectes</h5>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date de Collecte</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collectes as $collecte)
                            <tr>
                                <td>{{ $collecte->date_collecte }}</td>
                                <td>{{ $collecte->statut }}</td>
                                <td>
                                    <a href="{{ route('collectes.show', $collecte->id) }}" class="btn btn-info btn-sm">Voir</a>
                                    <a href="{{ route('collectes.edit', $collecte->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                    <form action="{{ route('collectes.destroy', $collecte->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
