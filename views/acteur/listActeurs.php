<?php

ob_start();


?>
<!-- <h1>Coucou</h1> -->
<div class="form-group">
<!-- <a href="./index.php">Retour</a> -->
<a class="btn btn-dark btn-block" href="./index.php" role="button">Accueil</a>
</div>

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>

        </tr>
    </thead>
    <tbody><?php

            // var_dump($realisateur->fetchAll(PDO::FETCH_ASSOC));
            while ($acteurs = $acteur->fetch()) {
                echo "<tr><td>" . $acteurs["prenom"] . "</td>";
                // echo "<td>" . $acteurs["nom"] . "</td>";
                echo "<td><a class='text-light' href='index.php?action=detailActeur&id=" .$acteurs["id"] . "'>".$acteurs['nom']."</a></td>";
                echo "<td>" . $acteurs["DateDeNaissance"] . "</td></tr>";
            }

            ?>

    </tbody>
</table>
<a class="btn btn-grey btn-block" href="index.php?action=listActeurs">Haut de page</a>


<?php
$acteur->closeCursor();
$titre = "Liste des acteurs";
$contenu = ob_get_clean();
require "views/template.php";

?>
