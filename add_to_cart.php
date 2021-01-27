<?php
    require_once("setup.php");
    $tmp = unserialize($_COOKIE["cart"], ["allowed_classes" => false]);
    if(!isset($tmp["id"])){
        $tmp["id"] = [];
        $tmp["qnt"] = [];
    }
    $data["id"] = $tmp["id"];
    $data["qnt"] = $tmp["qnt"];
    if(isset($_COOKIE["cart"])){
        $index = cerca($data);
        if($index >= 0){

            $data["qnt"][cerca($data)] ++;
        }else{
            array_push($data["id"], $_GET["id"]);
            array_push($data["qnt"], 1);
        }
        setcookie("cart", serialize($data), time() + (86400 * 30), "/");
        if(isset($_SESSION["user_id"])){
            $dbh->insertIntoCart($_SESSION["user_id"],$data);
        }
        unset($data);
    }
    
    header("Location: controller_home.php");

    function cerca($data){
        foreach ($data["id"] as $key => $value) {
            if($value == $_GET["id"]){
                return $key; 
            }
        }
        return -1;
    }
?>