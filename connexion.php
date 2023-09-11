<?php
require 'class/Config.php'; // Inclure la configuration de la base de données

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim(filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING));
    $password = trim($_POST['password']);

    try {
        $query = $pdo->prepare("SELECT * FROM user WHERE login = ?");
        $query->execute([$login]);

        $user = $query->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Démarrer la session et stocker l'information de l'utilisateur en session
            session_start();
            $_SESSION['user'] = $user;
            header("Location: dashboard.php"); // Redirigez vers une page de tableau de bord ou la page d'accueil après une connexion réussie
            exit;
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
    <!-- Inclure le CSS ici -->
</head>
<body>
    <h1>Connexion</h1>

    <?php if ($error): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <form action="connexion.php" method="post">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" required><br>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" value="Se connecter">
    </form>
</body>
</html>