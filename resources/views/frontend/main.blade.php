@extends('frontend.homepage')

@section('content')
<div class="block-31" style="position: relative;">
    <div class="owl-carousel loop-block-31">
      <div class="block-30 block-30-sm item" style="background-image: url('import/images/nourit.jpeg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
              <h2 class="heading mb-5">Réduisez le Gaspillage Alimentaire, Aidez Ceux Qui En Ont Besoin.</h2>
              <p style="display: inline-block;"><a href="https://vimeo.com/channels/staffpicks/93951774" data-fancybox class="ftco-play-video d-flex"><span class="play-icon-wrap align-self-center mr-4"><span class="ion-ios-play"></span></span> <span class="align-self-center">Regardez la Vidéo</span></a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="site-section section-counter">
    <div class="container">
      <div class="row">
        <!-- Chiffres clés -->
        <div class="col-md-6 pr-5">
          <div class="block-48">
            <span class="block-48-text-1">Nous avons redistribué</span>
            <div class="block-48-counter ftco-number" data-number="50000">0</div>
            <span class="block-48-text-1 mb-4 d-block">Repas à travers 50 associations</span>
            <p class="mb-0"><a href="#" class="btn btn-white px-3 py-2">Voir notre Impact</a></p>
          </div>
        </div>

        <!-- Texte de présentation -->
        <div class="col-md-6 welcome-text">
          <h2 class="display-4 mb-3">Qui Sommes-Nous ?</h2>
          <p class="lead">RescueFood est une plateforme dédiée à la récupération des excédents alimentaires auprès des restaurants et commerçants, afin de les redistribuer aux associations et organisations caritatives.</p>
          <p class="mb-4">Nous travaillons chaque jour pour lutter contre le gaspillage alimentaire tout en aidant des milliers de familles dans le besoin. Rejoignez-nous pour créer un impact durable.</p>
          <p class="mb-0"><a href="#" class="btn btn-primary px-3 py-2">En savoir plus</a></p>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section border-top">
    <div class="container">
      <div class="row">

        <!-- Notre Mission -->
        <div class="col-md-4">
          <div class="media block-6">
            <div class="icon"><span class="ion-ios-bulb"></span></div>
            <div class="media-body">
              <h3 class="heading">Notre Mission</h3>
              <p>Chez RescueFood, nous luttons contre le gaspillage alimentaire en collectant les excédents pour les redistribuer aux communautés dans le besoin, tout en promouvant la solidarité et l'entraide.</p>
              <p><a href="#" class="link-underline">En savoir plus</a></p>
            </div>
          </div>
        </div>

        <!-- Faire un Don -->
        <div class="col-md-4">
          <div class="media block-6">
            <div class="icon"><span class="ion-ios-cash"></span></div>
            <div class="media-body">
              <h3 class="heading">Faire un Don</h3>
              <p>Aidez-nous à étendre notre portée en faisant un don alimentaire ou financier. Ensemble, nous pouvons nourrir des milliers de familles et bâtir un monde plus solidaire.</p>
              <p><a href="#" class="link-underline">Faire un don</a></p>
            </div>
          </div>
        </div>

        <!-- Besoin de bénévoles -->
        <div class="col-md-4">
          <div class="media block-6">
            <div class="icon"><span class="ion-ios-contacts"></span></div>
            <div class="media-body">
              <h3 class="heading">Nous avons besoin de bénévoles</h3>
              <p>Rejoignez notre réseau de bénévoles pour aider à collecter, trier et distribuer des produits alimentaires aux personnes dans le besoin.</p>
              <p><a href="#" class="link-underline">Devenir bénévole</a></p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>




  <div class="site-section fund-raisers bg-light">
    <div class="container">
      <div class="row mb-3 justify-content-center">
        <div class="col-md-8 text-center">
          <h2>Dernières Collectes de Fonds</h2>
          <p class="lead">Découvrez les initiatives récentes pour soutenir les communautés en difficulté. Votre don peut faire une grande différence.</p>
          <p><a href="#" class="link-underline">Voir toutes les collectes</a></p>
        </div>
      </div>
    </div>

    <div class="container-fluid">

      <div class="col-md-12 block-11">
        <div class="nonloop-block-11 owl-carousel">





          @foreach ($products as $product)
          <x-product-card :product="$product" />

          @endforeach



          <!-- Ajoutez d'autres items ici -->

        </div>
      </div>
    </div>
  </div> <!-- .section -->



  <div class="site-section fund-raisers">
    <div class="container">
      <div class="row mb-3 justify-content-center">
        <div class="col-md-8 text-center">
          <h2>Dernières Dons</h2>
          <p class="lead">Voici quelques exemples rapides pour mettre en valeur les dons récents.</p>
          <p class="mb-5"><a href="#" class="link-underline">Voir tous les dons</a></p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 col-lg-3 mb-5">
          <div class="person-donate text-center">
            <img src="{{ asset('import/images/person_1.jpg')}}" alt="Jorge Smith" class="img-fluid">
            <div class="donate-info">
              <h2>Jorge Smith</h2>
              <span class="time d-block mb-3">Donné à l'instant</span>
              <p>Donné <span class="text-success">$252</span> <br> <em>pour</em>
                <a href="#" class="link-underline fundraise-item">L'eau est la vie. Eau potable en milieu urbain</a>
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-5">
          <div class="person-donate text-center">
            <img src="{{ asset('import/images/person_2.jpg')}}" alt="Christine Charles" class="img-fluid">
            <div class="donate-info">
              <h2>Christine Charles</h2>
              <span class="time d-block mb-3">Donné il y a 1 heure</span>
              <p>Donné <span class="text-success">$400</span> <br> <em>pour</em>
                <a href="#" class="link-underline fundraise-item">Les enfants ont besoin d'éducation</a>
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-5">
          <div class="person-donate text-center">
            <img src="{{ asset('import/images/person_3.jpg')}}" alt="Albert Sluyter" class="img-fluid">
            <div class="donate-info">
              <h2>Albert Sluyter</h2>
              <span class="time d-block mb-3">Donné il y a 4 heures</span>
              <p>Donné <span class="text-success">$1,200</span> <br> <em>pour</em>
                <a href="#" class="link-underline fundraise-item">Besoin d'abri pour les enfants en Afrique</a>
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-5">
          <div class="person-donate text-center">
            <img src="{{ asset('import/images/person_4.jpg')}}" alt="Andrew Holloway" class="img-fluid">
            <div class="donate-info">
              <h2>Andrew Holloway</h2>
              <span class="time d-block mb-3">Donné il y a 9 heures</span>
              <p>Donné <span class="text-success">$100</span> <br> <em>pour</em>
                <a href="#" class="link-underline fundraise-item">L'eau est la vie. Eau potable en milieu urbain</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- .section -->


  <div class="featured-section overlay-color-2" style="background-image: url('images/bg_3.jpg');">

    <div class="container">
      <div class="row">

        <div class="col-md-6">
          <img src="{{ asset('import/images/bg_3.jpg')}}" alt="Image illustrative" class="img-fluid">
        </div>

        <div class="col-md-6 pl-md-5">
          <span class="featured-text d-block mb-3">Histoires de Succès</span>
          <h2>L'eau est la vie. Nous fournissons avec succès de l'eau potable en Asie du Sud-Est</h2>
          <p class="mb-3">Loin derrière les montagnes des mots, loin des pays de Vokalia et Consonantia, vivent les textes aveugles.</p>
          <span class="fund-raised d-block mb-5">Nous avons collecté 100 000 $</span>

          <p><a href="#" class="btn btn-success btn-hover-white py-3 px-5">Lire l'Intégralité de l'Histoire</a></p>
        </div>

      </div>
    </div>

  </div> <!-- .featured-donate -->
  <div class="site-section bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h2>Derniers Bénéficiaires</h2>
                <p class="lead">Découvrez les derniers bénéficiaires de nos actions.</p>
            </div>
        </div>

        <div class="row">
            @foreach($benificaires as $benif)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="post-entry border rounded shadow-sm p-3">
                        <a href="#" class="mb-3 img-wrap">
                            <img src="{{ asset('storage/' . $benif->image) }}" alt="{{ $benif->nom }}" class="img-fluid rounded">
                        </a>
                        <h3 class="font-weight-bold"><a href="#">{{ $benif->nom }}</a></h3>
                        <span class="date mb-2 d-block text-muted">{{ $benif->created_at->format('d M Y') }}</span>
                        <p class="mb-3"><i class="ion-ios-location" aria-hidden="true"></i> {{ $benif->adresse }}</p>

                        <!-- Div pour la carte -->
                        <div id="map-{{ $benif->id }}" style="height: 200px; border: 1px solid #ddd; border-radius: 4px;"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="site-section bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h2 class="partner-title">Nos Partenaires</h2>
                <p class="lead partner-subtitle">Découvrez les entreprises qui soutiennent notre mission.</p>
            </div>
        </div>

        <div class="partners-carousel">
            <button class="carousel-control left" onclick="moveCarousel(-1)">&#10094;</button>
            <div class="partners-wrapper">
                <div class="partners-row">
                    @foreach($partenaires as $partenaire)
                        <div class="partner-entry text-center">
                            <a href="{{ $partenaire->site_web }}" target="_blank" class="mb-3 img-wrap">
                                <img src="{{ asset('storage/' . $partenaire->logo) }}" alt="{{ $partenaire->nom }}" class="img-fluid rounded" style="max-height: 100px;">
                            </a>
                            <h3 class="font-weight-bold">
                                <a href="{{ $partenaire->site_web }}" target="_blank">{{ $partenaire->nom }}</a>
                            </h3>
                            <span class="text-muted">{{ $partenaire->type }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <button class="carousel-control right" onclick="moveCarousel(1)">&#10095;</button>
        </div>
    </div>
</div>

<style>
    .partner-title {
        font-weight: bold; /* Met le texte en gras */
        color: black; /* Change la couleur en jaune */
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2); /* Ombre légère pour le texte */
    }

    .partners-carousel {
        position: relative;
        overflow: hidden; /* Cacher le débordement */
        width: 100%; /* Prendre toute la largeur du conteneur */
    }

    .partners-wrapper {
        display: flex; /* Afficher les partenaires sur une seule ligne */
        transition: transform 0.5s ease; /* Animation douce pour le mouvement */
        will-change: transform; /* Améliorer les performances */
    }

    .partners-row {
        display: flex; /* Flexbox pour aligner les éléments en ligne */
    }

    .partner-entry {
        border-radius: 10px; /* Coins arrondis */
        padding: 20px; /* Espacement interne */
        transition: transform 0.3s ease, box-shadow 0.3s ease; /* Animation douce */
        background-color: white; /* Couleur de fond */
        margin: 0 10px; /* Espacement entre les partenaires */
        flex: 0 0 auto; /* Empêcher l'élément de s'étirer */
    }

    .partner-entry:hover {
        transform: translateY(-10px); /* Élévation lors du survol */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Ombre lors du survol */
    }

    .carousel-control {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(255, 255, 255, 0.8);
        border: none;
        padding: 10px;
        cursor: pointer;
        z-index: 10;
        font-size: 24px;
    }

    .left {
        left: 10px;
    }

    .right {
        right: 10px;
    }
