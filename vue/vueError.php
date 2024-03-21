<?php $cond = ($_SERVER['REMOTE_ADDR'] == '::1' || $_SERVER['REMOTE_ADDR'] == '127.0.0.1')?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/favicon.svg" type="image/svg+xml" />
    <title>Erreur 503</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            <?php if ($cond) { ?>
            text-align: left;
            <?php } else { ?>
            text-align: center;
            <?php } ?>
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
            font-size: 18px;
            margin-left: -2em;
            color: #666;
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
        <ul>
        <?php
        if ($cond) {
            foreach ($infos as $cle => $valeur) {
                echo "<li>$cle$valeur</li>";
            }
        } else {
            echo '
            <h1>Error 500</h1>
            <p>Le serveur semble rencontrer des soucis techniques.</p>
            <p>Veuillez revenir plus tard.</p>
            ';
        }
        ?>
        </ul>
    </div>
</body>
</html>