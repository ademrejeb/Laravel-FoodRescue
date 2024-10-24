@extends('layouts.commonMaster')

@section('title', 'Modifier la Contribution')

@section('layoutContent')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Modifier la Contribution</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contributions.update', $contribution->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="quantite" class="form-label">Quantité</label>
                <input type="number" name="quantite" class="form-control" value="{{ old('quantite', $contribution->quantite) }}" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" class="form-control" value="{{ old('date', $contribution->date) }}" required>
            </div>

            <div class="mb-3">
                <label for="donateur_id" class="form-label">Donateur</label>
                <select name="donateur_id" class="form-select" required>
                    @foreach ($donateurs as $donateur)
                        <option value="{{ $donateur->id }}" {{ $donateur->id == $contribution->donateur_id ? 'selected' : '' }}>
                            {{ $donateur->nom }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="campagne_id" class="form-label">Campagne</label>
                <select name="campagne_id" class="form-select" required>
                    @foreach ($campagnes as $campagne)
                        <option value="{{ $campagne->id }}" {{ $campagne->id == $contribution->campagne_id ? 'selected' : '' }}>
                            {{ $campagne->nom }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour la Contribution</button>
            <a href="{{ route('contributions.index') }}" class="btn btn-secondary">Retour à la liste</a>
        </form>
    </div>
</div>
@endsection
