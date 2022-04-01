<?php

    require_once "./conf.php";
    include "./functions.php";

    if(loged()) {
        header("Location: ./dashboard.php");
    } else{
        header("Location: ./login.php");
    }
    
?>