<?php

ob_start();

?>

<div class="form-group">
<!-- <a href="./index.php">Retour</a> -->
<a class="btn btn-dark btn-block" href="./index.php" role="button">Accueil</a>
<a class="btn btn-secondary btn-block" href="index.php?action=listReal">Retour à la liste des réalisateurs</a>

</div>

<!-- <a href="./index.php">Retour</a> -->

<h2>Le réalisateur a été supprimé avec succès</h2>


<?php

$titre = "Realisateur supprimé";
$contenu = ob_get_clean();
require "views/template.php";