<?php
    require_once("function_login.php");
    sec_session_start();
    
    $data = unserialize($_COOKIE["cart"], ["allowed_classes" => false]);
    unset($data);
    $data = array();
    setcookie($cookie_name, serialize($data), time() + (86400 * 30), "/");
    // Elimina tutti i valori della sessione.
    $_SESSION = array();
    // Recupera i parametri di sessione.
    $params = session_get_cookie_params();
    // Cancella i cookie attuali.
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    // Cancella la sessione.
    session_destroy();
    header('Location: ./');
?>