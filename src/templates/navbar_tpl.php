<nav class="navbar navbar-tpl">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button">
            <a class="navbar-brand" href="<?php echo URL; ?>"> <img src="<?php echo URL . "/?image=$_SESSION[indeks]"; ?>" alt="Avatar Logo" class="navbar_userIcon rounded-pill">
            </a>
        </button>
        <button class="navbar-toggler" type="button">
            <a class="navbar-brand" href="<?php echo URL; ?>"> <img src="<?php echo URL; ?>/assets/img/logo.svg" alt="Avatar Logo" style="width:40px;" class="rounded-pill"> E-Student</a>
        </button>
        <div class="buttons">
            <button class="navbar-toggler" title="Podešavanja" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="bi bi-gear"></span>
            </button>
            <button class="navbar-toggler" onclick="logout()" title="Odjavi se" type="button">
                <span class="bi bi-box-arrow-right"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Dropdown</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Link</a></li>
                        <li><a class="dropdown-item" href="#">Another link</a></li>
                        <li><a class="dropdown-item" href="#">A third link</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>