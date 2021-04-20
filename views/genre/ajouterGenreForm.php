<?php

ob_start();

?>
  <div class="form-group">
<!-- <a href="./index.php">Retour</a> -->
<a class="btn btn-dark btn-block" href="./index.php" role="button">Accueil</a>
<a class="btn btn-secondary btn-block" href="index.php?action=listGenres">Retour à la liste des genres</a>

</div>
<h2 class="text-center">Veuillez renseigner tous les champs</h2>
<form action="./index.php?action=ajouterGenre" method="post">
  <div class="form-group">
    <label for="libelle">Nom du genre :</label>
    <!-- <div class="input-group-prepend"><span class="input-group-text">Nom du réalisateur</span></div> -->
    <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Policier" required>
  </div>
  <div class="form-group">
    <label for="descriptif">Descriptif :</label>
    <!-- <div class="input-group-prepend"><span class="input-group-text">Prénom du réalisateur</span></div> -->
    <input type="text" class="form-control" id="descriptif" name="descriptif" placeholder="Le genre policier..." required>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-warning btn-block">Ajouter ?</button>
  </div>
</form>




<?php
$titre = "Ajouter un genre";
$contenu = ob_get_clean();
require "views/template.php";

?>