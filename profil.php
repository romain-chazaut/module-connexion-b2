<?php
session_start();

require_once 'class/Config.php';
require_once 'class/Database.php';

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
    <link rel="stylesheet" href="assets/CSS/styles.css">
</head>
<body>
<div class="container">

    <h1>Modifier le profil</h1>

    <div class="action-links">
        <a href="deconnexion.php" class="btn btn-logout">Déconnexion</a>
    </div>

    <?php if ($error): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="success"><?php echo $success; ?></div>
    <?php endif; ?>

    <div class="form-wrapper">
        <form action="profil.php" method="post">
            <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" name="login" id="login" value="<?php echo htmlspecialchars($user['login']); ?>" required>
            </div>

            <div class="form-group">
                <label for="firstname">Prénom:</label>
                <input type="text" name="firstname" id="firstname" value="<?php echo htmlspecialchars($user['firstname']); ?>" required>
            </div>

            <div class="form-group">
                <label for="lastname">Nom:</label>
                <input type="text" name="lastname" id="lastname" value="<?php echo htmlspecialchars($user['lastname']); ?>" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Mettre à jour" class="btn">
            </div>
        </form>
    </div>

</div>
</body>
</html>
