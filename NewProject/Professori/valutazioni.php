<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professori</title>
    <link rel="shortcut icon" type="image/png" href="http://localhost/NewProject/img/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar sticky-top bg-body-tertiary">
        <div class="container-fluid">
            <ul class="nav nav-underline">
                <li class="nav-item"><a class="nav-link text-primary" href="carica.php" class="menu">Carica</a></li>
                <li class="nav-item"><a class="nav-link active text-primary" href="valutazioni.php" class="menu">Valutazioni</a></li>
            </ul>

            <ul class="nav nav-underline d-flex">
                <li class="nav-item"><a class="nav-link text-primary" href="http://localhost/NewProject/index.html">Log Out</a></li>
            </ul>
        </div>
    </nav>

    <div class="container-md text-center mb-5">
        <h1>Valutazioni</h1>
    </div>

    <?php require('voti.php');?>

    <div class="container-fluid text-center fixed-bottom bg-secondary text-white p-5">
        <footer>
            <small>©2024 Milazzotto Simone. Designed by Milazzotto Simone</small>
        </footer>
    </div>
</body>
</html>