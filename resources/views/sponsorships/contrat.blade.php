@extends('layouts.commonMaster')

@section('layoutContent')
    <div class="container my-5">
        <h1 class="mb-4 text-center">Contrat de Sponsoring</h1>

        <div class="card shadow border-light">
            <div class="card-header">
                <h5>Contrat de Sponsoring pour {{ $sponsorship->partenaire->nom }}</h5>
            </div>

            <div class="card-body">
                <p>Ce contrat de sponsoring est conclu entre <strong>{{ $sponsorship->partenaire->nom }}</strong> (le "Sponsor") et <strong>Foodrescue</strong> (l'"Entreprise").</p>

                <h6>Article 1 : Objet du Contrat</h6>
                <p>Le présent contrat a pour objet de définir les modalités de sponsoring entre le Sponsor et l'Entreprise, afin de soutenir les activités de l'Entreprise par le biais d'un soutien <strong>{{ $sponsorship->type_soutien }}</strong>.</p>

                <h6>Article 2 : Durée du Contrat</h6>
                <p>Le contrat est conclu pour une durée de 
                    <strong>
                        {{ \Carbon\Carbon::parse($sponsorship->date_debut)->format('d/m/Y') }} à 
                        {{ \Carbon\Carbon::parse($sponsorship->date_fin)->format('d/m/Y') }}
                    </strong>.
                </p>

                <h6>Article 3 : Montant du Soutien</h6>
                <p>Le Sponsor s'engage à fournir un soutien financier et/ou matériel d'une valeur totale de 
                    <strong>{{ $sponsorship->montant ?? 'non spécifié' }}</strong>.
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

                <!-- Ajout d'un cachet pour le nom Foodrescue à droite avec forme circulaire -->
                <div class="text-end my-4">
                    <h6>Cachet de l'Entreprise</h6>
                    <img src="{{ asset('images/cachet_foodrescue.png') }}" alt="Cachet Foodrescue" style="max-width: 200px; height: auto; border-radius: 50%; border: 2px solid #000;">
                </div>

                <!-- Bouton pour télécharger le contrat -->
                <button id="downloadContract" class="btn btn-primary mt-4">Télécharger le contrat</button>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('downloadContract').addEventListener('click', function() {
            const sponsorshipId = {{ $sponsorship->id }}; // Récupère l'ID du sponsoring
            const url = `/sponsorships/${sponsorshipId}/contrat`; // URL pour télécharger le PDF

            // Créer un élément <a> pour déclencher le téléchargement
            const a = document.createElement('a');
            a.href = url; // URL pour le téléchargement
            a.download = 'contrat_sponsoring.pdf'; // Nom du fichier à télécharger

            // Simuler un clic sur l'élément <a>
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a); // Supprimer l'élément après le téléchargement
        });
    </script>
@endsection
