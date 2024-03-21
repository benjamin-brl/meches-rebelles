<?php
$racine = dirname(__FILE__);

include_once "$racine/controleur/controleurUserAgent.php";
$verifIP = new verifIP;

// ! Vérifie si l'IP n'est pas sur liste noire
$ip_client = $_SERVER['REMOTE_ADDR'];
$ok = $verifIP->verif($ip_client);
if ($ok) {
    // ! Vérifie si l'IP ne fait pas une tentative de DDOS ou de DOS
    $verifIP->writeIPLog($ip_client);
    $ifSpam = $verifIP->ifIPSpam($ip_client);
    if (!$ifSpam) {
        // Si l'IP est saint alors on poursuit
        include_once "$racine/controleur/getClass.php";
        isset($_GET["a"]) ? $fichier = $controleur->getAction($_GET["a"]) : $fichier = $controleur->getAction("accueil");
        $domaine = 'https://'.$_SERVER['SERVER_NAME'].'/';
        $site = substr($domaine, 8, -1);
        $page = pathinfo($fichier)['filename'];
        $chef_info = $user->getUserByMail('mechesmag@gmail.com');
        $firm_info = $firm->getFirmByID(1);
        $host_info = $host->getHostByID(1);
        include "$racine/controleur/$fichier";
    } else {
        // Si l'IP est suspecté de spam alors on l'ajoute dans la liste noire
        // et on inclue la vue pour les bots
        $getIP->setIPBan($ip_client);
        include "$racine/vue/vueBot.php";
    }
} else {
    // Si l'IP est dans la liste noire,
    // alors on inclue la vue pour les bots
    include "$racine/vue/vueBot.php";
}