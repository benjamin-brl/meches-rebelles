<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

$photo_onglets = $photo->getAllPhotosInCollection('onglets');

$champs = [
    'event' => 'Évènementielle',
    'horaires' => 'Horaires',
    'secteur' => 'Secteur',
    'galerie' => 'Galerie',
    'contact' => 'Contact',
];

$nombreOnglet = count($champs);

include "$racine/vue/header.php";
include "$racine/vue/vueAccueil.php";
include "$racine/vue/footer.php";