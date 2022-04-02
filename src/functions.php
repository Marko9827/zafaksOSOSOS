<?php

function tpl($what, $page_title){
    include ROOT."/templates/$what.php";
}
function loged()
{
    if (isset($_SESSION['indeks'])) {
        return true;
    } else {
        return false;
    }
}
function query($sql)
{
    global $con;

    try {
        $ex = mysqli_query($con, $sql);
        if ($ex) {
            return $ex;
        }
    } catch (Exception $e) {
    }
    return false;
}
