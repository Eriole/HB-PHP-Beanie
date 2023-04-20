<?php
require_once 'config.inc.php';
require_once 'autoloader.php';
require_once 'functions.php';
require_once 'variables.php';

//Appelle fonction session
session_start();

// Mise à jour Session à la connexion
if (!empty($_POST['username'])){
    $userTest= (trim($_POST['username']));
    // Vérification mot de passe
    if ($_POST['password']==$password && !empty($userTest)){
        echo '<div class="alert alert-primary d-flex align-items-center" role="alert">Connexion réussie</div>';
        $_SESSION['username']=$_POST['username'];
    }else{
        echo '<div class="alert alert-danger d-flex align-items-center" role="alert">Echec connexion</div>';
    }
}

// Mise à jour navbar et redirection en fonction de la Session
if (isset($_SESSION['username'])){
    $userName = $_SESSION['username'];
    $connexionStatus = 'Déconnexion';
    $connexionPage = 'logout';
}

// Afficher un message à la déconnexion
if (!empty($_GET['disconnected']) && $_GET['disconnected'] == 1) {
    echo '<div class="alert alert-warning d-flex align-items-center" role="alert" >Vous êtes déconnecté</div>';
};

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/bootstrap.css">
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://kit.fontawesome.com/ed398f5d99.js" crossorigin="anonymous"></script>
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
            <a class="nav-link active" aria-current="page" href="?page=home">Home</a>
            <a class="nav-link" href="?page=list">Market</a>
            <a class="nav-link" href="?page=cart">Panier</a>
            <a class="nav-link" href="?page=contact">Contact</a>
            <!-- Affichage pseudo si session ouverte -->
            <?php if (!is_null($userName)){?><a class="nav-link" href="#"><?php echo $userName ?></a><?php }; ?>
            <!-- Modification nom et redirection bouton -->
            <a class="nav-link" href="?page=<?php echo $connexionPage ?>"><?php echo $connexionStatus ?></a>
        </div>
        </div>
        </div>
    </nav>