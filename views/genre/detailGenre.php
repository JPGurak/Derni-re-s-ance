<?php

ob_start();

?>
<div class="form-group">
<!-- <a href="./index.php">Retour</a> -->
<a class="btn btn-dark btn-block" href="./index.php" role="button">Accueil</a>
<a class="btn btn-secondary btn-block" href="index.php?action=listGenres">Retour à la liste</a>

</div>

<!-- <h1>Coucou</h1> -->
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>Nom du genre:</th>
            <th>Descriptif du genre:</th>
        </tr>
    </thead>
    <tbody><?php

            // var_dump($realisateur->fetchAll(PDO::FETCH_ASSOC));
            while ($detailGenre = $detailsGenre->fetch()) {
                echo "<tr><td>" . $detailGenre["libelle"] . "</td>";
                echo "<td>" . $detailGenre["descriptif"] . "</td></tr>";
            }

            ?>

    </tbody>


</table>
<a href="http://localhost/DWWM/FourreTout/essai_new_allocine/index.php?action=modifGenre&id=<?= $id ?>" class="btn btn-info btn-block">Modifier</a>
<a href="http://localhost/DWWM/FourreTout/essai_new_allocine/index.php?action=supGenre&id=<?= $id ?>" class="btn btn-danger btn-block">Supprimer ????</a>


<?php
$detailsGenre->closeCursor();

$titre = "Detail du genre";
$contenu = ob_get_clean();
require "views/template.php";
