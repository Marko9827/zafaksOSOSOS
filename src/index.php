<?php
 

include  "./conf.php";
include "./functions.php";

if (loged()) {
    include ROOT . "./templates/dashboard.php";
} else {
    if (!empty($_GET['q'])) {
        if ($_GET['q'] == "Alogin") {
            include ROOT . "/ajax/login.php";
        } else if ($_GET['q'] == "logout") {
            session_start();
            session_unset();
            session_destroy();
            session_write_close();
            setcookie(session_name(), '', 0, '/');
            session_regenerate_id(true);          
                echo 1;
        }  else{

        }
    } else {
        include  ROOT . "/log_reg/login.php";
    }
}
