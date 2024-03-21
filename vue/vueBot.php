<?php
include_once "$racine/modele/getInfoIP.php";
include_once "$racine/modele/getInfo.Nav.OS.php";
$ip_client = $_SERVER['REMOTE_ADDR'];
$infoIP = getInfoIP($ip_client);
$infoNav = getInfoNav();
$infoOS = getInfoOS();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/favicon.svg" type="image/svg+xml" />
    <title>Erreur 403</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            text-align: center;
            margin-top: 20px;
        }

        h1 {
            font-size: 32px;
            color: #333;
        }

        p {
            font-size: 18px;
            color: #666;
        }

        ul {
            list-style-type: none;
        }

        li {
            margin-left: -2em;
        }

        li:first-child {
            margin-top: -.8em;
        }

        .info {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Erreur 403</h1>
        <p>Votre adresse IP est bannie ou vous semblez être un bot.</p>
        <?php if (is_array($infoIP)) { ?>
        <div class="info">
            <p>Votre adresse IP : <?=$ip_client?></p>
        </div>
        <div class="info">
            <p>Provenance de l'IP :
                <ul>
                    <?php
                    $champs = [
                        'geoplugin_continentName',
                        'geoplugin_countryName',
                        'geoplugin_regionName',
                        'geoplugin_city'
                    ];
                    foreach ($champs as $cle) { ?>
                        <li><?=$infoIP[$cle]?></li>
                    <?php } ?>
                </ul>
            </p>
        </div>
        <div class="info">
            <p>Navigateur utilisé : <?=$infoNav['nav']?></p>
        </div>
        <div class="info">
            <p>Version du navigateur : <?=$infoNav['version']?></p>
        </div>
        <div class="info">
            <p>Langue du navigateur : <?=$infoNav['langue']?></p>
        </div>
        <div class="info">
            <p>OS utilisé : <?=$infoOS['os']?></p>
        </div>
        <div class="info">
            <p>Version de l'OS : <?=$infoOS['version']?></p>
        </div>
        <?php } else { ?>
        <div class="info">
            <p><?=$infoIP?></p>
        </div>
        <?php } ?>
    </div>
</body>
</html>