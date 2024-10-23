@extends('layouts.commonMaster')

@section('title', 'Modifier le Partenaire')

@section('layoutContent')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Modifier /</span> Partenaire
</h4>

<!-- Modifier le Partenaire Form -->
<div class="card">
    <div class="card-header">
        <h5>Modifier le Partenaire : <a href="{{ $partenaire->site }}" target="_blank">{{ $partenaire->nom }}</a></h5>
    </div>
    <div class="card-body">
        <form action="{{ route('partenaires.update', $partenaire->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Affichage du logo -->
            <div class="mb-3">
                <label for="logo" class="form-label">Logo</label>
                <div>
                    @if ($partenaire->logo)
                        <img src="{{ Storage::url($partenaire->logo) }}" alt="Logo" style="width: 100px; height: auto;" class="mb-2">
                    @else
                        <p>Aucun logo disponible.</p>
                    @endif
                </div>
                <input type="file" name="logo" class="form-control" id="logo" accept="image/*">
                @error('logo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" id="nom" value="{{ old('nom', $partenaire->nom) }}" required>
                @error('nom')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="">Sélectionner</option>
                    <option value="entreprise" {{ old('type', $partenaire->type) == 'entreprise' ? 'selected' : '' }}>Entreprise</option>
                    <option value="organisation" {{ old('type', $partenaire->type) == 'organisation' ? 'selected' : '' }}>Organisation</option>
                </select>
                @error('type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="contact" class="form-label">Contact</label>
                <input type="text" name="contact" class="form-control" id="contact" value="{{ old('contact', $partenaire->contact) }}" required>
                @error('contact')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="secteur_activite" class="form-label">Secteur d'Activité</label>
                <input type="text" name="secteur_activite" class="form-control" id="secteur_activite" value="{{ old('secteur_activite', $partenaire->secteur_activite) }}" required>
                @error('secteur_activite')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="site" class="form-label">Site Web</label>
                <input type="url" name="site" class="form-control" id="site" value="{{ old('site', $partenaire->site) }}" required>
                @error('site')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Mettre à Jour</button>
            <a href="{{ route('partenaires.index') }}" class="btn btn-secondary">Annuler</a> <!-- Bouton Annuler -->
        </form>
    </div>
</div>
<!--/ Modifier le Partenaire Form -->
@endsection
