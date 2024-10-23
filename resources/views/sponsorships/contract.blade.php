@extends('layouts.commonMaster')

@section('title', 'Contrat de Sponsoring')

@section('layoutContent')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Contrat /</span> Sponsoring
</h4>

<!-- Toasts pour les messages de succès et d'erreur -->
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" style="display: none;">
        <div class="d-flex">
            <div class="toast-body">
                Félicitations ! L'ajout de sponsor est fait avec succès !
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>

    <div id="errorToast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true" style="display: none;">
        <div class="d-flex">
            <div class="toast-body">
                Veuillez accepter les conditions pour continuer.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5>Contrat de Sponsoring pour {{ $sponsorship->partenaire->nom }}</h5>
    </div>
    <div class="card-body">
        <h6>Article 1 : Objet du Contrat</h6>
        <p>Ce contrat de sponsoring est conclu entre <strong>{{ $sponsorship->partenaire->nom }}</strong> (le "Sponsor") et <strong>Votre Entreprise</strong> (l'"Entreprise"). Le présent contrat a pour objet de définir les modalités de sponsoring afin de soutenir les activités de l'Entreprise par le biais d'un soutien <strong>{{ $sponsorship->type_soutien }}</strong>.</p>

        <h6>Article 2 : Durée du Contrat</h6>
        <p>Le contrat est conclu pour une durée de 
            <strong>
                {{ \Carbon\Carbon::parse($sponsorship->date_debut)->format('d/m/Y') }} à 
                {{ \Carbon\Carbon::parse($sponsorship->date_fin)->format('d/m/Y') }}
            </strong>.
        </p>

        <h6>Article 3 : Montant du Soutien</h6>
        <p>Le Sponsor s'engage à fournir un soutien financier et/ou matériel d'une valeur totale de 
            <strong>{{ $sponsorship->montant ? number_format($sponsorship->montant, 2) . ' €' : 'non spécifié' }}</strong>.
        </p>

        <h6>Article 4 : Obligations du Sponsor</h6>
        <p>Le Sponsor s'engage à :</p>
        <ul>
            <li>Respecter les conditions de financement établies dans ce contrat.</li>
            <li>Fournir les supports et documents nécessaires pour la promotion de l'Entreprise.</li>
            <li>Participer à toute activité de communication prévue dans le cadre du sponsoring.</li>
        </ul>

        <h6>Article 5 : Obligations de l'Entreprise</h6>
        <p>L'Entreprise s'engage à :</p>
        <ul>
            <li>Utiliser le soutien du Sponsor conformément aux termes de ce contrat.</li>
            <li>Reconnaître le Sponsor dans toutes les communications liées à l'événement sponsorisé.</li>
        </ul>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="acceptTerms">
            <label class="form-check-label" for="acceptTerms">J'ai tout lu et j'accepte tout</label>
        </div>
        
        <button type="button" class="btn btn-primary mt-3" onclick="submitContract()">Accepter le contrat</button>
    </div>
</div>

<!-- Inclusion des scripts nécessaires -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function showSuccessToast() {
        const toastEl = document.getElementById('successToast');
        const toast = new bootstrap.Toast(toastEl);
        toast.show();
        toastEl.style.display = 'block'; // Affiche le toast
    }

    function showErrorToast() {
        const toastEl = document.getElementById('errorToast');
        const toast = new bootstrap.Toast(toastEl);
        toast.show();
        toastEl.style.display = 'block'; // Affiche le toast
    }

    function submitContract() {
        if (!document.getElementById('acceptTerms').checked) {
            showErrorToast(); // Affiche le toast d'erreur
            return; // N'effectue aucune autre action
        }

        // Redirection vers la page de détails du sponsoring
        const sponsorshipId = {{ $sponsorship->id }}; // ID du sponsoring
        window.location.href = "{{ route('sponsorships.show', '') }}/" + sponsorshipId; // Ajustez l'URL pour utiliser la route Laravel
        showSuccessToast(); // Affiche le toast de succès seulement si la case est cochée
    }
</script>
@endsection
