<nav class="navbar navbar-tpl">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button">
            <a class="navbar-brand" href="./?p=administracija"> <img src="<?php echo URL . "/?image=$_SESSION[indeks]"; ?>" alt="Avatar Logo" class="navbar_userIcon rounded-pill">
            </a>
        </button>
        <button class="navbar-toggler" type="button">
            <a class="navbar-brand" href="<?php echo URL; ?>"> <img src="<?php echo URL; ?>/assets/img/logo.svg" alt="Avatar Logo" style="width:40px;" class="rounded-pill"> E-Student</a>
        </button>
        <div class="buttons">


            <button class="navbar-toggler" title="Obaveštenja" type="button" onclick="red('notify');">
                <span class="bi icon_b bi-bell"></span>
            </button>


            <button class="navbar-toggler" title="Podešavanja" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="bi icon_b bi-gear"></span>
            </button>
            <button class="navbar-toggler" onclick="logout()" title="Odjavi se" type="button">
                <span class="bi icon_b bi-box-arrow-right"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <?php
                echo menu("", "");
                ?>
            </ul>
        </div>
    </div>
</nav>