<?php
session_start();

require_once 'class/Config.php';
require_once 'class/Database.php';

$database = new Database();
$pdo = $database->getPDO();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: connexion.php");
    exit;
}


$users = [];
try {
    $stmt = $pdo->query("SELECT * FROM user");
    $users = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erreur lors de la récupération des utilisateurs : " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Liste des utilisateurs</title>
    <link rel="stylesheet" href="assets/CSS/styles.css">
</head>
<body>

<div class="container">
    <h1>Liste des utilisateurs</h1>

    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Prénom</th>
                <th>Nom</th>
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
</div>

</body>
</html>

