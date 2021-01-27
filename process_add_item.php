<?php
    require_once("setup.php");
    $tmp = explode(';',$_POST["itemSpec"]);
    $specs = array();

    for ($i=0; $i < count($tmp)-1; $i++){
        $spec = explode('=',$tmp[$i]);
        //parse_str($tmp[$i],$spec);
        array_push($specs, $spec);
    }
    
    $info = $_POST;
    $info["idVenditore"] = $_SESSION["user_id"];
    $cat = $_POST["categoria"];
    if($info["profile_photo"] == ""){
        $info["profile_photo"] = "img/items/item_default.png";
    }else{
        $info["profile_photo"] = "img/items/".$info["profile_photo"];
    }
    
    $dbh->insertObj($info, $cat, $specs);
    require("index.php");
?>
