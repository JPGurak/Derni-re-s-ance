<?php

ob_start();

$player = $acteurs->fetch();

?>
  <div class="form-group">
<!-- <a href="./index.php">Retour</a> -->
<a class="btn btn-dark btn-block" href="./index.php" role="button">Retour</a>
<a class="btn btn-secondary btn-block" href="index.php?action=detailActeur&id=<?= $id ?>">Retour à la fiche acteur</a>

</div>
<h2 class="text-center">Modifier l'acteur</h2>
<form action="./index.php?action=modifActeurOK&id=<?=$player['id'] ?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="nom">Nom de l'acteur :</label>
    <!-- <div class="input-group-prepend"><span class="input-group-text">Nom du réalisateur</span></div> -->
    <input type="text" class="form-control" id="nom" name="nom" value="<?= $player['nom']?>">
  </div>
  <div class="form-group">
    <label for="prenom">Prénom de l'acteur :</label>
    <!-- <div class="input-group-prepend"><span class="input-group-text">Prénom du réalisateur</span></div> -->
    <input type="text" class="form-control" id="prenom" name="prenom" value="<?=$player['prenom']?>">
  </div>
  <div class="form-group">
    <label for="dateNaissance">Date de naissance :</label>
    <!-- <div class="input-group-prepend"><span class="input-group-text">Date de naissance</span></div> -->
    <input type="date" class="form-control" id="dateNaissance" name="dateNaissance" value="<?= $player['dateNaissance']?>">
  </div>
  <div class="form-group">
  <label for="resume">Biographie :</label>
    <!-- <div class="input-group-prepend"><span class="input-group-text">Biographie</span></div> -->
    <textarea class="form-control" id="resume" name="resume" ><?= $player["resume"]?></textarea>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-danger btn-block">Modifier ?</button>
  </div>
</form>




<?php
$titre = "Modifier un acteur";
$contenu = ob_get_clean();
require "views/template.php";

?>