<?php

ob_start();


?>
<!-- <h1>Coucou</h1> -->
<a class="btn btn-dark btn-block" href="./index.php" role="button">Accueil</a>

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
            while ($realisateurs = $realisateur->fetch()) {
                echo "<tr><td>" . $realisateurs["prenom"] . "</td>";
                echo "<td><a class='text-light' href='index.php?action=detailReal&id=" .$realisateurs["id"] . "'>".$realisateurs['nom']."</a></td>";
                // echo "<td><a href='index.php?action=detailActeur&id=" .$acteurs["nom"] . "'>".$acteurs['nom']."</a></td>";
                echo "<td>" . $realisateurs["DateDeNaissance"] . "</td></tr>";
            }

            ?>

    </tbody>
</table>


<?php
$realisateur->closeCursor();
$titre = "Liste des réalisateurs";
$contenu = ob_get_clean();
require "views/template.php";

?>
