<?php

ob_start();

?>

<div class="form-group">
<!-- <a href="./index.php">Retour</a> -->
<a class="btn btn-dark btn-block" href="./index.php" role="button">Accueil</a>
<a class="btn btn-secondary btn-block" href="index.php?action=listReal">Retour à la liste</a>

</div>

<!-- <a href="./index.php">Retour</a> -->

<h2>Réalisateur <?= $_POST[('prenom')]." ".$_POST[('nom')]?> rajouté avec succès</h2>


<?php

$titre = "Realisateur ajouté";
$contenu = ob_get_clean();
require "views/template.php";