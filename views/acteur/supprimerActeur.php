<?php

ob_start();

?>

<div class="form-group">
<!-- <a href="./index.php">Retour</a> -->
<a class="btn btn-dark btn-block" href="./index.php" role="button">Accueil</a>
<a class="btn btn-secondary btn-block" href="index.php?action=listActeurs">Retour à la liste des acteurs</a>

</div>

<!-- <a href="./index.php">Retour</a> -->

<h2>L'acteur a été supprimé avec succès</h2>


<?php

$titre = "Acteur supprimé";
$contenu = ob_get_clean();
require "views/template.php";