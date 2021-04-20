<?php

ob_start();

?>
<div class="form-group">
    <!-- <a href="./index.php">Retour</a> -->
    <a class="btn btn-dark btn-block" href="./index.php" role="button">Accueil</a>
    <a class="btn btn-secondary btn-block" href="index.php?action=listActeurs">Retour à la liste</a>

</div>

<!-- <h1>Coucou</h1> -->
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>Photo</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Biographie</th>
        </tr>
    </thead>
    <tbody><?php

            // var_dump($films->fetchAll(PDO::FETCH_ASSOC));
            while ($detailActeur = $acteurs->fetch()) {
                echo "<tr><td><img src='" . $detailActeur['image'] . "' alt='" . $detailActeur["nom"] . "'></td>";
                echo "<td>" . $detailActeur["prenom"] . "</td>";
                echo "<td>" . $detailActeur["nom"] . "</td>";
                // echo "<td>" . $detailActeur["dateNaissance"] . "</td>";
                echo "<td>" . $detailActeur["resume"] . "</td></tr>";
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
                while ($filmoActeur = $filmographieActeur->fetch()) {
                    echo "<tr><td><li><a href='./index.php?action=detailFilm&id=" . $filmoActeur['idFilmo'] . "'>" . $filmoActeur['filmo'] . "</a> ( dans le rôle de " . $filmoActeur['nomRole'] . " )</td></tr>";
                }
                ?>
            </ul>
        </tbody>
    </table>
</table>
<a href="http://localhost/DWWM/FourreTout/essai_new_allocine/index.php?action=modifActeur&id=<?= $id ?>" class="btn btn-info btn-block">Modifier</a>
<a href="http://localhost/DWWM/FourreTout/essai_new_allocine/index.php?action=supActeur&id=<?= $id ?>" class="btn btn-danger btn-block">Supprimer ????</a>
<?php
$acteurs->closeCursor();
$titre = "Trombi";
$contenu = ob_get_clean();
require "views/template.php";
