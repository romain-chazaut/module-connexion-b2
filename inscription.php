<?php
session_start();
require 'class/Config.php'; // Inclure la configuration de la base de données
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <!-- Inclure le CSS ici -->
</head>
<body>
    <h1>Inscription</h1>
    <form action="connexion.php" method="post">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" required><br>
        
        <label for="firstname">Prénom:</label>
        <input type="text" name="firstname" id="firstname" required><br>

        <label for="lastname">Nom:</label>
        <input type="text" name="lastname" id="lastname" required><br>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}" required><br>

        <label for="passwordConfirm">Confirmez le mot de passe:</label>
        <input type="password" name="passwordConfirm" id="passwordConfirm" required><br>

        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>
