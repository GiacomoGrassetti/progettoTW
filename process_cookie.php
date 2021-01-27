<?php
    $tmp_c = unserialize($_COOKIE["cart"], ["allowed_classes" => false]);
    var_dump($tmp_c);
    foreach($tmp_c["id"] as $key=>$c){
        if($c==$_GET["id"]){
            
            $tmp_c["qnt"][$key]=$_GET["qnt"];
            if($_GET["qnt"]==0){
                unset($tmp_c["id"][$key]); // remove item at index 0
                $tmp_c1["id"] = array_values($tmp_c["id"]); // 'reindex' array
                unset($tmp_c["qnt"][$key]); // remove item at index 0
                $tmp_c1["qnt"] = array_values($tmp_c["qnt"]); // 'reindex' array
            }
            
        }

    }
    setcookie("cart", serialize($tmp_c), time() + (86400 * 30), "/");


?>