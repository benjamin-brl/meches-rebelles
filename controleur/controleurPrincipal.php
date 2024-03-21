<?php
class ControleurPrincipal {
    private $actions = [
        "accueil" => "Accueil.php",
        "evenement" => "Evenement.php",
        "horaires" => "Horaires.php",
        "secteur" => "Secteur.php",
        "contact" => "Contact.php",
        "galerie" => "Galerie.php",
        "meches" => "Admin.php",
        "mentions" => "Mentions.php"
    ];
    public function getAction($action) {
        return array_key_exists($action, $this->actions) ? $this->actions[$action] : $this->actions["accueil"];
    }
}