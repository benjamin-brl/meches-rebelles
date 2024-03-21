<?php

class Auth {
    function __construct() {
        session_start();
    }
    public function login($mail, $pass) {
        $_SESSION['mail'] = $mail;
        $_SESSION['pass'] = $pass;
    }
    public function logout() {
        unset($_SESSION['mail']);
        unset($_SESSION['pass']);
        session_unset();
        session_destroy();
        setcookie(session_name(), '', time());
        header("Location: ?a=accueil");
    }
    public function getLoggedOn(){
        if (isset($_SESSION['mail']) && isset($_SESSION['pass'])) {
            return [
                'mail' => $_SESSION['mail'],
                'pass' => $_SESSION['pass']
            ];
        } else {
            return [
                'mail' => '',
                'pass' => ''
            ];
        }
    } 
    public function isLoggedOn() {
        return True ? (isset($_SESSION['mail']) && isset($_SESSION['pass'])) : False;
    }
}