</style>

<script>
    let scrollAmount = 0;

    function moveCarousel(direction) {
        const wrapper = document.querySelector('.partners-wrapper');
        const partnerEntries = document.querySelectorAll('.partner-entry');
        const totalWidth = Array.from(partnerEntries).reduce((total, entry) => total + entry.offsetWidth + 20, 0); // 20 pour les marges
        const visibleWidth = document.querySelector('.partners-carousel').offsetWidth; // Largeur visible

        // Calculer le déplacement
        if (direction === 1) {
            scrollAmount += visibleWidth * 0.8; // Défilement vers la droite
        } else {
            scrollAmount -= visibleWidth * 0.8; // Défilement vers la gauche
        }

        // Limiter le défilement
        scrollAmount = Math.max(0, Math.min(scrollAmount, totalWidth - visibleWidth));

        // Appliquer le défilement
        wrapper.style.transform = `translateX(-${scrollAmount}px)`;
    }
</script>




<!-- Ajout des dépendances Leaflet et des icônes Ionicons -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/ionicons@5.5.2/dist/css/ionicons.min.css">

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    // Initialiser un tableau vide pour les bénéficiaires
    var benificaires = [];

    // Récupérer les données des bénéficiaires depuis PHP
    var data = <?php echo json_encode($benificaires->toArray()); ?>;

    // Remplir le tableau avec les données
    data.forEach(function(benif) {
        benificaires.push({
            id: benif.id,
            nom: benif.nom,
            latitude: benif.latitude,
            longitude: benif.longitude
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        // Boucle à travers chaque bénéficiaire pour initialiser la carte
        benificaires.forEach(function(benif) {
            if (benif.latitude && benif.longitude) {
                var map = L.map('map-' + benif.id).setView([benif.latitude, benif.longitude], 13);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                }).addTo(map);
                L.marker([benif.latitude, benif.longitude]).addTo(map)
                    .bindPopup(benif.nom)
                    .openPopup();
            }
        });
    });
</script>
@endsection
