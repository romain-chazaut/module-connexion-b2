<?php
include 'class/Config.php'; 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <h1>Bienvenue sur notre site</h1>
    <p><a href="inscription.php">Inscription</a></p>
    <p><a href="connexion.php">Connexion</a></p>
    <!-- Bouton de déconnexion -->
    <?php if (isset($_SESSION['user'])): ?>
        <p><a href="deconnexion.php">Déconnexion</a></p>
    <?php endif; ?>
</body>
</html>
