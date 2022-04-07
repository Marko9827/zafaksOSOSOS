<?php

try {

    $dateTime = time();
    $comment_id = rand(0, 9999999) + time();


    /* "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')");

*/



    //INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES ('1', '8', '1', 'test')


  
        $imgsPath =  "../uploads/profiles/$_SESSION[user_id].png";
        foreach ($_FILES as $key) {
            try {
                $id_nime =  time() . rand();
                $name = $key['name'];
                $temp = $key['tmp_name'];
                $size = ($key['size'] / 1000000) . "Kb";
                $name = preg_replace('#[^a-z.0-9]#i', '', $name);
                $post_kaboom = explode(".", $name);
                $post_fileExt = end($post_kaboom);
                $name = $id_nime . "." . $post_fileExt;
                move_uploaded_file($temp, $imgsPath . $name);
            } catch (Exception $e) {
            }
        }
  //  }
} catch (Exception $e) {
}
