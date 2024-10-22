@extends('layouts.commonMaster')

@section('title', 'Ajouter un Partenaire')

@section('layoutContent')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Ajouter /</span> Partenaire
</h4>

<!-- Ajouter le Partenaire Form -->
<div class="card">
    <div class="card-header">
        <h5>Ajouter un Partenaire</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('partenaires.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" id="nom" value="{{ old('nom') }}" required>
                @error('nom')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="">Sélectionner</option>
                    <option value="entreprise" {{ old('type') == 'entreprise' ? 'selected' : '' }}>Entreprise</option>
                    <option value="organisation" {{ old('type') == 'organisation' ? 'selected' : '' }}>Organisation</option>
                </select>
                @error('type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="contact" class="form-label">Contact</label>
                <input type="text" name="contact" class="form-control" id="contact" value="{{ old('contact') }}" required>
                @error('contact')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="secteur_activite" class="form-label">Secteur d'Activité</label>
                <input type="text" name="secteur_activite" class="form-control" id="secteur_activite" value="{{ old('secteur_activite') }}" required>
                @error('secteur_activite')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="logo" class="form-label">Logo</label>
                        <input type="file" name="logo" class="form-control" id="logo" required>
                        @error('logo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="site" class="form-label">Site Web</label>
                        <input type="url" name="site" class="form-control" id="site" value="{{ old('site') }}" required>
                        @error('site')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
            <a href="{{ route('partenaires.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
<!--/ Ajouter le Partenaire Form -->
@endsection
