<?php
    require_once("setup.php");
    $templateParams["titolo"] = "LolItems - checkout";
    $templateParams["nome"] = "checkout_complete.php";

    if(isset($_SESSION["user_id"])){
        /*insert in carrello*/
    }

    $data = unserialize($_COOKIE["cart"], ["allowed_classes" => false]);
    unset($data);
    $data = array();
    setcookie("cart", serialize($data), time() + (86400 * 30), "/");

    
    require("template/base.php");
?>