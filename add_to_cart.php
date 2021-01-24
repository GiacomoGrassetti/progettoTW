<?php 
    require_once("setup.php");
    $data = unserialize($_COOKIE["cart"], ["allowed_classes" => false]);
    if(isset($_COOKIE["cart"])){
        array_push($data, $_GET["id"]);
        setcookie("cart", serialize($data), time() + (86400 * 30), "/");
    }
    header("Location: controller_home.php");
?>