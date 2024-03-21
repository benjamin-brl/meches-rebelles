<?php

include_once "$racine/modele/auth.php";
include_once "$racine/modele/bd.firm.inc.php";
include_once "$racine/modele/bd.host.inc.php";
include_once "$racine/modele/bd.ip.inc.php";
include_once "$racine/modele/bd.meches.inc.php";
include_once "$racine/modele/bd.user.inc.php";
include_once "$racine/modele/bd.photo.inc.php";
include_once "$racine/modele/bd.event.inc.php";
include_once "$racine/controleur/controleurPrincipal.php";

$controleur = new ControleurPrincipal;
$auth = new Auth;
$firm = new Firm;
$host = new Host;
$getIP = new IP;
$admin = new Admin;
$user = new User;
$photo = new Photo;
$event = new Event;