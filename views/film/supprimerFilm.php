<?php

ob_start();


?>

<a class="btn btn-dark btn-block" href="./index.php" role="button">Accueil</a>
<a class="btn btn-secondary btn-block" href="index.php?action=listFilms&id=<?= $id ?>">Retour à la liste des films</a>

<h2>Film supprimé avec succès</h2>


<?php

$titre = "Film ajouté";
$contenu =ob_get_clean();
require "views/template.php";