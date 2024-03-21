<main>
    <?php
    if (!empty($photos)) {?>
        <section class="galerie-photo">
        <?php foreach ($photos as $photo) { ?>
            <img id="photo" class="photo" src=".<?=$photo['chemin']?>" title="<?=$photo['nom']?>" />
        <?php }
    } else { ?>
        <section class="galerie-preview">
        <?php foreach ($getAllCollection as $collection) {
            $previews = $photo->getPreviewsInCollection($collection['collect']);
            ?>
            <div class="collection">
                <p class="collection_tag">
                    <a href='?a=galerie&c=<?=$collection['collect']?>'><?=$collection['collect']?></a>
                </p>
                <div class="preview-collection">
                <?php
                    foreach ($previews as $preview) {
                        ?>
                    <a href='?a=galerie&c=<?=$collection['collect']?>' class="preview">
                        <img src=".<?= $preview['chemin']?>" class="carousel-image"/>
                    </a>
                <?php } ?>
                </div>
            </div>
        <?php }
    }
    ?>
    </section>
</main>