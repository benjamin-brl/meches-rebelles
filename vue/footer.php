<footer>
    <p>Méches Rebelles © - <a href="?a=mentions"> Mentions Légales </a> - 2023</p>
    <p>Contact -
        <a href="?a=contact&f=dev"> Développeur </a> - 
        <a href="https://twitter.com/BenjaminA2mains" target="_blank" >
            <img src="https://abs.twimg.com/favicons/twitter.2.ico" width="20px" height="20px"/>
        </a>
    </p>
</footer>

<script type="text/javascript" src='js/main.js'></script>
<script type="text/javascript" src='js/rewriter.js'></script><?php
$SPP = [
    'Secteur' => ['circle.js'],
    'Evenement' => ['GoToCollect.js', 'overphoto.js'],
    'Galerie' => ['overphoto.js'],
    'Admin' => ['form.js']
];

foreach ($SPP as $p => $src) {
    if ($p == $page) {
        foreach ($src as $s => $script) { ?>
            <script type="text/javascript" src="js/<?=$script?>"></script>
        <?php }
    }
}
?>
</body>
</html>