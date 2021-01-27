<?php
    require_once("setup.php");
    
    if(isset($_COOKIE["cart"])){
        $cart=unserialize($_COOKIE["cart"], ["allowed_classes" => false]);
        if(!empty($cart)){
            $dbh->insertIntoCart($_SESSION["user_id"],$cart);
    
        }
        $cart["qnt"]=[];
        $cart["id"]=[];

        $previousItems=$dbh->getAllIntoCart($_SESSION["user_id"]);
        if(!empty($previousItems)){
            foreach($previousItems as $itemC){
                array_push($cart["id"],$itemC["idOggetto"]);
                array_push($cart["qnt"],$itemC["quantita"]);
            }
            setcookie("cart", serialize($cart), time() + (86400 * 30), "/");
        }
        
    }

?>