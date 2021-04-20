<?php

ob_start();

?>
  <div class="form-group">
<!-- <a href="./index.php">Retour</a> -->
<a class="btn btn-dark btn-block" href="./index.php" role="button">Accueil</a>
<a class="btn btn-secondary btn-block" href="index.php?action=listReal">Retour à la liste</a>

</div>
<h2 class="text-center">Veuillez renseigner tous les champs</h2>
<form action="./index.php?action=ajouterRealisateur" method="post">
  <div class="form-group">
    <label for="nom">Nom du réalisateur :</label>
    <!-- <div class="input-group-prepend"><span class="input-group-text">Nom du réalisateur</span></div> -->
    <input type="text" class="form-control" id="nom" name="nom" placeholder="Leone" required>
  </div>
  <div class="form-group">
    <label for="prenom">Prénom du réalisateur :</label>
    <!-- <div class="input-group-prepend"><span class="input-group-text">Prénom du réalisateur</span></div> -->
    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Sergio" required>
  </div>
  <div class="form-group">
    <label for="dateNaissance">Date de naissance :</label>
    <!-- <div class="input-group-prepend"><span class="input-group-text">Date de naissance</span></div> -->
    <input type="date" class="form-control" id="dateNaissance" name="dateNaissance" placeholder="JJ-MM-AAAA" required>
  </div>
  <div class="form-group">
      <label for="resume">Biographie :</label>
    <!-- <div class="input-group-prepend"><span class="input-group-text">Biographie</span></div> -->
    <textarea class="form-control" id="resume" name="resume" aria-label="biographie" required></textarea>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-warning btn-block">Ajouter ?</button>
  </div>
</form>




<?php
$titre = "Ajouter un realisateur";
$contenu = ob_get_clean();
require "views/template.php";

?>