<?php

if (isset($_POST)) {
    $v = 0;
    $sql =  query("UPDATE `studenti` 
    SET `username` = $_POST[username], 
    `datumRodjenja` = $_POST[datumRodjenja],
    `indeks` = $_POST[indeks], 
    `upisao` = $_POST[upisao]
    WHERE `studenti`.`id` = $_SESSION[user_id]");

    if ($sql) {
        $v = 1;
    }


    return $v;
}
