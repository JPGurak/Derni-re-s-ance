<?php

ob_start();


?>
<div class="form-group">
<!-- <a href="./index.php">Retour</a> -->
<a class="btn btn-dark btn-block" href="./index.php" role="button">Accueil</a>
</div>

<!-- <h2 class="test">Il y a:<?=$films->rowCount();?> films actuellement </h2> -->

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <!-- <th>Affiche</th> -->
            <th>Titre</th>
            <th>Année de sortie</th>
            <!-- <th>Synopsis</th> -->
            <th>Réalisateur</th>

        </tr>
    </thead>
    <tbody><?php

            // var_dump($films->fetchAll(PDO::FETCH_ASSOC));
            while ($film = $films->fetch()) {
                // echo "<tr><td><img src='" . $film['image'] . "' alt='" . $film["titre"] . "'></td>";
                echo "<tr><td><a class='text-light' href='index.php?action=detailFilm&id=" . $film["id"] ."'>".$film['titre']."</a></td>";
                echo "<td>" . $film["sortie"] . "</td>";
                // echo "<td>" . $film["resume"] . "</td>";
                echo "<td><a class='text-light' href='index.php?action=detailReal&id=" . $film["id_1"] . "'>".$film['nom']."</a></td></tr>";
                
            }

            ?>

    </tbody>
</table>


<?php

$films->closeCursor();
$titre = "Liste des films";
$contenu = ob_get_clean();
require "views/template.php";

?>