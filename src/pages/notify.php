 <div class="col left-col left-col-rr">
     <h1><?php echo names($_GET['p']); ?> </h1>



     <br><br>

     <?php

        $noy = query("SELECT * FROM `notify` ORDER BY  time");
        if (mysqli_num_rows($noy) > 0) {
            while ($row = mysqli_fetch_assoc($noy)) {
        ?>
             <table style="margin: 15px 0px;">

                 <tr>
                     <th>Vreme</th>
                     <th><?php echo "$row[time]"; ?></th>
                 </tr>
                 <tr>
                     <th>Naslov</th>
                     <th><?php echo utf8_decode("$row[title]"); ?></th>
                 </tr>
                 <tr>
                     <th>Poruka</th>
                     <th><?php echo utf8_decode("$row[text]"); ?></th>
                 </tr>
             </table>
     <?php
            }
        }
        ?>

 </div>