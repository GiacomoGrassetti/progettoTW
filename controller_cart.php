<?php
    require_once("setup.php");
    $templateParams["titolo"] = "LolItems - cart";
    $templateParams["nome"] = "cart.php";
    $templateParams["articoliCart"] = array();
    $tmp_info = unserialize($_COOKIE["cart"], ["allowed_classes" => false]);
    if(!empty($tmp_info)){
        foreach($tmp_info["id"] as $index => $idItem):
            foreach($dbh->getItemFromId($idItem) as $item):
                $item["qnt"] = $tmp_info["qnt"][$index];

                if(isset($item["idSconto"])){
                    $item["saleVal"] = $dbh->getSalesValue($item["idSconto"]);
                }

                array_push($templateParams["articoliCart"], $item); 
            endforeach;    
        endforeach;
    }
    require("template/base.php");
?>