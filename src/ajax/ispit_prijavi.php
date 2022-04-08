<?php

include "../conf.php";
include "../functions.php";
$q = "";
if (vecPrijavljenIspit("$_POST[id_predmeta]") !== true) {

    if (moneyH() >= 500) {
        if (!isset($_POST['id_studenta'], $_POST['id_predmeta'])) {

$prijavaBroj = 1;

            $true = false;
            $q = query("INSERT INTO `prijavljeni_ispiti` 
               (`id_studenta`, 
               `ispit`, 
               `brojPrijava`, 
               `napomene`, 
               `id_predmeta`, 
               `indeks`
               ) 
        VALUES ('$_SESSION[user_id]', 
        '$_POST[ispit]', 
        '$prijavaBroj', 
        '', 
        '$_POST[id_predmeta]',
        '$_SESSION[indeks]'
        );");

        $racun = intval(moneyH());
        $racun -= 500;
        query("UPDATE `racun` SET `money` = '$racun' WHERE `racun`.`indeks` = $_SESSION[indeks]");
            if ($q) {
                $true = 1;
            }
 
            echo  $true;
        }
    } else {
        echo "Nedevoljan iznos(novac) na vašem računu!";
    }
} else {
    echo "Ispit je već prijavljen!";
}

 
