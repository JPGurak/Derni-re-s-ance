<?php

ob_start();

?>

<div class="form-group">
<!-- <a href="./index.php">Retour</a> -->
<!-- <a class="btn btn-dark btn-block" href="./index.php" role="button">Retour</a> -->
<a class="btn btn-secondary btn-block" href="index.php?action=listFilms">Retour à la liste</a>

</div>

<!-- <a href="./index.php">Retour</a> -->

<h2 class="text-center">Film <?= $_POST[('titre_du_film')]?> rajouté avec succès</h2>


<?php

$titre = "Film ajouté";
$contenu = ob_get_clean();
require "views/template.php";