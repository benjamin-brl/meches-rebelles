<?php
if ( $_SERVER['SCRIPT_FILENAME'] == __FILE__ ){
    $racine='..';
}

// Récupération de l'IP pour tentative d'accès à l'espace admin
$ip_client = $_SERVER['REMOTE_ADDR'];
$getIP->setIP($ip_client);

$login_info = $auth->getLoggedOn();
$mail = $login_info['mail'] != '' ? $login_info['mail'] : '';
$pass = $login_info['pass'] != '' ? $login_info['pass'] : '';
$isAdmin = $admin->isAdmin($mail, $pass);

if ($isAdmin) {

    $users_info = $user->getAllUsers();

    // Récupération du critère
    $critere = isset($_GET['c']) ? $_GET['c'] : 'user';
    
    // Appel des affichages 
    include "$racine/vue/header.php";
    include "$racine/vue/vueAdmin.php";
    include "$racine/vue/footer.php";

    if (isset($_GET['logout']) && $_GET['logout'] == 1) {
        $auth->logout();
    }
    
    if (!empty($_POST)) {
        // Récuperation des données
        $champs = [
            'id' => 'id',
            'nom' => 'nom',
            'prenom' => 'prenom',
            'tel' => 'tel',
            'mail' => 'mail',
            'fonction' => 'fonction',
            'forme_jur' => 'forme_jur',
            'capital' => 'capital',
            'siret' => 'siret',
            'adresse' => 'adresse'
        ];
    
        foreach ($champs as $cle => $valeurs) {
            $$valeurs = isset($_POST[$cle]) ? $_POST[$cle] : '';
        }
    
        extract(compact(array_values($champs)), EXTR_OVERWRITE);
    
        // Envoie des nouvelles données selon cas
        switch($critere){
            case 'user':
                $id = $user->getUserIDByMail($mail);
                if (isset($_GET['del']) && $_GET['del'] == 1) {
                    $admin->deleteUserByID($id);
                } else if (isset($_GET['add']) && $_GET['add'] == 1) {
                    $admin->addUser($nom, $prenom, $tel, $mail, $fonction);
                } else {
                    $admin->updateUserByID($id, $nom, $prenom, $tel, $mail, $fonction);
                }
                break;
    
            case 'entreprise':
                $admin->updateFirmByID($nom, $forme_jur, $capital, $adresse, $siret, $tel, $mail);
                break;
    
            case 'hebergeur':
                $admin->updateHostByID($nom, $tel, $mail, $adresse);
                break;
        }
    }
} else {
    include "$racine/vue/header.php";
    include "$racine/vue/vueLogin.php";
    include "$racine/vue/footer.php";
    if (isset($_POST['mail']) && isset($_POST['pass'])) {
        // Récuperation des données
        $champs = [
            'mail' => 'mail',
            'pass' => 'pass'
        ];

        foreach ($champs as $cle => $valeurs) {
            $$valeurs = isset($_POST[$cle]) ? $_POST[$cle] : '';
        }

        extract(compact(array_values($champs)), EXTR_OVERWRITE);
        $mail = strip_tags(trim($mail));
        $pass = strip_tags(trim($pass));
        $auth->login($mail, crypt($pass, "$1$$mail"));
    }
}