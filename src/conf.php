<?php


session_start();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'php_rad1');
define("ROOT",__DIR__);
define("URL", "$_SERVER[HTTP_ORIGIN]/zaFaksOSOSO/zafaksOSOSOS/src/");
define("URL_N", "$_SERVER[HTTP_ORIGIN]/zaFaksOSOSO/zafaksOSOSOS/");

$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$con){
    die("Error: :( " . mysqli_connect_errno());
}
?>