<?php

ob_start();

?>

<div class="form-group">
<!-- <a href="./index.php">Retour</a> -->
<a class="btn btn-dark btn-block" href="./index.php" role="button">Accueil</a>
<a class="btn btn-secondary btn-block" href="index.php?action=detailActeur&id=<?= $id ?>">Retour à la fiche acteur</a>

</div>

<!-- <a href="./index.php">Retour</a> -->

<h2>Acteur <?= $_POST[('prenom')]." ".$_POST[('nom')]?> modifié avec succès</h2>


<?php

$titre = "Acteur modifié";
$contenu = ob_get_clean();
require "views/template.php";