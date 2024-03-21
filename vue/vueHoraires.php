<main>
    <section>
        <?php
        $jours = [
            "Lundi" => ["am" => "9h/12h", "pm" => "14h/19h"],
            "Mardi" => ["am" => "9h/12h", "pm" => "14h/19h"],
            "Mercredi" => ["am" => "9h/12h", "pm" => "14h/19h"],
            "Jeudi" => ["am" => "9h/12h", "pm" => "14h/19h"],
            "Vendredi" => ["am" => "9h/12h", "pm" => "14h/19h"],
            "Samedi" => ["am" => "9h/12h", "pm" => "repos"],
            "Dimanche" => ["am" => "repos", "pm" => "repos"]
        ];
        ?>
        <table>
            <caption>Horaires</caption>
            <thead>
                <tr>
                    <th>Jours</th>
                    <th>Matins</th>
                    <th>Après-midi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jours as $jour => $horaires) { ?>
                    <tr>
                        <td><?php echo $jour; ?></td>
                        <td><?php echo $horaires["am"]; ?></td>
                        <td><?php echo $horaires["pm"]; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</main>