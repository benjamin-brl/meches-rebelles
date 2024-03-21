<main>
    <?php foreach($sections as $section => $pannel) { ?>
        <section class="auto-border">
            <h2 id="<?=$section?>"><a href="#<?=$section?>" class="title-pannel"><?=$pannel[0]?></a></h2>
            <?php if ($section == 'entreprise' || $section == 'hebergeur' || $section == 'edition' ) { ?>
                <div class="grid-2">
                <?php foreach($pannel[1] as $champ => $valeur) { ?>
                    <p id="<?=$champ?>">
                        <?=$valeur[0]?> :
                        <span class="pannel-element">
                            <strong>
                                <?=$valeur[1]?>
                            </strong>
                        </span>
                    </p>
                <?php } ?>
                </div>
            <?php } else { ?>
                <p class="pannel-others">
                    <?=$pannel[1]?>
                </p>
            <?php } ?>
        </section>
    <?php } ?>
</main>