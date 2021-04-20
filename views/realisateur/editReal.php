<?php

ob_start();

$director = $real->fetch();

?>
  <div class="form-group">
<a class="btn btn-dark btn-block" href="./index.php" role="button">Accueil</a>
<a class="btn btn-secondary btn-block" href="index.php?action=detailReal&id=<?= $id ?>">Retour à la fiche réalisateur</a>

</div>
<h2 class="text-center">Modifier le réalisateur</h2>
<form action="./index.php?action=modifRealOK&id=<?=$director['id'] ?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="nom">Nom du réalisateur :</label>
    <input type="text" class="form-control" id="nom" name="nom" value="<?= $director['nom']?>">
  </div>
  <div class="form-group">
    <label for="prenom">Prénom du réalisateur :</label>
    <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $director['prenom']?>" >
  </div>
  <div class="form-group">
    <label for="dateNaissance">Date de naissance :</label>
    <input type="date" class="form-control" id="dateNaissance" name="dateNaissance" value="<?= $director['dateNaissance']?>">
  </div>

  <div class="form-group">
      <label for="resume">Biographie :</label>
    <textarea class="form-control" id="resume" name="resume" ><?= $director['resume']?></textarea>
  </div>
  <!-- <div class="form-group">
    <input type="file" id="uploads" name="uploads">
  </div> -->
  <div class="form-group">
    <button type="submit" class="btn btn-danger btn-block">Modifier ?</button>
  </div>
</form>




<?php
$titre = "Modifier un realisateur";
$contenu = ob_get_clean();
require "views/template.php";

?>