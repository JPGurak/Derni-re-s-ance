<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css" />
  <title><?= $titre ?></title>
</head>

<body>
  <!-- <div class="bg-dark">
    <div class="container">
      <div class="row">
        <nav class="col navbar navbar-expand-lg navbar-dark">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div id="navbarContent" class="collapse navbar-collapse">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php?action=accueil">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?action=listFilms">Liste des Films</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?action=listReal">Liste des réalisateurs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?action=listActeurs">Liste des acteurs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?action=listGenres">Liste des genres</a>
              </li>
              <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
              </form>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div> -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <a class="navbar-brand" href="index.php?action=accueil">Accueil<span class="sr-only">(current)</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <!-- <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Films
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <!-- <a class="dropdown-item" href="#">Action</a> -->
            <a class="dropdown-item" href="index.php?action=listFilms">Liste des films</a>
            <a class="dropdown-item" href="index.php?action=ajouterFilmForm">Ajouter un film</a>
            <!-- <div class="dropdown-divider"></div> -->
            <!-- <a class="dropdown-item" href="#">Something else here</a> -->
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Acteurs
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <!-- <a class="dropdown-item" href="#">Action</a> -->
            <a class="dropdown-item" href="index.php?action=listActeurs">Liste des acteurs</a>
            <a class="dropdown-item" href="index.php?action=ajouterActeurForm">Ajouter un acteur</a>
            <!-- <div class="dropdown-divider"></div> -->
            <!-- <a class="dropdown-item" href="#">Something else here</a> -->
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Réalisateurs
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <!-- <a class="dropdown-item" href="#">Action</a> -->
            <a class="dropdown-item" href="index.php?action=listReal">Liste des réalisateurs</a>
            <a class="dropdown-item" href="index.php?action=ajouterRealForm">Ajouter un réalisateur</a>
            <!-- <a class="dropdown-item" href="index.php?action=modifReal">Modifier un réalisateur</a> -->
            <!-- <div class="dropdown-divider"></div> -->
            <!-- <a class="dropdown-item" href="#">Something else here</a> -->
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Genres
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <!-- <a class="dropdown-item" href="#">Action</a> -->
            <a class="dropdown-item" href="index.php?action=listGenres">Liste des genres</a>
            <a class="dropdown-item" href="index.php?action=ajouterGenreForm">Ajouter un genre</a>
            <!-- <div class="dropdown-divider"></div> -->
            <!-- <a class="dropdown-item" href="#">Something else here</a> -->
          </div>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li> -->
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
  <div id="espace"></div>
  <div class="container">
    <div class="row mb-4">
      <div class="col">
        <div id="carouselControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="images/carroussel/OSS117.jpg" class="d-block w-100" alt="OSS117">
            </div>
            <div class="carousel-item">
              <img src="images/carroussel/ronin.jpg" class="d-block w-100" alt="ronin">
            </div>
            <div class="carousel-item">
              <img src="images/carroussel/lotr1.jpg" class="d-block w-100" alt="lotr1">
            </div>
            <div class="carousel-item">
              <img src="images/carroussel/cash.jpg" class="d-block w-100" alt="cash">
            </div>
            <div class="carousel-item">
              <img src="images/carroussel/tt.jpg" class="d-block w-100" alt="taistoi">
            </div>
            <div class="carousel-item">
              <img src="images/carroussel/lds.jpg" class="d-block w-100" alt="lds">
            </div>

          </div>
          <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Précédent</span>
          </a>
          <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Suivant</span>
          </a>
        </div>
      </div>
    </div>
    <div>
      <?= $contenu ?>
    </div>
    <!-- <div class="row">
      <div class="col-12 col-lg-4">
        <div class="card mb-4 mb-lg-0 border-primary shadow">
          <img src="images/home/lotr1.jpg" alt="certificate" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">Devenez diplômé</h5>
            <p class="card-text">De zéro à héros, obtenez un diplôme en informatique.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card mb-4 mb-lg-0 border-primary shadow">
            <img src="images/home/ronin.jpg" alt="instructor" class="card-img-top">
            <div class="card-body">
            <h5 class="card-title">Formateurs de qualités</h5>
            <p class="card-text">Tous nos cours sont réalisés par les meilleurs informaticiens.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card mb-4 mb-lg-0 border-primary shadow">
          <img src="images/home/OSS117.jpg" alt="job search" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">Un travail graranti</h5>
            <p class="card-text">Nous vous garantissons un emploi à l'issue de votre formation.</p>
          </div>
        </div>
      </div>
    </div>
  </div> -->
    <div class="bg-dark  ">
      <div class="container lg">
        <div class="row pt-4 pb-3">
          <div class="col">
            <ul class="list-inline text-center">
              <li class="list-inline-item"><a class='text-light' href="#">À propos</a></li>
              <li class="list-inline-item">&middot;</li>
              <li class="list-inline-item"><a class='text-light' href="#">Vie privée</a></li>
              <li class="list-inline-item">&middot;</li>
              <li class="list-inline-item"><a class='text-light' href="#">Conditions d'utilisations</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>