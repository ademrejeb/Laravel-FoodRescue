<!DOCTYPE html>
<html lang="en">
  <head>
    <title>RescueFood &mdash; </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,500|Dosis:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('import/css/open-iconic-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('import/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('import/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('import/css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('import/css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('import/css/aos.css') }}">
<link rel="stylesheet" href="{{ asset('import/css/ionicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('import/css/bootstrap-datepicker.css') }}">
<link rel="stylesheet" href="{{ asset('import/css/jquery.timepicker.css') }}">
<link rel="stylesheet" href="{{ asset('import/css/flaticon.css') }}">
<link rel="stylesheet" href="{{ asset('import/css/icomoon.css') }}">
<link rel="stylesheet" href="{{ asset('import/css/fancybox.min.css') }}">
<link rel="stylesheet" href="{{ asset('import/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('import/css/style.css') }}">
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      
      

  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
   
    <a class="navbar-brand" href="index.html">RescueFood</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="{{ route('home')}}" class="nav-link">Accueil</a></li>
        <li class="nav-item"><a href="how-it-works.html" class="nav-link">Comment ça marche</a></li>
        <li class="nav-item"><a href="donate.html" class="nav-link">Proposer une Offre</a></li>
        <li class="nav-item"><a href="actions.html" class="nav-link">Nos Actions</a></li>
        
        <li class="nav-item"><a href="about.html" class="nav-link">À propos</a></li>
        <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
       
          @auth
             
              <li class="nav-item">
                  <a href="{{ route('logout') }}" 
                     class="nav-link"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Logout
                  </a>
              </li>
      
            
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
         
          @endauth
      
      </ul>
    </div>
  </div>
</nav>

  <!-- END nav -->
  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
  
    @yield('content')
    <div class="container my-5">
      <h2 class="text-center mb-4">Formulaire de Prise en Charge</h2>
  
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
  
      <form action="{{ route('recurring-collections.store') }}" method="POST" class="mx-auto" novalidate style="max-width: 600px;">
          @csrf
          <div class="form-group">
              <label for="name">Nom et Prénom</label>
              <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
          </div>
          <div class="form-group">
              <label for="email">Adresse E-mail</label>
              <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
          </div>
          <div class="form-group">
              <label for="phone">Numéro de Téléphone</label>
              <input type="tel" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required>
          </div>
          <div class="form-group">
              <label for="frequency">Fréquence de Collecte</label>
              <select name="frequency" id="frequency" class="form-control" required>
                  <option value="">Choisissez une option</option>
                  <option value="quotidienne" {{ old('frequency') == 'quotidienne' ? 'selected' : '' }}>Quotidienne</option>
                  <option value="hebdomadaire" {{ old('frequency') == 'hebdomadaire' ? 'selected' : '' }}>Hebdomadaire</option>
                  <option value="mensuelle" {{ old('frequency') == 'mensuelle' ? 'selected' : '' }}>Mensuelle</option>
              </select>
          </div>
          <div class="form-group">
              <label for="comments">Commentaires Supplémentaires</label>
              <textarea name="comments" id="comments" class="form-control" rows="3">{{ old('comments') }}</textarea>
          </div>
          <div class="form-group">
              <label for="contact-preference">Préférences de Contact</label>
              <select name="contact_preference" id="contact-preference" class="form-control" required>
                  <option value="">Choisissez une option</option>
                  <option value="email" {{ old('contact_preference') == 'email' ? 'selected' : '' }}>E-mail</option>
                  <option value="phone" {{ old('contact_preference') == 'phone' ? 'selected' : '' }}>Téléphone</option>
                  <option value="sms" {{ old('contact_preference') == 'sms' ? 'selected' : '' }}>SMS</option>
              </select>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Soumettre</button>
      </form>
  </div>
<div id="map" style="height: 400px; margin: 20px 0;"></div>

<footer class="footer">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-6 col-lg-4">
        <h3 class="heading-section">À Propos de Nous</h3>
        <p class="lead">Loin, derrière les montagnes de mots, loin des pays Vokalia et Consonantia, vivent des textes aveugles.</p>
        <p class="mb-5">Séparés, ils vivent dans Bookmarksgrove, juste à la côte de la sémantique, un vaste océan de langue.</p>
        <p><a href="#" class="link-underline">Lire Plus</a></p>
      </div>
      <div class="col-md-6 col-lg-4">
        <h3 class="heading-section">Derniers Articles de Blog</h3>
        <div class="block-21 d-flex mb-4">
          <figure class="mr-3">
            <img src="{{ asset('import/images/img_1.jpg')}}" alt="Image illustrative" class="img-fluid">
          </figure>
          <div class="text">
            <h3 class="heading"><a href="#">L'eau, c'est la vie. Eau potable en milieu urbain</a></h3>
            <div class="meta">
              <div><a href="#"><span class="icon-calendar"></span> 29 Juillet 2018</a></div>
              <div><a href="#"><span class="icon-person"></span> Admin</a></div>
              <div><a href="#"><span class="icon-chat"></span> 19</a></div>
            </div>
          </div>
        </div>

        <div class="block-21 d-flex mb-4">
          <figure class="mr-3">
            <img src="{{ asset('import/images/img_2.jpg')}}" alt="Image illustrative" class="img-fluid">
          </figure>
          <div class="text">
            <h3 class="heading"><a href="#">La vie est courte, alors soyez gentil</a></h3>
            <div class="meta">
              <div><a href="#"><span class="icon-calendar"></span> 29 Juillet 2018</a></div>
              <div><a href="#"><span class="icon-person"></span> Admin</a></div>
              <div><a href="#"><span class="icon-chat"></span> 19</a></div>
            </div>
          </div>
        </div>

        <div class="block-21 d-flex mb-4">
          <figure class="mr-3">
            <img src="{{ asset('import/images/img_4.jpg')}}" alt="Image illustrative" class="img-fluid">
          </figure>
          <div class="text">
            <h3 class="heading"><a href="#">Des enfants malheureux ont besoin de votre amour</a></h3>
            <div class="meta">
              <div><a href="#"><span class="icon-calendar"></span> 29 Juillet 2018</a></div>
              <div><a href="#"><span class="icon-person"></span> Admin</a></div>
              <div><a href="#"><span class="icon-chat"></span> 19</a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="block-23">
          <h3 class="heading-section">Restez Connecté</h3>
          <ul>
            <li><span class="icon icon-map-marker"></span><span class="text">Esprit Ariana Soghra, Tunisie</span></li>
            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+7 000 0000</span></a></li>
            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">foodconnect@gmail.com</span></a></li>
          </ul>
        </div>
      </div>
      
    </div>
    <div class="row pt-5">
      <div class="col-md-12 text-center">
        <p>
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés | Ce modèle est fait avec <i class="ion-ios-heart text-danger" aria-hidden="true"></i> par <a href="https://colorlib.com" target="_blank">FoodConnect</a>
        </p>
      </div>
    </div>
  </div>
</footer>


  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ asset('import/js/jquery.min.js') }}"></script>
<script src="{{ asset('import/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('import/js/popper.min.js') }}"></script>
<script src="{{ asset('import/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('import/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('import/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('import/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('import/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('import/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('import/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('import/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('import/js/aos.js') }}"></script>
<script src="{{ asset('import/js/jquery.animateNumber.min.js') }}"></script>

<!-- Google Maps API -->

<script src="{{ asset('import/js/google-map.js') }}"></script>
<script src="{{ asset('import/js/main.js') }}"></script>
<script>
  // Initialisation de la carte
  var map = L.map('map').setView([36.8065, 10.1815], 13); // Remplacez les coordonnées par celles souhaitées

  // Ajouter une couche de tuiles (OpenStreetMap par exemple)
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '© OpenStreetMap'
  }).addTo(map);

  // Ajouter un marqueur
  var marker = L.marker([36.8065, 10.1815]).addTo(map);
  marker.bindPopup('<b>Bienvenue à RescueFood!</b>').openPopup();
</script>


</html>