@extends('layouts.commonMaster')

@section('title', 'Gestion des Livraisons')

@section('layoutContent')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Livraisons</h4>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('livraisons.create') }}" class="btn btn-primary mb-3">Ajouter une Livraison</a>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Liste des Livraisons</h5>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date de Livraison</th>
                            <th>Statut</th>
                            <th>Collecte</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($livraisons as $livraison)
                            <tr>
                                <td>{{ $livraison->date_livraison }}</td>
                                <td>{{ $livraison->statut }}</td>
                                <td>{{ $livraison->collecte->date_collecte }}</td>
                                <td>
                                    <a href="{{ route('livraisons.show', $livraison->id) }}" class="btn btn-info btn-sm">Voir</a>
                                    <a href="{{ route('livraisons.edit', $livraison->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                    <form action="{{ route('livraisons.destroy', $livraison->id) }}" method="POST" style="display:inline;">
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
