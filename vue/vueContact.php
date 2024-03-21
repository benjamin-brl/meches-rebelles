<main>
    <?php if (!empty($get_fonction)) {
        $users = $user->getUsersByFonction($get_fonction); ?>
        <section>
            <h2><a class="title-pannel">Contact <?=$get_fonction?></a></h2>
            <div class="grid-2">
                <?php foreach ($users as $user_info) { ?>
                    <p id="#<?=$user_info['nom']?>"  class="column">
                    <span class="info">
                        <a href="#<?=$user_info['nom']?>"><?=$user_info['nom'].' '.$user_info['prenom']?></a>
                    </span>
                    <?php foreach ($user_info as $info => $value) { ?>
                        <span class="pannel-element">
                        <?php if ($info != 'tel' && $info != 'mail') { ?>
                            <?=$value?>
                        <?php } else if ($info == 'tel' || $info == 'mail') { ?>
                            <a data-<?=$info?>='<?=$value?>'></a>
                        <?php } ?>
                        </span>
                    <?php } ?>
                    </p>
                <?php } ?>
            </div>
        </section>
    <?php
    } else {
        foreach ($fonctions as $fonction) {
            $fonction = $fonction['fonction'];
            $users = $user->getUsersByFonction($fonction); ?>
            <section class="auto-border">
                <h2><a href="?a=contact&f=<?=$fonction?>" class="title-pannel">Contact <?=$fonction?></a></h2>
                <div class="grid-2">
                <?php foreach ($users as $user_info) { ?>
                    <p class="column">
                    <span class="info">
                        <a href="?a=contact&f=<?=$fonction?>#<?=$user_info['nom']?>"><?=$user_info['nom'].' '.$user_info['prenom']?></a>
                    </span>
                    <?php foreach ($user_info as $info => $value) { ?>
                        <span class="pannel-element">
                        <?php if ($info != 'tel' && $info != 'mail') { ?>
                            <?=$value?>
                        <?php } else { ?>
                            <a data-<?=$info?>='<?=$value?>'></a>
                        <?php } ?>
                        </span>
                    <?php } ?>
                    </p>
                <?php } ?>
                </div>
            </section>
    <?php }
    }?>
</main>