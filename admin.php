<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['login'] !== 'admiN1337$') {
    header('Location: connexion.php');
    exit;
}

require 'class/Config.php';
require 'class/Database.php';

$database = new Database();
$pdo = $database->getPDO();

$query = $pdo->prepare("SELECT * FROM user");
$query->execute();
$users = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <!-- Inclure le CSS ici -->
</head>
<body>
    <h1>Utilisateurs</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Prénom</th>
                <th>Nom</th>
                <!-- Ajoutez d'autres colonnes si nécessaire -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['login']; ?></td>
                    <td><?php echo $user['firstname']; ?></td>
                    <td><?php echo $user['lastname']; ?></td>
                    <!-- Ajoutez d'autres colonnes si nécessaire -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
