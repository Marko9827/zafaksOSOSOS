<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="E-student, platforma za studente">
    <meta name="author" content="Marko Nikolić">
    <link rel="icon" href="./assets/img/logo.svg">

    <title>E-Student</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../node_modules/mdb-ui-kit/css/mdb.min.css" rel="stylesheet">
    <link href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="./assets/css/style.css" rel="stylesheet">
</head>

<body class="text-center">
    <ul id="socialLinks">
        <li><a href="https://github.com/Marko9827/zafaksOSOSOS" target="_blank"><i class="fab fa-github"></i></a></li>
    </ul>
    <form class="form-signin">
        <img class="mb-4" src="./assets/img/logo.svg" alt="svg_logo" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">E-Student</h1>
        <div class="form-group">
            <label for="inputEmail" class="sr-only">Indeks</label>
            <input type="number" id="inputEmail" maxlength="10" class="form-control" placeholder="Indeks" required autofocus>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="sr-only">Šifra</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Šifra" required>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Prijavi me</button>
        <p class="mt-5 mb-3 text-muted">Marko Nikolić &copy; <?php echo date("Y"); ?></p>
    </form>
    <script src="./app.js"></script>
</body>

</html>