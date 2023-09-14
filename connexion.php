<?php
session_start();

require_once 'class/Config.php';
require_once 'class/Database.php';

$database = new Database();
$pdo = $database->getPDO();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim(filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING));
    $password = trim($_POST['password']);

    try {
        $query = $pdo->prepare("SELECT * FROM user WHERE login = ?");
        $query->execute([$login]);

        $user = $query->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;

            if ($user['login'] === 'admiN1337$') {
                header("Location: admin.php");
                exit;
            } else {
                header("Location: profil.php");
                exit;
            }
        } else {
            $error = "Login ou mot de passe incorrect.";
        }

    } catch (PDOException $exception) {
        $error = "Erreur de base de données. Veuillez réessayer plus tard.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="assets/CSS/styles.css">
</head>
<body>

<div class="container">
    <h1>Connexion</h1>

    <?php if ($error): ?>
        <div class="error-message"><?php echo $error; ?></div>
    <?php endif; ?>

    <form action="connexion.php" method="post" class="form-group">
        <label for="login" class="label">Login:</label>
        <input type="text" name="login" id="login" required>
        
        <label for="password" class="label">Mot de passe:</label>
        <input type="password" name="password" id="password" required>
        
        
    

    <div class="button-group">
    <input type="submit" value="Se connecter" class="btn">
        <a href="inscription.php" class="btn">Pas encore inscrit? Inscrivez-vous</a>
    </div>
    </form>
</div>

</body>
</html>