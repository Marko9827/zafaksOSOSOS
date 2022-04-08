 <div class="col left-col left-col-rr">
     <h1><?php echo names($_GET['p']); ?> </h1>
     <table>
         <tr>
             <th>Student</th>
             <th>Godina upisa</th>
             <th>Koji put</th>
             <th>Datum upisa</th>
             <th>Smer</th>


         </tr>
         <?php

            echo upisi();

            ?>

     </table>
 </div>