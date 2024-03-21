<main>
    <?php if (!empty($get_eventID)) {
        $evenement = $event->getEventByID($get_eventID);
        $preview = $photo->getOnePreviewInCollection($evenement['collect']);
        ?>
        <section class ="event">
            <div class="grid-2">
                <div class="description-event">
                    <h2 class="title-pannel title-event"><?=$evenement['titre']?></h2>
                    <p><?=$evenement['description']?></p>
                </div>
                <div class="photo-event">
                    <img data-collect="<?=$evenement['collect']?>" id="photo" class="img-event" src=".<?=$preview['chemin']?>" title="<?=$preview['nom']?>" />
                </div>
            </div>
        </section>
    <?php } else {
        foreach ($events as $evenement) {
            $preview = $photo->getOnePreviewInCollection($evenement['collect']);
            $event_id = $event->getEventIDbyCollect($evenement['collect']); ?>
            <section id="#<?=$evenement['collect']?>" class ="event auto-border">
                <div class="grid-2">
                    <div class="description-event">
                        <h2 class="title-pannel title-event">
                            <a href="?a=evenement&e=<?=$event_id?>" class="title-pannel" ><?=$evenement['titre']?></a>
                        </h2>
                        <p><?=$evenement['description']?></p>
                    </div>
                    <div>
                        <img data-collect="<?=$evenement['collect']?>" id="photo" class="img-event" src=".<?=$preview['chemin']?>" title="<?=$preview['nom']?>" />
                    </div>
                </div>
            </section>
        <?php }
    } ?>
</main>