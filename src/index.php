<?php

require_once "./conf.php";
include "./functions.php";

if (loged()) {
    include ROOT . "./dashboard.php";
} else {
    if (!empty($_GET['q'])) {
        if ($_GET['q'] == "Alogin") {
            include ROOT . "/ajax/login.php";
        } else {
            include  ROOT . "/log_reg/login.php";
        }
    } else {
        include  ROOT . "/log_reg/login.php";
    }
}
