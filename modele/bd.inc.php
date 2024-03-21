<?php

class ConnexionPDO {
    protected $login;
    protected $mdp;
    protected $bd;
    protected $serveur;
    protected $cnx;
    public function __construct() {
        $this->login = 'magmeches';
        $this->mdp = 'Allandhuy.2002&';
        $this->bd = 'meches_rebelles';
        $this->serveur = 'localhost';
        try {
            $this->cnx = new PDO("mysql:host=$this->serveur;dbname=$this->bd;charset=UTF8", $this->login, $this->mdp);
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
            die();
        }
    }
}