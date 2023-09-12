<?php
session_start();
require_once 'class/Config.php'; 
require_once 'class/Database.php';

$database = new Database();
$pdo = $database->getPDO();

$error = '';
$success = ''; // Ajout d'un message de succès

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim(filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING));
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING));
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING));
    $password = trim($_POST['password']);
    $passwordConfirm = trim($_POST['passwordConfirm']);

    // Vérification de l'unicité du login
    $checkQuery = $pdo->prepare("SELECT login FROM user WHERE login = ?");
    $checkQuery->execute([$login]);
    if ($checkQuery->fetch()) {
        $error = "Ce login est déjà pris.";
    } elseif ($password !== $passwordConfirm) {
        $error = "Les mots de passe ne correspondent pas.";
    } else {
        try {
            $query = $pdo->prepare("INSERT INTO user (login, firstname, lastname, password) VALUES (?, ?, ?, ?)");
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query->execute([$login, $firstname, $lastname, $hashedPassword]);
            header("Location: connexion.php"); 
            exit;
        } catch (PDOException $exception) {
            $error = "Erreur lors de l'inscription. Veuillez réessayer.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="assets/CSS/styles.css">
</head>
<body>
<div class="container">

    <h1>Inscription</h1>

    <?php if ($error): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <div class="form-wrapper">
        <form action="inscription.php" method="post">
            <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" name="login" id="login" required>
            </div>

            <div class="form-group">
                <label for="firstname">Prénom:</label>
                <input type="text" name="firstname" id="firstname" required>
            </div>

            <div class="form-group">
                <label for="lastname">Nom:</label>
                <input type="text" name="lastname" id="lastname" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}" required>
            </div>

            <div class="form-group">
                <label for="passwordConfirm">Confirmez le mot de passe:</label>
                <input type="password" name="passwordConfirm" id="passwordConfirm" required>
            </div>

            <div class="form-group">
                <input type="submit" value="S'inscrire" class="btn">
            </div>
        </form>
    </div>

</div>
</body>
</html>
