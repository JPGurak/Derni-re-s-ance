<?php

ob_start();
?>

<h2 class="text-center">La dernière séance </h2>




<?php

$titre = "Accueil";

$contenu = ob_get_clean();
require "views/template.php";