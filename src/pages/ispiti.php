<div class="col left-col left-col-rr">

    <h1><?php echo names($_GET['p']); ?> </h1>
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

</div>