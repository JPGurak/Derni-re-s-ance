<?php

ob_start();

?>
<div class="form-group">
    <!-- <a href="./index.php">Retour</a> -->
    <a class="btn btn-dark btn-block" href="./index.php" role="button">Accueil</a>
    <a class="btn btn-secondary btn-block" href="index.php?action=listReal">Retour à la liste</a>

</div>

<!-- <h1>Coucou</h1> -->
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                    <th>Photo</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Date de naissance</th>
                    <th>Biographie</th>
            </tr>
        </thead>
        <tbody><?php

                // var_dump($realisateur->fetchAll(PDO::FETCH_ASSOC));
                while ($detailReal = $real->fetch()) {
                    echo "<tr><td><img src='" . $detailReal['image'] . "' alt='" . $detailReal["nom"] . "'></td>";
                    echo "<td>" . $detailReal["prenom"] . "</td>";
                    echo "<td>" . $detailReal["nom"] . "</td>";
                    echo "<td>" . $detailReal["nele"] . "</td>";
                    echo "<td>" . $detailReal["resume"] . "</td></tr>";
                }

                ?>

        </tbody>
        <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Filmographie</th>
            </tr>
        </thead>

        <tbody>
            <ul>
                <?php
                while ($filmoReal = $filmographieReal->fetch()) {
                    echo "<tr><td><li><a href='./index.php?action=detailFilm&id=" . $filmoReal['idFilm'] . "'>" . $filmoReal['filmo'] . "</a></td></tr>";
                }
                ?>
            </ul>
        </tbody>
    </table>


    </table>
<a href="http://localhost/DWWM/FourreTout/essai_new_allocine/index.php?action=modifReal&id=<?= $id ?>" class="btn btn-info btn-block">Modifier</a>
<a href="http://localhost/DWWM/FourreTout/essai_new_allocine/index.php?action=supReal&id=<?= $id ?>" class="btn btn-danger btn-block">Supprimer ????</a>
<!-- <a href="http://localhost/DWWM/FourreTout/essai_new_allocine/index.php?action=delReal&id=<?= $id ?>" class="btn btn-danger">Supprimer</a> -->

<?php
$real->closeCursor();
$titre = "Trombi";
$contenu = ob_get_clean();
require "views/template.php";
