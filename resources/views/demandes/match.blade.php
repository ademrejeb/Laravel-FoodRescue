@extends('layouts.commonMaster')

@section('title', 'Matching Demandes')

@section('layoutContent')
    <div class="container">
        <h2>Résultats de correspondance pour la Demande #{{ $demande->id }}</h2>

        <h4>Produits disponibles en stock</h4>
        <div class="row">
            @if($produitsEnStock->count() > 0)
                @foreach($produitsEnStock as $produit)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $produit->image) }}" class="card-img-top" alt="{{ $produit->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $produit->name }}</h5>
                                <p class="card-text">
    Quantité disponible : {{ $produit->quantity }}<br>
    Date d'expiration : {{ \Carbon\Carbon::parse($produit->expiration_date)->format('d/m/Y') }}
</p>
                                <a href="{{ route('products.show', $produit->id) }}" class="btn btn-primary">Détails</a> <!-- Changez le lien si nécessaire -->
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Aucun produit disponible en stock pour cette demande.</p>
            @endif
        </div>
    </div>
@endsection
