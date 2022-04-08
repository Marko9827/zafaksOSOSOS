<?php

#include "./vendor/autoload.php";

include  "./conf.php";
include "./functions.php";





if (!empty($_GET['q'])) {
    if ($_GET['q'] == "Alogin") {
        include ROOT . "/ajax/login.php";
    } else if ($_GET['q'] == "administracija") {
     //   if (loged()) {
            include ROOT . "/ajax/administracija.php";
       // }
    } else if ($_GET['q'] == "logout") {
        session_destroy();
        echo 1;
    } else if ($_GET['q'] == "uploader") {
        try {
            $imgsPath =  __DIR__."/uploads/profiles/";
            foreach ($_FILES as $key) {
                if ($key['error'] == UPLOAD_ERR_OK) {
                    $id_nime =  time() . rand();
                    $name = $key['name'];
                    $temp = $key['tmp_name'];
                    $size = ($key['size'] / 1000000) . "Kb";
                    $name = preg_replace('#[^a-z.0-9]#i', '', $name);
                    $post_kaboom = explode(".", $name);
                    $post_fileExt = end($post_kaboom);
                    $name = "$_SESSION[indeks].png";
                    move_uploaded_file($temp, $imgsPath . $name);
                }
            }

            //  }
        } catch (Exception $e) {
        }
    } else if ($_GET['q'] == "ispit_prijavi") {
       include  "./ajax/ispit_prijavi.php";
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
        if (!empty($_GET['p'])) {
            if (loged()) {

                tpl("header_tpl", "E-student, Kontrolna tabla ");
                tpl("navbar_tpl", "");
?>
                <div-breadcrumb>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./?p=home">Početna</a></li>
                            <?php if ($_GET['p'] !== "home") { ?>
                                <li class="breadcrumb-item active" aria-current="page"><a href="./?p=<?php echo $_GET['p']; ?>"><?php echo names($_GET['p']); ?></a></li>
                            <?php } ?>
                        </ol>
                    </nav>
                </div-breadcrumb>
                <main>


                    <section id="welcome">
                        <div class="container">
                            <div class="row">
                                <?php
                                include ROOT . "/templates/Sleft_col_tpl.php";
                                include ROOT . "./pages/$_GET[p].php";

                                ?>
                            </div>

                        </div>
                    </section>
                </main>
                <script src="<?php echo URL_N; ?>/node_modules/jquery/dist/jquery.min.js"></script>
                <script src="<?php echo URL_N; ?>/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
                <script src="<?php echo URL; ?>/app.js"></script>
                <script src="<?php echo URL; ?>/assets/js/main.js"></script>
<?php
            } else {
                include  ROOT . "/log_reg/login.php";
            }
        } else {
            header("location: ./?p=home");
        }
    } else {
        include  ROOT . "/log_reg/login.php";
    }
}

exit();