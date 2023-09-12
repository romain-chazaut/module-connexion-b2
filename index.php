<?php
session_start();
require_once 'class/Config.php'; 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="assets/CSS/styles.css">
</head>
<body>

<div class="container">
    <h1>Bienvenue sur notre site</h1>

    <div class="button-group">
        <a href="inscription.php" class="btn">Inscription</a>
        <a href="connexion.php" class="btn">Connexion</a>
        <!-- Bouton de déconnexion -->
        <?php if (isset($_SESSION['user'])): ?>
            <a href="deconnexion.php" class="btn btn-logout">Déconnexion</a>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
