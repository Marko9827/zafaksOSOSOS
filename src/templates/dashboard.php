<?php
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