<?php
    require_once("setup.php");
    $templateParams["titolo"] = "LolItems - Sales";
    $templateParams["nome"] = "sales.php";
    $templateParams["sales"] = $dbh->getSalesOfVendor($_SESSION["user_id"]);
    $tmp = array();
    foreach($templateParams["sales"] as $sale){
       $sale["item"] = $dbh->getObjBySale($sale["idSconto"]);
       array_push($tmp, $sale);
    }
    include("template/base.php");
?>