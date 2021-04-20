<?php

ob_start();

$gender = $detailsGenre->fetch();

?>
  <div class="form-group">
<a class="btn btn-dark btn-block" href="./index.php" role="button">Accueil</a>
<a class="btn btn-secondary btn-block" href="index.php?action=detailGenre&id=<?= $id ?>">Retour à la fiche genre</a>

</div>
<h2 class="text-center">Modifier le genre</h2>
<form action="./index.php?action=modifGenreOK&id=<?=$gender['id'] ?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="libelle">Genre :</label>
    <input type="text" class="form-control" id="libelle" name="libelle" value="<?= $gender['libelle']?>">
  </div>

  <div class="form-group">
      <label for="descriptif">Descriptif :</label>
    <textarea class="form-control" id="descriptif" name="descriptif" ><?= $gender['descriptif']?></textarea>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-danger btn-block">Modifier ?</button>
  </div>
</form>




<?php
$titre = "Modifier genre";
$contenu = ob_get_clean();
require "views/template.php";

?>