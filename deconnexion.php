<?php
session_start();
require 'class/Config.php'; 
require 'class/Database.php';

// Détruit toutes les variables de session
$_SESSION = array();

// Si vous souhaitez détruire complètement la session, effacez également
// le cookie de session.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalement, destruction de la session.
session_destroy();

header("Location: index.php");
exit;
?>
