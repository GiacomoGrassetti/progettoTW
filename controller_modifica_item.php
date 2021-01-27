<?php 
    require_once("setup.php");
    $templateParams["titolo"] = "LolItems - Modify";
    $templateParams["nome"] = "modifica_item.php";

    $templateParams["item"] = $dbh->getItemFromId($_GET["id"]);
    $templateParams["item"]["id"] = $_GET["id"];
    $templateParams["itemParams"] = $dbh->getItemSpecs($_GET["id"]);
    $templateParams["itemCat"]= $dbh->getItemCat($_GET["id"]);
    $templateParams["category"] = $dbh->getAllCategory();
    require("template/base.php");
?>