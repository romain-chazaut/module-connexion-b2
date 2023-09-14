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

    <div class="form-group">
        <input type="submit" value="Inscription" data-url="inscription.php" class="btn">
        <input type="submit" value="Connexion" data-url="connexion.php" class="btn">
        <?php if (isset($_SESSION['user'])): ?>
            <input type="submit" value="Déconnexion" data-url="deconnexion.php" class="btn btn-logout">
        <?php endif; ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let buttons = document.querySelectorAll('.btn');

        buttons.forEach(button => {
            button.addEventListener('click', function (e) {
                let url = e.target.getAttribute('data-url');
                if (url) {
                    window.location.href = url;
                }
            });
        });
    });
</script>

</body>
</html>
