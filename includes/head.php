<?php
require_once 'functions.php';
require_once 'variables.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/bootstrap.css">
    <link rel="stylesheet" href="styles/style.css">
    <!-- <script src="https://kit.fontawesome.com/ed398f5d99.js" crossorigin="anonymous"></script> -->
    <script defer src="script/bootstrap.bundle.min.js"></script>
    <title>Bonnets</title>
</head>
<body>
    <header class="text-center">
        <h1>Nos super bonnets !</h1>
        <p>Gardez votre tête au chaud quelque soit la saison.</p>
    </header>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            <a class="nav-link" href="list.php">Market</a>
            <a class="nav-link" href="#">Pricing</a>
            <a class="nav-link" href="login.php">Connexion</a>
        </div>
        </div>
        </div>
    </nav>