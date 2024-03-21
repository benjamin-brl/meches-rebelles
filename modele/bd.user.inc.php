<?php

include_once "bd.inc.php";

class User extends ConnexionPDO {
    function getAllUsers() {
        $req = $this->cnx->prepare("SELECT nom, prenom, tel, mail, fonction FROM user");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    function getAllFonctions() {
        $req = $this->cnx->prepare("SELECT DISTINCT fonction FROM user WHERE fonction<>'test'");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    function getUserByID($id) {
        $req = $this->cnx->prepare("SELECT nom, prenom, tel, mail, fonction FROM user WHERE id=:id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }
    function getUsersByFonction($fonction) {
        $req = $this->cnx->prepare("SELECT nom, prenom, tel, mail, fonction FROM user WHERE fonction=:fonction");
        $req->bindValue(':fonction', $fonction, PDO::PARAM_STR);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    function getUserByMail($mail) {
        $req = $this->cnx->prepare("SELECT nom, prenom, tel, mail, fonction FROM user WHERE mail=:mail");
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }
    function getPassByMail($mail) {
        $req = $this->cnx->prepare("SELECT motdepasse FROM user WHERE mail=:mail");
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC)['motdepasse'];
    }
    function getUserIDByMail($mail) {
        $req = $this->cnx->prepare("SELECT id FROM user WHERE mail=:mail");
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC)['id'];
    }
}