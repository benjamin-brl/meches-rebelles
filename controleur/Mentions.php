<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

$ville_firm = array_slice(explode(" ", $firm_info['adresse']),-2);
$ville_firm_url = str_replace(" ", "+", implode(" ", $ville_firm));

$ville_host = array_slice(explode(" ", $host_info['adresse']),-1);
$ville_host_url = str_replace(" ", "+", implode(" ", $ville_host));

$url_maps = 'https://maps.google.com/maps?output=search&q=';

$sections = [
    'mentions' => ['Mentions légales', 'Mentions légales réglementées par la loi n°78-17 du 6 janvier 1978 relative à l\'informatique, aux fichiers et aux libertés et ainsi que par la loi n° 2004-575 du 21 juin 2004 pour la Confiance dans l\'Économie Numérique.'],

    'edition' => ['Édition du site', [
        'dir_pub' => ['Responsable de la publication', $chef_info['prenom'].' '.$chef_info['nom']],
        'lanser' => ['Langage serveur', 'PHP / SQL'],
        'lancli' => ['Langage client', 'HTML / JS / CSS'],
        'log' => ['Logiciel', '<a href="https://www.phpmyadmin.net/" target="_blank">PMA<a>'],
    ]],

    'entreprise' => ['Informations sur l\'entreprise', [
        'nom' => ['Raison sociale', $firm_info['nom']],
        'forme_jur' => ['Statut juridique', $firm_info['forme_jur']],
        'siret' => ['Numéro de SIRET', $firm_info['siret']],
        'adresse' => ['Adresse', '<a href="'.$url_maps.$ville_firm_url.'" target="_blank">'.$firm_info['adresse'].'</a>'],
        'tel' => ['Téléphone', '<a data-tel="'.$firm_info['tel'].'"></a>'],
        'mail' => ['Email', '<a href="mailto:'.$firm_info['mail'].'">'.$firm_info['mail'].'</a>']
    ]],

    'hebergeur' => ['Informations sur l\'hebergeur', [
        'nom' => ['Nom', $host_info['nom']],
        'adresse' => ['Adresse', '<a href="'.$url_maps.$ville_host_url.'" target="_blank">'.$host_info['adresse'].'</a>'],
        'tel' => ['Téléphone', '<a data-tel="'.$host_info['tel'].'"></a>'],
        'mail' => ['Email', '<a href="mailto:'.$host_info['mail'].'">'.$host_info['mail'].'</a>']
    ]],

    'propriete' => ['Propriété intéllectuelle', 'Tout le contenu présent sur le site <a href="'.$domaine.'">'.$site.'</a> est la propriété exclusive de '.$firm_info['nom'].' et est protégé par les lois françaises et internationales relatives à la propriété intellectuelle.'],

    'liens' => ['Liens externes', 'Les liens hypertextes présentés sur le site en direction de ressources extérieures n\'engagent pas la responsabilité de la société '.$firm_info['nom'].'.
    La création de liens hypertextes vers le présent site ne peut se faire sans l\'autorisation expresse et préalable de la société '.$firm_info['nom'].'.'],

    'responsabilite' => ['Responsabilité', 'La société '.$firm_info['nom'].' vérifie l\'exactitude des informations mentionnées sur le site. Cependant, elle n\'offre aucune garantie, qu\'elle soit expresse ou tacite, concernant le contenu de ce site, et ne peut être tenue responsable des dommages directs ou indirects découlant de l\'utilisation de ce site.']
    ];

include "$racine/vue/header.php";
include "$racine/vue/vueMentions.php";
include "$racine/vue/footer.php";