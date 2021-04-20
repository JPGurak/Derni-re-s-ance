<?php

ob_start();

// $detailFilm = $film->fetch();
// 
?>
<div class="form-group">
    <!-- <a href="./index.php">Retour</a> -->
    <a class="btn btn-dark btn-block" href="./index.php" role="button">Accueil</a>
    <a class="btn btn-secondary btn-block" href="index.php?action=listFilms">Retour à la liste</a>

</div>

<!-- <h1>Coucou</h1> -->

<!-- <h2><?= $detailFilm['titre'] ?></h2> -->
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>Affiche</th>
            <!-- </tr>
        <tr> -->
            <th>Titre</th>
            <th>Sortie</th>
            <th>Synopsis</th>
            <!-- <th>Prenom</th>
            <th>Nom</th> -->
            <!-- <th>Genre</th> -->
        </tr>
    </thead>
    <tbody><?php

            // var_dump($films->fetchAll(PDO::FETCH_ASSOC));
            while ($detailDuFilm = $detailsDuFilm->fetch()) {
                echo "<tr><td><img src='" . $detailDuFilm['image'] . "' alt='affiche''" . $detailDuFilm["titre"] . "'></td>";
                echo "<td>" . $detailDuFilm["titre"] . "</td>";
                echo "<td>" . $detailDuFilm["sortie"] . "</td>";
                echo "<td>" . $detailDuFilm["resume"] . "</td>";
                // echo "<td><a class='text-light' href='index.php?action=detailGenre&id=" . $detailDuFilm["id"] . "'>" . $detailDuFilm['libelle'] . "</a></td></tr>";
            }
            ?>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Casting</th>
                </tr>
            </thead>
            <!-- <h2>Casting</h2> -->
            <tbody>
                <ul>
                    <?php
                    while ($casting = $castingFilm->fetch()) {
                        echo "<tr><td><li><a href='./index.php?action=detailActeur&id=" . $casting['idActeur'] . "'>" . $casting['identite'] . "</a> (" . $casting['nomRole'] . ")</td></tr>";
                    }
                    ?>
                </ul>
            </tbody>
        </table>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Genre</th>
                </tr>
            </thead>
            <tbody>
                <ul>
                    <?php
                    while ($classifie = $classifieFilm->fetch()) {
                        echo "<tr><td><li><a href='./index.php?action=detailGenre&id=" . $classifie['idGenre'] . "'>" . $classifie['nomGenre'] . "</a></td></tr>";
                    }
                    ?>
                </ul>
            </tbody>
        </table>
    </tbody>
</table>
<a href="http://localhost/DWWM/FourreTout/essai_new_allocine/index.php?action=modifierFilmFormulaire&id=<?= $id ?>" class="btn btn-info btn-block">Modifier</a>
<a href="http://localhost/DWWM/FourreTout/essai_new_allocine/index.php?action=supprimerFilm&id=<?= $id ?>" class="btn btn-danger btn-block">Supprimer ????</a>




<?php
$titre = "Detail du film" . $detailDuFilm["titre"];
$contenu = ob_get_clean();
require "views/template.php";
