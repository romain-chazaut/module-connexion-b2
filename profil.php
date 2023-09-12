<?php
session_start();

require 'class/Database.php';

$database = new Database();
$pdo = $database->getPDO();


if (!isset($_SESSION['user'])) {
    header("Location: connexion.php");
    exit;
}

$error = '';
$success = '';
$userId = $_SESSION['user']['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim(filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING));
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING));
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING));

    try {
        $stmt = $pdo->prepare("UPDATE user SET login = ?, firstname = ?, lastname = ? WHERE id = ?");
        $stmt->execute([$login, $firstname, $lastname, $userId]);
        $success = "Vos informations ont été mises à jour avec succès !";
    } catch (PDOException $e) {
        $error = "Une erreur est survenue. Veuillez réessayer.";
    }
}

$stmt = $pdo->prepare("SELECT * FROM user WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le profil</title>

</head>
<body>
    <h1>Modifier le profil</h1>
    
    <?php if ($error): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="success"><?php echo $success; ?></div>
    <?php endif; ?>

    <form action="profil.php" method="post">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" value="<?php echo $user['login']; ?>" required><br>
        
        <label for="firstname">Prénom:</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo $user['firstname']; ?>" required><br>

        <label for="lastname">Nom:</label>
        <input type="text" name="lastname" id="lastname" value="<?php echo $user['lastname']; ?>" required><br>

        <input type="submit" value="Mettre à jour">
    </form>
</body>
</html>
