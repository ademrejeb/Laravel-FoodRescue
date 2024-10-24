@extends('layouts.commonMaster')

@section('title', 'Matching Demandes')

@section('layoutContent')
    <div class="container">
        <h2>Résultats de correspondance pour la Demande #{{ $demande->id }}</h2>

        <h4>Produits disponibles en stock</h4>
        @if($produitsEnStock->count() > 0)
            <ul>
                @foreach($produitsEnStock as $produit)
                    <li>{{ $produit->name }} - Quantité disponible : {{ $produit->quantity }} (Expiration : {{ $produit->expiration_date }})</li>
                @endforeach
            </ul>
        @else
            <p>Aucun produit disponible en stock pour cette demande.</p>
        @endif
    </div>
@endsection
