<?php

ob_start();

?>

<div class="form-group">
<a class="btn btn-dark btn-block" href="./index.php" role="button">Accueil</a>
<a class="btn btn-secondary btn-block" href="index.php?action=detailGenre&id=<?= $id ?>">Retour à la fiche genre</a>

</div>


<h2>Genre <?= $_POST[('libelle')]?> a été modifié avec succès</h2>


<?php

$titre = "Genre modifié";
$contenu = ob_get_clean();
require "views/template.php";