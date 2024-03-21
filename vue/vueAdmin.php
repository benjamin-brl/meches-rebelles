<main>
    <section>
        <a href="?a=meches&c=user">Espace utilisateur</a>
        <a href="?a=meches&c=entreprise">Espace entreprise</a>
        <a href="?a=meches&c=hebergeur">Espace hébergeur</a>
    </section>
    <section>
        <?php if ($critere == 'user') {
            $champs = [
                'nom' => 'Nom',
                'prenom' => 'Prenom',
                'tel' => 'Téléphone',
                'mail' => 'Mail',
                'fonction' => 'Fonction'
            ]; 
            $i=0; ?>
            <h2>Utilisateurs :</h2>
            <?php
            foreach ($users_info as $user_info) { ?>
                <form>
                <?php
                foreach ($champs as $cle => $valeur) {
                        $type = ($cle == 'mail' ? 'email' : ($cle == 'tel' ? 'tel' : 'text')); ?>
                        <label for="<?=$cle.$i?>"><?=$valeur?></label>
                        <input type="<?=$type?>" id="<?=$cle.$i?>" name="<?=$cle?>" value="<?=$user_info[$cle]?>"/>
                    <?php } ?>
                    <input type="submit" value="Modifier" id="Modifier" disabled>
                    <input type="submit" value="Supprimer" id="Supprimer" disabled>
                    <input type="checkbox" id="suppr">
                </form>
            <?php $i++; } ?>
        <form>
            <?php foreach ($champs as $cle => $valeur) {
                $type = ($cle == 'mail' ? 'email' : ($cle == 'tel' ? 'tel' : 'text')); ?>
                    <label for="<?=$cle?>"><?=$valeur?></label>
                    <input type="<?=$type?>" id="<?=$cle?>" name="<?=$cle?>" value=""/>
                <?php } ?>
                <input type="submit" value="Ajouter" id="Ajouter">
        </form>
            <?php } else if ($critere == 'entreprise') {
                $champs = [
                    'nom' => 'Nom',
                    'forme_jur' => 'Forme juridique',
                    'capital' => 'Capital',
                    'adresse' => 'Adresse',
                    'siret' => 'SIRET',
                    'tel' => 'Téléphone',
                    'mail' => 'Mail'
                ]; ?>
                <h2>Entreprise :</h2>
                <form>
                <?php foreach ($champs as $cle => $valeur) {
                    $type = ($cle == 'mail' ? 'email' : ($cle == 'tel' ? 'tel' : ($cle == 'capital' ? 'number' : 'text'))); ?>
                    <label for="<?=$cle?>"><?=$valeur?></label>
                    <input type="<?=$type?>" id="<?=$cle?>" name="<?=$cle?>" value="<?=$firm_info[$cle]?>"/>
                <?php } ?>
                    <input type="submit" value="Modifier" id="Modifier" disabled>
                </form>
        <?php } else if ($critere == 'hebergeur') {
            $champs = [
                'nom' => 'Nom',
                'tel' => 'Téléphone',
                'mail' => 'Mail',
                'adresse' => 'Adresse'
            ]; ?>
            <h2>Hebergeur :</h2>
            <form>
            <?php foreach ($champs as $cle => $valeur) {
                $type = ($cle == 'mail' ? 'email' : ($cle == 'tel' ? 'tel' : 'text')); ?>
                <label for="<?=$cle?>"><?=$valeur?></label>
                <input type="<?=$type?>" id="<?=$cle?>" name="<?=$cle?>" value="<?=$host_info[$cle]?>"/>
            <?php } ?>
                <input type="submit" value="Modifier" id="Modifier" disabled>
            </form>
        <?php } ?>
    </section>
</main>