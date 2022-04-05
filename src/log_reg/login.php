<?php

tpl("header_tpl", "E-student Prijava ");
?>

<body class="text-center">

    <form class="form-signin" onsubmit="return false;">
        <img class="mb-4" src="./assets/img/logo.svg" alt="svg_logo" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">E-Student</h1>
        <div class="form-group">
            <label for="inputEmail" class="sr-only">Indeks</label>
            <input type="number" id="inputEmail" maxlength="10" class="form-control" placeholder="Indeks" name="indeks" required autofocus>
        </div>
        <br>
        <div class="form-group">
            <label for="inputPassword" class="sr-only">Šifra</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Šifra" name="password" required>
        </div>
        <div id="msgBox"></div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" onclick="login()">Prijavi me</button>
        <p class="mt-5 mb-3 text-muted">Marko Nikolić &copy; <?php echo date("Y"); ?></p>
    </form>
    <ul id="socialLinks">
        <li><a title="Link ka mom Github respozitorijumu od ovog projekta!" href="https://github.com/Marko9827/zafaksOSOSOS" target="_blank"><i class="fab fa-github"></i></a></li>
    </ul>
    <script type="text/javascript" src="./app.js"></script>
    <script type="text/javascript" src="./assets/js/main.js"></script>
    <script type="text/javascript" src="<?php echo URL_N; ?>/node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo URL_N; ?>/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>