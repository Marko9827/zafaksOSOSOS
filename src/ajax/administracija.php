<?php

if (isset($_POST)) {

include "../conf.php";
include "../functions.php";
$sql = "";

$v = 0;
$username = $_POST['username'];
$sqlH = "UPDATE `studenti` SET 
         `studenti`.`username` = '$username', 
         `studenti`.`datumRodjenja` = '$_POST[datumRodjenja]', 
         `studenti`.`upisao` = '$_POST[upisao]' 
        WHERE `studenti`.`indeks` = $_SESSION[indeks]";
$sql =  query("$sqlH");

if($sql){
$v = 1;}

// echo $sqlH;
   echo $v;
// }
}