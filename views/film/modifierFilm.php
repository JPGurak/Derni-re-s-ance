<?php

ob_start();

?>

<div class="form-group">
<!-- <a href="./index.php">Retour</a> -->
<a class="btn btn-dark btn-block" href="./index.php" role="button">Accueil</a>
<a class="btn btn-secondary btn-block" href="index.php?action=detailFilm&id=<?= $id ?>">Retour à la fiche du film</a>

</div>

<!-- <a href="./index.php">Retour</a> -->

<h2>Film <?= $_POST[('titre_du_film')]?> modifié avec succès</h2>


<?php

$titre = "Film modifié";
$contenu = ob_get_clean();
require "views/template.php";