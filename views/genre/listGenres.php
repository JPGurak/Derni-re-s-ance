<?php

ob_start();


?>
<div class="form-group">
    <!-- <a href="./index.php">Retour</a> -->
    <a class="btn btn-dark btn-block" href="./index.php" role="button">Accueil</a>
</div>

<div class="table-responsive">
<table class="table table-dark table-striped responsive text-center">
    <thead>
        <!-- <div class="text-center"> -->
            <tr>
                <!-- <div class="col-6"> -->
                <th>Libelle</th>
                <!-- </div> -->
                <!-- <div class="col-6"> -->
                <!-- <th>Descriptif</th> -->
                <!-- </div> -->

            </tr>
        <!-- </div> -->
    </thead>
    <tbody>
    <?php

            // var_dump($gen->fetchAll(PDO::FETCH_ASSOC));
            while ($gens = $gen->fetch()) {
                // echo "<tr><td>" . $gens["libelle"] . "</td></tr>";
                echo "<tr><td><a class='text-light' href='index.php?action=detailGenre&id=" .$gens["id"] . "'>".$gens['libelle']."</a></td></tr>";

                // echo "<td>" . $gens["descriptif"] . "</td></tr>";
            }

            ?>

    </tbody>
</table>
</div>


<?php

$gen->closeCursor();
$titre = "Liste des genres";
$contenu = ob_get_clean();
require "views/template.php";

?>