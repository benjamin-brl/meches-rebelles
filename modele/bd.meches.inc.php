<?php

include_once "bd.inc.php";

class Admin extends ConnexionPDO {
    private $utilisateur;

    function updateUserByID($id, $nom, $prenom, $tel, $mail, $fonction) {
        $req = $this->cnx->prepare("UPDATE user SET
        nom=IFNULL(:nom, nom),
        prenom=IFNULL(:prenom, prenom),
        tel=IFNULL(:tel, tel),
        mail=IFNULL(:mail, mail),
        fonction=IFNULL(:fonction, fonction)
        WHERE id=:id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $req->bindValue(':tel', $tel, PDO::PARAM_STR);
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $req->bindValue(':fonction', $fonction, PDO::PARAM_STR);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    function updateFirmByID($nom, $forme_jur, $capital, $adresse, $siret, $tel, $mail) {
        $req = $this->cnx->prepare("UPDATE entreprise SET
        nom=IFNULL(:nom, nom),
        forme_jur=IFNULL(:forme_jur, forme_jur),
        capital=IFNULL(:capital, capital),
        adresse=IFNULL(:adresse, adresse),
        siret=IFNULL(:siret, siret),
        tel=IFNULL(:tel, tel),
        mail=IFNULL(:mail, mail)
        WHERE id=1");
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':forme_jur', $forme_jur, PDO::PARAM_STR);
        $req->bindValue(':capital', $capital, PDO::PARAM_STR);
        $req->bindValue(':adresse', $adresse, PDO::PARAM_STR);
        $req->bindValue(':siret', $siret, PDO::PARAM_STR);
        $req->bindValue(':tel', $tel, PDO::PARAM_STR);
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }
    function updateHostByID($nom, $tel, $mail, $adresse) {
        $req = $this->cnx->prepare("UPDATE hebergeur SET
        nom=IFNULL(:nom, nom),
        tel=IFNULL(:tel, tel),
        mail=IFNULL(:mail, mail),
        adresse=IFNULL(:adresse, adresse)
        WHERE id=1");
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':tel', $tel, PDO::PARAM_STR);
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $req->bindValue(':adresse', $adresse, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }
    function deleteUserByID($id) {
        $req = $this->cnx->prepare("DELETE FROM user WHERE id=:id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }
    function addUser($nom, $prenom, $tel, $mail, $fonction) {
        $req = $this->cnx->prepare("INSERT INTO user (nom, prenom, tel, mail, fonction) VALUES(:nom,:prenom,:tel,:mail,:fonction)");
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $req->bindValue(':tel', $tel, PDO::PARAM_STR);
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $req->bindValue(':fonction', $fonction, PDO::PARAM_STR);
        $req->execute();
    }
    function isAdmin($mail, $pass) {
        $req = $this->cnx->prepare("SELECT estAdmin FROM administration WHERE mail=:mail AND EXISTS (SELECT 1 FROM user WHERE motdepasse=:pass AND mail=:mail)");
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $req->bindValue(':pass', $pass, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }
}