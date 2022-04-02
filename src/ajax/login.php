<?php


if (!isset($_POST['indeks'], $_POST['password'])) {
    exit("Popunite polja!");
} else {
    $sql = query("SELECT * FROM `studenti` WHERE `indeks` = $_POST[indeks]");

    if (mysqli_num_rows($sql) > 0) {
        if ($row = mysqli_fetch_assoc($sql)) {
            if ($_POST['password'] == $row['password']) {
                session_regenerate_id();
                $_SESSION['logged'] = true;
                $_SESSION['indeks'] = $row['indeks'];
                echo 1;
            } else{
                exit("Šifra nije tačna!");
            }
        }else{
            exit("Šifra nije tačna!");

        }
    }
}



exit();
