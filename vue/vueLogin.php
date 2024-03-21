<main>
    <section>
        <?php $champs = [
                'mail' => 'Mail',
                'pass' => 'Mot de passe'
            ]; ?>
        <form>
            <?php foreach ($champs as $cle => $valeur) {
                $type = ($cle == 'mail' ? 'email' : ($cle == 'pass' ? 'password' : 'text')); ?>
                <label for="<?=$cle?>"><?=$valeur?></label>
                <input type="<?=$type?>" id="<?=$cle?>" name="<?=$cle?>" required/>
            <?php } ?>
            <input type="submit" value="Valider" id="Valider" disabled>
        </form>
    </section>
</main>