 <div class="col left-col left-col-rr sa_tabovima
 ">
     <h1><?php echo names($_GET['p']); ?> </h1>
     <p>Ovo je <strong>Demo</strong> verzija. Neke informacije nećete moći da vidite ili izmenite.<br>Hvala na razumevanju!</p>
 
     <nav>
         <div class="nav nav-tabs" id="nav-tab" role="tablist">
             <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Predmeti</button>
             <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Ispiti</button>
             <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Studenti</button>
         </div>
     </nav>
     <div class="tab-content" id="nav-tabContent">
         <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
             <table>
                 <tr>
                     <th>Ime Predmeta</th>
                     <th>Opis</th>
                     <th>Profesor</th>
                     <th>Broj upisanih studenata</th>
                     <th>Link predmeta</th>
                     <th>Asistent</th>

                 </tr>
                 <?php

                    $studenti_h = query("SELECT * FROM `predmeti`");

                    if (mysqli_num_rows($studenti_h) > 0) {
                        while ($row = mysqli_fetch_assoc($studenti_h)) {
                            echo "
                            <tr>
                      <th>$row[Ime_predmeta]</th>
                     <th>$row[opis]</th>
                     <th>$row[Profesor]</th>
                     <th>$row[upisanih_studenata]</th>
                     <th>$row[link_predmeta]</th>
                     <th>$row[asistent]</th>

                     </tr>";
                        }
                    }
                    ?>

             </table>
         </div>
         <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
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

                    echo table_ispiti("ispiti_profesor");

                    ?>

             </table>
         </div>
         <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
             <table>
                 <tr>
                     <th>Slika</th>
                     <th>Ime i prezime</th>
                     <th>Datum rođenja</th>
                     <th>Indeks</th>
                     <th>Upisao</th>
                 </tr>
                 <?php
                    $studenti_h = query("SELECT * FROM `studenti`");

                    if (mysqli_num_rows($studenti_h) > 0) {
                        while ($row = mysqli_fetch_assoc($studenti_h)) {


                            $new = substr("$row[indeks]", 0, -3) . '***';

                            echo "
                            <tr>
                     <th><img  onerror=\"$(this).attr('src','./assets/img/user.svg');\" class='img_mod_profesora_table' src='./?image=$row[indeks]' alt='aet' /></th>
                     <th>$row[username]</th>
                     <th>$row[datumRodjenja]</th>
                     <th>$new</th>
                     <th>$row[upisao]</th>
                 </tr>";
                        }
                    }


                    ?>

             </table>
         </div>
     </div>
 </div>