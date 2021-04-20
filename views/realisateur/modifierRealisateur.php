<?php

ob_start();

?>

<div class="form-group">
<!-- <a href="./index.php">Retour</a> -->
<a class="btn btn-dark btn-block" href="./index.php" role="button">Accueil</a>
<a class="btn btn-secondary btn-block" href="index.php?action=detailReal&id=<?= $id ?>">Retour à la fiche réalisateur</a>

</div>

<!-- <a href="./index.php">Retour</a> -->

<h2>Réalisateur <?= $_POST[('prenom')]." ".$_POST[('nom')]?> a été modifié avec succès</h2>


<?php

$titre = "Realisateur modifié";
$contenu = ob_get_clean();
require "views/template.php";