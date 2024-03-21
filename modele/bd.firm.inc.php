<?php

include_once "bd.inc.php";

class Firm extends ConnexionPDO {
    function getAllFirms() {
        $req = $this->cnx->prepare("SELECT * FROM entreprise");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    function getFirmByID($id) {
        $req = $this->cnx->prepare("SELECT * FROM entreprise WHERE id=:id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }
}