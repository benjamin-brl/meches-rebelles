<?php

include_once "bd.inc.php";

class Photo extends ConnexionPDO {
    function getAllPhotosInCollection($collect) {
        $req = $this->cnx->prepare("SELECT nom, chemin FROM photo WHERE collect=:collect");
        $req->bindValue(':collect', $collect, PDO::PARAM_STR);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    function getPreviewsInCollection($collect) {
        $req = $this->cnx->prepare("SELECT nom, chemin FROM photo WHERE collect=:collect ORDER BY RAND() LIMIT 3");
        $req->bindValue(':collect', $collect, PDO::PARAM_STR);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    function getOnePreviewInCollection($collect) {
        $req = $this->cnx->prepare("SELECT nom, chemin FROM photo WHERE collect=:collect LIMIT 1");
        $req->bindValue(':collect', $collect, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }
    function getAllCollections() {
        $req = $this->cnx->prepare("SELECT DISTINCT collect FROM photo WHERE collect<>'onglets'");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    function getCollection($collect) {
        $req = $this->cnx->prepare("SELECT collect FROM photo WHERE collect=:collect");
        $req->bindValue(':collect', $collect, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC)['collect'];
    }
}