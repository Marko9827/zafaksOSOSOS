<?php
tpl("header_tpl", "E-student, Kontrolna tabla ");
tpl("navbar_tpl", "");

$p = $_GET['p'];
?>
<div-breadcrumb>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/?p=<?php echo  $p ?>" title="Idi na: <?php echo  $p ?> ">Početna</a></li>
            <?php if ($_GET['p'] !== "home") { ?>
                <li class="breadcrumb-item active" aria-current="page"><a href="/?p=<?php echo  $p ?>"><?php echo  $p ?></a></li>
            <?php } ?>
        </ol>
    </nav>
</div-breadcrumb>
<main>


    <section id="welcome">
        <div class="container">
            <div class="row row-style-box">
                <?php
                include "Sleft_col_tpl.php";
                ?>

            </div>
        </div>
    </section>
</main>
<script src="<?php echo URL_N; ?>/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?php echo URL_N; ?>/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo URL; ?>/app.js"></script>
<script src="<?php echo URL; ?>/assets/js/main.js"></script>

