<?php

try { 
    $imgsPath =  "../uploads/profiles/";
    foreach ($_FILES as $key) {
        if ($key['error'] == UPLOAD_ERR_OK) {
            $id_nime =  time() . rand();
            $name = $key['name'];
            $temp = $key['tmp_name'];
            $size = ($key['size'] / 1000000) . "Kb";
            $name = preg_replace('#[^a-z.0-9]#i', '', $name);
            $post_kaboom = explode(".", $name);
            $post_fileExt = end($post_kaboom);
            $name = "$_SESSION[user_id].png";
            move_uploaded_file($temp, $imgsPath . $name);
        }
    }

    //  }
} catch (Exception $e) {
}
