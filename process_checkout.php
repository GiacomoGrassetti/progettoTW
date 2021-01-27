<?php
    require_once("setup.php");
    $templateParams["titolo"] = "LolItems - checkout";
    $templateParams["nome"] = "checkout_complete.php";

    if(isset($_SESSION["user_id"])){
        if(isset($_COOKIE["cart"])){
            $cart=unserialize($_COOKIE["cart"], ["allowed_classes" => false]);
            if(!empty($cart)){
                $dbh->insertIntoCart($_SESSION["user_id"],$cart);
                
            }
        }
    }
    
    $data = unserialize($_COOKIE["cart"], ["allowed_classes" => false]);
    
    unset($data);
    $data = array();
    
    setcookie("cart", serialize($data), time() + (86400 * 30), "/");

    
    require("template/base.php");
?>