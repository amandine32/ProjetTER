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
require_once __DIR__ . '/../vue/welcomeVue.php';
// Détruisez la session
session_destroy();
//require_once __DIR__ . '/../vue/welcomeVue.php';
//header('Location: index.php?page=index'); 
//exit;
?>