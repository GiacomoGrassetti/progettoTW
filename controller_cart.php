<?php
    require_once("setup.php");
    $templateParams["titolo"] = "LolItems - cart";
    $templateParams["nome"] = "cart.php";
    $templateParams["articoliCart"] = array();
    foreach(unserialize($_COOKIE["cart"], ["allowed_classes" => false]) as $idItem):
        foreach($dbh->getItemFromId($idItem) as $item):
            array_push($templateParams["articoliCart"], $item);        
        endforeach;    
    endforeach;

    
    require("template/base.php");
?>