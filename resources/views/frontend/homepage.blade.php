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
        <li class="nav-item active"><a href="index.html" class="nav-link">Accueil</a></li>
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

        <div class="card fundraise-item">
          <a href="#"><img class="card-img-top" src="{{ asset('import/images/img_1.jpg')}}" alt="Collecte d'eau"></a>
          <div class="card-body">
            <h3 class="card-title"><a href="#">L'eau est essentielle. Fournissons de l'eau potable en zones rurales</a></h3>
            <p class="card-text">Aidez-nous à installer des systèmes d'eau potable pour les familles défavorisées en milieu rural.</p>
            <span class="donation-time mb-3 d-block">Dernier don il y a 1 semaine</span>
            <div class="progress custom-progress-success">
              <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <span class="fund-raised d-block">$16,000 collectés sur $40,000</span>
          </div>
        </div>

        <div class="card fundraise-item">
          <a href="#"><img class="card-img-top" src="{{ asset('import/images/img_7.jpg')}}" alt="Abris pour enfants"></a>
          <div class="card-body">
            <h3 class="card-title"><a href="#">Besoin d'abris pour les enfants en Afrique</a></h3>
            <p class="card-text">Construisons des abris sécurisés pour les enfants orphelins et vulnérables.</p>
            <span class="donation-time mb-3 d-block">Dernier don il y a 1 semaine</span>
            <div class="progress custom-progress-success">
              <div class="progress-bar bg-primary" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <span class="fund-raised d-block">$19,500 collectés sur $30,000</span>
          </div>
        </div>

        <div class="card fundraise-item">
          <a href="#"><img class="card-img-top" src="{{ asset('import/images/img_3.jpg')}}" alt="Éducation pour les enfants"></a>
          <div class="card-body">
            <h3 class="card-title"><a href="#">Éducation pour les enfants nécessiteux</a></h3>
            <p class="card-text">Donnez aux enfants des ressources éducatives pour bâtir un avenir meilleur.</p>
            <span class="donation-time mb-3 d-block">Dernier don il y a 1 semaine</span>
            <div class="progress custom-progress-success">
              <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <span class="fund-raised d-block">$24,000 collectés sur $30,000</span>
          </div>
        </div>

        <div class="card fundraise-item">
          <a href="#"><img class="card-img-top" src="{{ asset('import/images/img_4.jpg')}}" alt="Aide alimentaire pour réfugiés"></a>
          <div class="card-body">
            <h3 class="card-title"><a href="#">Les réfugiés ont besoin de nourriture</a></h3>
            <p class="card-text">Aidez-nous à fournir des repas chauds aux familles de réfugiés dans les camps.</p>
            <span class="donation-time mb-3 d-block">Dernier don il y a 1 semaine</span>
            <div class="progress custom-progress-success">
              <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <span class="fund-raised d-block">$16,500 collectés sur $30,000</span>
          </div>
        </div>

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
      <div class="col-md-12">
        <h2>Dernières Nouvelles</h2>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
        <div class="post-entry">
          <a href="#" class="mb-3 img-wrap">
            <img src="{{ asset('import/images/img_4.jpg')}}" alt="Image illustrative" class="img-fluid">
          </a>
          <h3><a href="#">Devenez Bénévole Aujourd'hui</a></h3>
          <span class="date mb-4 d-block text-muted">26 Juillet 2018</span>
          <p>Loin derrière les montagnes des mots, loin des pays de Vokalia et Consonantia.</p>
          <p><a href="#" class="link-underline">Lire la Suite</a></p>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
        <div class="post-entry">
          <a href="#" class="mb-3 img-wrap">
            <img src="{{ asset('import/images/img_5.jpg')}}" alt="Image illustrative" class="img-fluid">
          </a>
          <h3><a href="#">Vous Pouvez Sauver La Vie d'un Enfant</a></h3>
          <span class="date mb-4 d-block text-muted">26 Juillet 2018</span>
          <p>Loin derrière les montagnes des mots, loin des pays de Vokalia et Consonantia.</p>
          <p><a href="#" class="link-underline">Lire la Suite</a></p>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
        <div class="post-entry">
          <a href="#" class="mb-3 img-wrap">
            <img src="{{ asset('import/images/img_6.jpg')}}" alt="Image illustrative" class="img-fluid">
          </a>
          <h3><a href="#">Les Enfants Qui Ont Besoin de Soins</a></h3>
          <span class="date mb-4 d-block text-muted">26 Juillet 2018</span>
          <p>Loin derrière les montagnes des mots, loin des pays de Vokalia et Consonantia.</p>
          <p><a href="#" class="link-underline">Lire la Suite</a></p>
        </div>
      </div>
    </div>
  </div>
</div> <!-- .section -->


<div class="featured-section overlay-color-2" style="background-image: url('images/bg_2.jpg');">
  
  <div class="container">
    <div class="row">

      <div class="col-md-6 mb-5 mb-md-0">
        <img src="{{ asset('import/images/bg_2.jpg')}}" alt="Image illustrative" class="img-fluid">
      </div>

      <div class="col-md-6 pl-md-5">

        <div class="form-volunteer">
          
          <h2>Devenez Bénévole Aujourd'hui</h2>
          <form action="#" method="post">
            <div class="form-group">
              <input type="text" class="form-control py-2" id="name" placeholder="Entrez votre nom">
            </div>
            <div class="form-group">
              <input type="text" class="form-control py-2" id="email" placeholder="Entrez votre email">
            </div>
            <div class="form-group">
              <textarea name="v_message" id="" cols="30" rows="3" class="form-control py-2" placeholder="Écrivez votre message"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-white px-5 py-2" value="Envoyer">
            </div>
          </form>
        </div>
      </div>
      
    </div>
  </div>

</div> <!-- .featured-donate -->


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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>

<script src="{{ asset('import/js/google-map.js') }}"></script>
<script src="{{ asset('import/js/main.js') }}"></script>

  </body>
</html>