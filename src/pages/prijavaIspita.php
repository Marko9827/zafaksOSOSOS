<?php





?>


<div class="col left-col left-col-rr">
    <p-s>Stanje na računu: <?php echo moneyH(); ?></p-s><br>
    <button class="btn btn-lg    btn-primary" style="padding: 4px !important;" type="submit" onclick="dodaj_pare();"><i class="bi bi-wallet2"></i> Dodaj novac +500 rsd</button>

    <br><br>
    <h1>Ispiti koje mogu da prijavim</h1>

    <table>
        <tr>
            <th>Ime ispita</th>
            <th>Datum ispita</th>
            <th>Profesor</th>
            <th>Kolokvijum 1</th>
            <th>Kolokvijum 2</th>
            <th>Zaključna ocena</th>
            <th>Broj prijava</th>
            <th></th>
        </tr>
        <?php

        echo table_ispiti("prijavi");

        ?>

    </table>

    <br><br>
    <h1>Prijavljeni ispiti</h1>
    <table>
        <tr>
            <th>Ime ispita</th>
            <th>Datum ispita</th>
            <th>Profesor</th>
            <th>Kolokvijum 1</th>
            <th>Kolokvijum 2</th>
            <th>Zaključna ocena</th>
            <th>Broj prijava</th>

        </tr>
        <?php

        echo table_ispiti("prijavljeni");

        ?>

    </table>
    <bR>
    <br>
    <br>
</div>