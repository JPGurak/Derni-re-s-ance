<?php

ob_start();

?>

<div class="form-group">
    <!-- <a href="./index.php">Retour</a> -->
    <a class="btn btn-dark btn-block" href="./index.php" role="button">Accueil</a>
    <a class="btn btn-secondary btn-block" href="index.php?action=listFilms">Retour à la liste</a>
</div>
<div>
    <h2 class="text-center">Ajouter Film</h2>

    <form action="./index.php?action=ajouterFilm" method="post">
        <div class="form-group">
            <label for="titre_film">Titre du Film</label>
            <input type="text" class="form-control" id="titre_film" name="titre_du_film" placeholder="james bond" required>
        </div>
        <div class="form-group">
            <label for="sortie_film">Sortie du Film</label>
            <input type="date" class="form-control" id="sortie_film" name="sortie_du_film" required>
        </div>
        <div class="form-group">
            <label for="duree_film">Durée du Film ( en minutes)</label>
            <input type="number" class="form-control" id="duree_film" name="duree_du_film" min="0" max="500" required>
        </div>
        <div class="form-group">
            <label for="note_film">Note ( sur 5)</label>
            <input type="number" class="form-control" id="note_film" name="note_du_film" min="0" max="5" required>
        </div>
        <div class="form-group">
            <label for="resume">Synopsis</label>
            <textarea class="form-control" id="resume" name="resume_du_film" placeholder="il etait une fois" required></textarea>
        </div>
        <div class="form-group">
            <select class="form-control" name="genreF[]" multiple required>
                <?php
                while ($nomGenre = $listeGenres->fetch()) {
                    echo "<option value=" . $nomGenre['idGenre'] . ">" . $nomGenre['nomGenre'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <select class="form-control" name="realisateur_du_film" size="1">
                <?php
                while ($nomReals = $listeRealisateurs->fetch()) {
                    echo "<option value=" . $nomReals['idReal'] . ">" . $nomReals['nomReal'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-danger btn-block">Ajouter le film</button>
        </div>

    </form>
</div>
<?php
$titre = "Ajouter un film";
$contenu = ob_get_clean();
require "views/template.php";

?>