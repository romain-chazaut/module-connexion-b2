<?php

session_start();
require_once 'class/Config.php';
require_once 'class/Database.php';
require_once 'class/User.php';


$database = new Database();
$connection = $database->getPDO();

try {
    // Assainissement des données
    $login = trim(filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING));
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING));
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING));
    $password = trim($_POST['password']); // Ne pas assainir ici car cela pourrait affecter la sécurité du hachage
    $confirmPassword = trim($_POST['confirm_password']);

    // Vérifier l'unicité du login
    $checkQuery = $connection->prepare("SELECT login FROM user WHERE login = ?");
    $checkQuery->execute([$login]);
    if ($checkQuery->fetch()) {
        header("Location: inscription.php?error=login_taken");
        exit;
    }

    // Vérification de la correspondance des mots de passe
    if ($password !== $confirmPassword) {
        header("Location: inscription.php?error=password_mismatch");
        exit;
    }

    // Vérification de la complexité du mot de passe
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[\W]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        header("Location: inscription.php?error=password_not_strong");
        exit;
    }

    // Hachage du mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insertion dans la base de données
    $query = $connection->prepare("INSERT INTO user (login, firstname, lastname, password) VALUES (?, ?, ?, ?)");
    $query->execute([$login, $firstname, $lastname, $hashedPassword]);

    header("Location: connexion.php");
    exit;

} catch (PDOException $exception) {
    header("Location: inscription.php?error=database_error");
    exit;
}

?>
