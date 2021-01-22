<?php
    require_once("db/db.php");
    require_once("function_login.php");
    sec_session_start();
    $dbh = new DbHelper("localhost", "root", "", "lolitems", 3306);
    $templateParams["categorie"]=$dbh->getAllCategory();

    $cookie_name = "cart";
    if(!isset($_COOKIE["cart"])){
        $cookie_values = [];
        setcookie($cookie_name, serialize($cookie_values), time() + (86400 * 30), "/");
    }
?>