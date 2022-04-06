 <div class="col left-col left-col-rr">
     <h1><?php echo Lang("administracija"); ?> </h1>
     <p>Menjanje informacija je omogućeno u tabeli, levo.</p>
     <form onsubmit="return false;" id="administracija_form_ha">
         <table>
             <tr>
                 <th>Slika</th>
                 <th><img class="administracija_img" id="administracija_img" onclick=" document.getElementById('administracija_img_file').click();" src="<?php echo URL . "/?image=$_SESSION[indeks]"; ?>" alt=" slika" />
                     <input id="administracija_img_file" style="display: none;" type="file" onchange="changeH(this);" accept="image/*" />
                 </th>
             </tr>
             <tr>
                 <th>Ime i prezime</th>
                 <th><input type="name" value="<?php echo student("username"); ?>" placeholder="Ime i prezime" required /></th>
             </tr>
             <tr>
                 <th>Indeks</th>
                 <th><input type="number" value="<?php echo student("indeks"); ?>" placeholder="Ime i prezime" required /></th>
             </tr>
             <tr>
                 <th>Jezik interfejsa</th>
                 <th><select name="lang_options">
                         <option value="en">Engleski</option>
                         <option value="rs">Srpski</option>
                     </select></th>
             </tr>
             <tr>
                 <th>Datum rođenja</th>
                 <th><input type="date" name="date_pnt" /></th>
             </tr>
         </table>

         <button class="btn btn-lg  table_btns btn-primary btn-block" type="submit" onclick="">Sačuvaj izmene</button>
     </form>
 </div>