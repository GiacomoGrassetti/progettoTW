<?php
    require_once("db/db.php");
    require_once("function_login.php");
    sec_session_start();
    $dbh = new DbHelper("localhost", "root", "", "lolitems", 3306);
    $templateParams["categorie"]=$dbh->getAllCategory();
    $notify["add"]="l'ordine eseguito è stato emesso, Riepilogo:";
    $notify["finish"]="Il suo oggetto %s ha terminato le scorte in magazzino";
    $notify["order"]="E' stato emesso un ordine per %s quatita %d";
    if(!isset($checkoutStatus)){
        $u=0;
        $checkoutStatus=false;
        
    }

    
    if(!isset($_COOKIE["cart"])){
        $cookie_name = "cart";
        $cookie_values = [];
        setcookie($cookie_name, serialize($cookie_values), time() + (86400 * 30), "/");
    }
    

?>