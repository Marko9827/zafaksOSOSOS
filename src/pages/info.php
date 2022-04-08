<div class="col left-col left-col-rr" style="text-align: center; padding:40px 0px;">

    <img width="60px" height="60px" src="./assets/img/logo.svg" alt="logo" />
    <h5>E-Student</h5>
    <p>Autor: Marko Nikolić</p>
    <p>- Opis -<br>
Moj ispitni projekat E-Student za Razvoj Web Aplikacija.<br>
Projekat će se i dalje razvijati...
</p>
    <p>- Linkovi -</p>

    <?php

    include "./templates/sociallinks.php";

    if(!loged()){
    ?>

    <br>
    <br>
    <button style="width: fit-content; margin:auto" class="btn btn-lg btn-primary btn-block" type="button" onclick="window.location.href ='./';">Prijavi me</button>
<?php } ?>
</div>