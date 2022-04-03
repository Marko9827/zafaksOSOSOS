<?php


include  "./conf.php";
include "./functions.php";


if (!empty($_GET['q'])) {
    if ($_GET['q'] == "Alogin") {
        include ROOT . "/ajax/login.php";
    } else if ($_GET['q'] == "logout") {
        
        session_destroy();
         
        echo 1;
    } else {
    }
} else if (!empty($_GET['image'])) {
    $path = "./uploads/profiles/$_GET[image].png";
    if (file_exists($path)) {
        header("content-type: image/png");
        readfile($path);
        exit();
    }
} else {
    if (loged()) {
        include ROOT . "./templates/dashboard.php";
    } else {
        include  ROOT . "/log_reg/login.php";
    }
}
