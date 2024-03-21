<?php

include_once "bd.inc.php";

class Host extends ConnexionPDO {
    function getAllHosts() {
        $req = $this->cnx->prepare("SELECT * FROM hebergeur");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    function getHostByID($id) {
        $req = $this->cnx->prepare("SELECT * FROM hebergeur WHERE id=:id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }
}