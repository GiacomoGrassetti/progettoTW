<?php
    require_once("setup.php");
    $templateParams["titolo"] = "LolItems - checkout";
    $templateParams["nome"] = "checkout_complete.php";

    if(isset($_SESSION["user_id"])){
        if(isset($_COOKIE["cart"])){
            $cart=unserialize($_COOKIE["cart"], ["allowed_classes" => false]);
            if(true){
                
                    $checkoutStatus=true;
                    $dbh->insertIntoCart($_SESSION["user_id"],$cart);                  
                    $dbh->checkoutCart($cart,$_SESSION["user_id"]);
                    $data = unserialize($_COOKIE["cart"], ["allowed_classes" => false]);
                    unset($data);
                    $u++;
                    var_dump($u);
                    $data = array();
                    setcookie("cart", serialize($data), time() + (86400 * 30), "/");
                    $dbh->notifyUser($notify["add"],$cart,$_SESSION["user_id"]);
                    $dbh->notifyVendor($notify["order"],$cart);
                
                
            }
        }
        
    }else{
        $templateParams["titolo"] = "LolItems - register";
        $templateParams["nome"] = "register.php";
        $templateParams["stat"]=2;
    }
    
    require("template/base.php");
    
   
?>