<?php

ob_start();

?>

<div class="form-group">
<!-- <a href="./index.php">Retour</a> -->
<!-- <a class="btn btn-dark btn-block" href="./index.php" role="button">Retour</a> -->
<a class="btn btn-secondary btn-block" href="index.php?action=listGenres">Retour à la liste</a>

</div>

<!-- <a href="./index.php">Retour</a> -->

<h2 class="text-center">Genre <?= $_POST[('libelle')]?> rajouté avec succès</h2>


<?php

$titre = "Genre ajouté";
$contenu = ob_get_clean();
require "views/template.php";