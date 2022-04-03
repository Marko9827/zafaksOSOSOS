<?php

function tpl($what, $page_title)
{
    include ROOT . "/templates/$what.php";
}
function loged()
{
    if (isset($_SESSION['indeks'])) {
        return true;
    } else {
        return false;
    }
}

function Specific($what)
{
    $sql = query("SELECT * FROM users WHERE indeks = $_SESSION[indeks] ");
    if (mysqli_num_rows($sql)) {
        while ($row = mysqli_fetch_assoc($sql)) {
            return $row[$what];
        }
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
