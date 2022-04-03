<?php

#include "./vendor/autoload.php";



include  "./conf.php";
include "./functions.php";



if (!empty($_GET['q'])) {
    if ($_GET['q'] == "Alogin") {
        include ROOT . "/ajax/login.php";
    } else if ($_GET['q'] == "logout") {
        session_destroy();
        echo 1;
    } else if ($_GET['q'] == "ispit_prijavi") {
        if (moneyH() > 500) {
            if (!isset($_POST['id_studenta'], $_POST['id_predmeta'])) {
                $true = false;
                if (intval(Specific("id_studenta", "prijavljeni_ispiti", "id_predmeta")) !== intval($_POST['id_studenta'])) {
                    $q = query("INSERT INTO `prijavljeni_ispiti` 
               (`id_studenta`, `ispit`, `brojPrijava`, `napomene`, `id_predmeta`) 
        VALUES ('$_POST[id_studenta]', '$_POST[ispit]', '$_POST[brojPrijava]', '$_POST[napomene]', '$_POST[id_predmeta]');");
                    if ($q) {
                        $true = true;
                    }
                } else {
                    echo "Ispit je već prijavljen!";
                }
                return  $true;
            }
        } else {
            echo "Nedevoljan iznos(novac) na vašem računu!";
        }
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


            tpl("header_tpl", "E-student, Kontrolna tabla ");
            tpl("navbar_tpl", "");
?>
            <div-breadcrumb>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Početna</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href=" #">Kontrolna tabla</a></li>
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
        }
    } else {
        include  ROOT . "/log_reg/login.php";
    }
}
