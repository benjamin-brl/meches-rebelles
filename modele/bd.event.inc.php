<?php

include_once "bd.inc.php";

class Event extends ConnexionPDO {
    function getAllEvents() {
        $req = $this->cnx->prepare("SELECT titre, description, collect FROM event");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    function getEventByID($id) {
        $req = $this->cnx->prepare("SELECT titre, description, collect FROM event WHERE id=:id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }
    function getEventIDbyCollect($collect) {
        $req = $this->cnx->prepare("SELECT id FROM event WHERE collect=:collect");
        $req->bindValue(':collect', $collect, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC)['id'];
    }
    function getAllEventsID() {
        $req = $this->cnx->prepare("SELECT id FROM event");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}