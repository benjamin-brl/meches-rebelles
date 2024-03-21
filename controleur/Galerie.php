<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

$getAllCollection = $photo->getAllCollections();
$getCollect = isset($_GET['c']) ? $_GET['c'] : '';

include "$racine/vue/header.php";
foreach ($getAllCollection as $collect) {
    switch($getCollect) {
        case $collect['collect']:
            $collection = $photo->getCollection($getCollect);
            $photos = $photo->getAllPhotosInCollection($collection);
            break;
    }
}
include "$racine/vue/vueGalerie.php";
include "$racine/vue/footer.php";