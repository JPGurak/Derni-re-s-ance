<?php

require_once "controllers/FilmController.php";
require_once "controllers/AccueilController.php";
require_once "controllers/RealisateurController.php";
require_once "controllers/GenreController.php";
require_once "controllers/ActeurController.php";

// les principaux commentaires sont sur les feuilles "RealisateurControlleur"

$ctrlFilm = new FilmController;
$ctrlAccueil = new AccueilController;
$ctrlReal = new RealisateurController;
$ctrlGen = new GenreController;
$ctrlActeur = new ActeurController;
 


if(isset($_GET['action'])){
    
    // $id = isset($_GET['id']) ? $_GET['id'] : "";
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING); // on ne fait jamais confiance| faille XSS(input et output mal protégés) | on choisit le filtre selon ses besoins

switch($_GET['action']){
    case "listFilms" : $ctrlFilm->findAll();break;
    case "detailFilm" : $ctrlFilm->findOneById($id);break;
    case "casting" : $ctrlFilm->findOneById($id);break;
    case "listReal" : $ctrlReal->findAll();break;
    case "listActeurs" : $ctrlActeur->findAll();break;
    case "ajouterRealForm" : $ctrlReal->addRealForm();break;
    case "ajouterActeurForm" : $ctrlActeur->addActeurForm();break;
    case "ajouterGenreForm" : $ctrlGen->addGenreForm();break;
    case "ajouterFilmForm" : $ctrlFilm->addFilmForm();break;
    case "ajouterFilm" : $ctrlFilm->addFilm($_POST);break;
    case "ajouterRealisateur" : $ctrlReal->addReal($_POST);break;
    case "ajouterActeur" : $ctrlActeur->addActeur($_POST);break;
    case "detailActeur" :$ctrlActeur->findOneById($id);break;
    case "detailReal" :$ctrlReal->findOneById($id);break;
    case "supReal" :$ctrlReal->deleteReal($id);break;
    case "supActeur" :$ctrlActeur->deleteActeur($id);break;
    case "supGenre" :$ctrlGen->deleteGenre($id);break;
    // case "supFilm" :$ctrlFilm->deleteFilm($id);break;
    case "modifReal" :$ctrlReal->modifRealForm($id);break;
    case "modifActeur" :$ctrlActeur->modifActeurForm($id);break;
    case "modifGenre" :$ctrlGen->modifGenreForm($id);break;
    // case "modifFilm" :$ctrlFilm->modifFilmForm($id);break;
    case "modifRealOK" :$ctrlReal->modifReal($id, $_POST);break;
    case "modifActeurOK" :$ctrlActeur->modifActeur($id, $_POST);break;
    case "modifGenreOK" :$ctrlGen->modifGenre($id, $_POST);break;
    // case "modifFilmOK" :$ctrlFilm->modifFilm($id, $_POST);break;
    case "ajouterGenre" : $ctrlGen->addGenre($_POST);break;
    case "listGenres" : $ctrlGen->findAll();break;
    case "detailGenre" : $ctrlGen->findOneById($id);break;
    case "accueil" : $ctrlAccueil->pageAccueil();break;
    case "supprimerFilm" : $ctrlFilm->deleteFilmById($id); break;
    case "modifierFilmFormulaire" : $ctrlFilm->editFilmForm($id); break;
    case "modifierFilm" : $ctrlFilm->editFilm($id, $_POST); break;

}
}else{
    $ctrlAccueil->pageAccueil();
}

