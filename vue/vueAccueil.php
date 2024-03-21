<main>
    <section id="modal" class="modal">
        <img src=".<?=$photo_onglets[0]['chemin']?>"/>
    </section>
    <section id="onglets" class="onglets">
    <?php
        foreach ($photo_onglets as $photo_onglet) {
            $nom_onglet = $photo_onglet['nom'];
            $photo = $photo_onglet['chemin'];
            $champ_associe = $champs[$nom_onglet] ?? '';
            if ($champ_associe != '') { ?>
                <a id="<?= $nom_onglet ?>" class="onglet">
                    <img src=".<?= $photo ?>" />
                    <span><?= $champ_associe ?></span>
                </a>
            <?php }
        }
        ?>
    </section>
</main>