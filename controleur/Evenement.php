<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

$ids = [];
$get_eventsIDs = $event->getAllEventsID();
$get_eventID = isset($_GET['e']) ? $_GET['e'] : '';

foreach($get_eventsIDs as $id) {
    array_push($ids, $id['id']);
}

$get_eventID = !in_array($get_eventID, $ids) ? '' : $_GET['e'];

$events = $event->getAllEvents();

include "$racine/vue/header.php";
include "$racine/vue/vueEvenement.php";
include "$racine/vue/footer.php";