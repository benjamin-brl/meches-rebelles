<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

$get_fonction = isset($_GET['f']) ? $_GET['f'] : '';
$fonctions = $user->getAllFonctions();

include "$racine/vue/header.php";
include "$racine/vue/vueContact.php";
include "$racine/vue/footer.php";