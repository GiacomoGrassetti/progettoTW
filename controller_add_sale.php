<?php
    require_once("setup.php");
    $templateParams["titolo"] = "LolItems - Add sales";
    $templateParams["nome"] = "add_sales.php";
    $templateParams["items"] = $dbh->getItemFromVendor($_SESSION["user_id"]);
    include("template/base.php");
?>