 <div class="col left-col">
     <p-s>Stanje na računu: 100</p-s>
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

            echo table_ispiti("ispiti_od_studenta");

            ?>

     </table>
 </div>