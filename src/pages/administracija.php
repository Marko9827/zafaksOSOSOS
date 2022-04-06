 <div class="col left-col left-col-rr">
     <h1>Administracija</h1>
     <p>Menjanje informacija je omogućeno u tabeli, levo.</p>
     <form onsubmit="return false;">
         <table>
             <tr>
                 <th>Slika</th>
                 <th><img class="administracija_img" src="<?php echo URL . "/?image=$_SESSION[indeks]"; ?>" alt=" slika" /></th>
             </tr>
             <tr>
                 <th>Ime i prezime</th>
                 <th><input type="name" value="<?php echo student("username"); ?>" placeholder="Ime i prezime" required /></th>
             </tr>

         </table>

         <button class="btn btn-lg  table_btns btn-primary btn-block" type="submit" onclick="">Sačuvaj izmene</button>
     </form>
 </div>