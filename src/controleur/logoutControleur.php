<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$_SESSION = array();
 
// Supprimez le cookie de session
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
 
// Détruisez la session
session_destroy();

header('Location: /ProjetTER/src/index.php?page=welcome'); 
exit;
?>