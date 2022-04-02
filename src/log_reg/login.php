<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./assets/img/logo.svg">

    <title>E-Student</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../node_modules/mdb-ui-kit/css/mdb.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./assets/css/style.css" rel="stylesheet">
</head>

<body class="text-center">
    <form class="form-signin">
        <img class="mb-4" src="./assets/img/logo.svg" alt="svg_logo" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">E-Student</h1>
        <div class="form-group">
            <label for="inputEmail" class="sr-only">Indeks</label>
            <input type="number" id="inputEmail" class="form-control" placeholder="Indeks" required autofocus>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="sr-only">Šifra</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Šifra" required>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Prijavi me</button>
        <p class="mt-5 mb-3 text-muted">&copy; <?php echo date("Y"); ?></p>
    </form>
    <script src="./app.js"></script>
</body>

</html>