<?php

ob_start();

$editInfo = $edit1->fetch();

?>
<div class="form-group">

    <a class="btn btn-dark btn-block" href="./index.php">Retour</a>
    <a class="btn btn-secondary btn-block" href="index.php?action=listFilms">Retour à la liste des films</a>
</div>
<!-- <h2>MODIFIER Film</h2> -->

<div>
    <h2 class="text-center">Modifier le film</h2>
    <form action="./index.php?action=modifierFilm&id=<?= $editInfo['id'] ?>" method="post" enctype="multipart/form-data">

        <div class="form-group">

            <label for="titre_film">TITRE DU FILM :</label>
            <input type="text" class="form-control" id="titre_film" name="titre_du_film" value="<?php echo $editInfo['titre'] ?>">
        </div>
        <div class="form-group">
            <label for="sortie_film">SORTIE DU FILM :</label>
            <input type="date" class="form-control" id="sortie_film" name="sortie_du_film" value="<?php echo $editInfo['annee_sortie'] ?>">
        </div>
        <div class="form-group">
            <label for="duree_film">DUREE DU FILM (minutes) :</label>
            <input type="number" class="form-control" id="duree_film" name="duree_du_film" min="0" max="500" value="<?php echo $editInfo['duree'] ?>">
        </div>
        <div class="form-group">
            <label for="note_film">Note (sur 5) :</label>
            <input type="number" class="form-control" id="note_film" name="note_du_film" min="0" max="5" value="<?php echo $editInfo['note'] ?>">
        </div>
        <div class="form-group">
            <label for="resume">Synopsis :</label>
            <textarea class="form-control" id="resume" name="resume"> <?php echo $editInfo["resume"] ?></textarea>
        </div>
        <?php

        $tableauGenres = array();

        while ($findIdGenre = $edit2->fetch()) {
            array_push($tableauGenres, $findIdGenre['id']);
        }

        ?>
        <div class="form-group">
            <select class="form-control" name="genref[]" multiple required>
                <?php
                while ($nomGenre = $edit3->fetch()) {
                    echo "<option value=" . $nomGenre['id'];
                    if (in_array($nomGenre['id'], $tableauGenres)) {
                        echo " selected";
                    }
                    echo ">" . $nomGenre['libelle'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <select class="form-control" name="realisateur" size="1">
                <?php
                while ($nomRealisateur = $edit4->fetch()) {
                    echo "<option value=" . $nomRealisateur['id'];
                    if ($nomRealisateur['id'] == $editInfo['id']) {
                        echo " selected ";
                    }
                    echo ">" . $nomRealisateur['RealNom'] . "</option>";
                }
                ?>

            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-danger btn-block">Modifier le Film ?</button>

        </div>


    </form>
</div>



<?php

$titre = "Modifier un film";
$contenu = ob_get_clean();
require "views/template.php";
