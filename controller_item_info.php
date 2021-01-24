<?php
    require_once("setup.php");
    $templateParams["titolo"] = "LolItems - Info";
    $templateParams["nome"] = "item_info.php";
    $templateParams["item"] = $dbh->getItemFromId($_GET["id"]);
    $templateParams["itemParams"] = $dbh->getItemSpecs($_GET["id"]);
    $templateParams["itemCat"]= $dbh->getItemCat($_GET["id"]);
    require("template/base.php");
?>