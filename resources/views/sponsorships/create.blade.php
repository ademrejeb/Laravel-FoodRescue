@extends('layouts.commonMaster')
@section('title', 'Ajouter un Sponsoring')

@section('layoutContent')
<h4 class="py-3 mb-4">
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>

  <span class="text-muted fw-light">Ajouter /</span> Sponsoring
</h4>

<div class="card">
    <div class="card-header">
        <h5>Ajouter un Sponsoring</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('sponsorships.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Partenaire Select Field -->
            <div class="mb-3">
                <label for="partenaire_id" class="form-label">Partenaire</label>
                <select name="partenaire_id" id="partenaire_id" class="form-control" required>
                    <option value="">Sélectionner</option>
                    @foreach($partenaires as $partenaire)
                        <option value="{{ $partenaire->id }}" {{ old('partenaire_id') == $partenaire->id ? 'selected' : '' }}>{{ $partenaire->nom }}</option>
                    @endforeach
                </select>
                @error('partenaire_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Other Fields (Type de Soutien, Montant, etc.) -->
            <div class="mb-3">
                <label for="type_soutien" class="form-label">Type de Soutien</label>
                <select name="type_soutien" id="type_soutien" class="form-control" required>
                    <option value="">Sélectionner</option>
                    <option value="financier" {{ old('type_soutien') == 'financier' ? 'selected' : '' }}>Financier</option>
                    <option value="matériel" {{ old('type_soutien') == 'matériel' ? 'selected' : '' }}>Matériel</option>
                    <option value="service" {{ old('type_soutien') == 'service' ? 'selected' : '' }}>Service</option>
                </select>
                @error('type_soutien')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="montant" class="form-label">Montant</label>
                <input type="number" step="0.01" name="montant" class="form-control" id="montant" value="{{ old('montant') }}">
                @error('montant')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="date_debut" class="form-label">Date de Début</label>
                <input type="date" name="date_debut" class="form-control" id="date_debut" value="{{ old('date_debut') }}" required>
                @error('date_debut')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="date_fin" class="form-label">Date de Fin</label>
                <input type="date" name="date_fin" class="form-control" id="date_fin" value="{{ old('date_fin') }}" required>
                @error('date_fin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

       

            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>
</div>

<!-- Script pour la signature -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/2.3.2/signature_pad.min.js"></script>
<script>
    // Initialisation du pad de signature
    const canvas = document.getElementById('signature-canvas');
    const signaturePad = new SignaturePad(canvas);

    // Effacer la signature
    document.getElementById('clear-signature').addEventListener('click', function() {
        signaturePad.clear();
    });

    // Capture de la signature à l'envoi du formulaire
    document.querySelector('form').addEventListener('submit', function(event) {
        if (signaturePad.isEmpty()) {
            alert("Veuillez signer avant de soumettre le formulaire.");
            event.preventDefault(); // Empêche l'envoi si pas de signature
        } else {
            const dataURL = signaturePad.toDataURL();
            document.getElementById('signature-input').value = dataURL; // Stockage dans le champ caché
        }
    });
</script>
@endsection
