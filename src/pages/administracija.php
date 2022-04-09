 <div class="col left-col left-col-rr">
     <h1><?php echo names($_GET['p']); ?> </h1>
     <p>Menjanje informacija je omogućeno u tabeli, levo.</p>
     <form onsubmit="return false;" id="administracija_form_ha">
         <table>
             <tr>
                 <th>Slika</th>
                 <th><img onerror="$(this).attr('src','./assets/img/user.svg');" class="administracija_img" id="administracija_img" onclick=" document.getElementById('administracija_img_file').click();" src="<?php echo URL . "/?image=$_SESSION[indeks]"; ?>" alt=" slika" />
                     <input multiple id="administracija_img_file" style="display: none;" type="file" onchange="changeH(this);" accept="image/*" />
                 </th>
             </tr>
             <tr>
                 <th>Ime i prezime</th>
                 <th><input type="text" name="username" id="username" value="<?php echo student("username"); ?>" placeholder="Ime i prezime" required /></th>
             </tr>
             <tr>
                 <th>Indeks</th>
                 <th style="cursor:not-allowed;"><?php echo student("indeks"); ?></th>
             </tr>

             <tr>
                 <th>Datum rođenja</th>
                 <th><input type="date" name="datumRodjenja" id="datumRodjenja" placeholder="Datum rođenja" value="<?php echo student("datumRodjenja"); ?>" name="date_pnt" required /></th>
             </tr>
             <tr>
                 <th>Upisao</th>
                 <th style="cursor:not-allowed;"><input style="pointer-events:none;" type="text" name="upisao" id="upisao" value="<?php echo Specific("sta_je_upisao", "upisi",  $_SESSION['user_id']); ?>" placeholder="Upisao" required /></th>
             </tr>
         </table>

         <button class="btn btn-lg  table_btns btn-primary btn-block" type="submit" onclick="sumbitbtn();">Sačuvaj izmene</button>
     </form>
 </div>