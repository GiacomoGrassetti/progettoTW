<?php
    require_once("setup.php");
    $templateParams["titolo"] = "LolItems - I tuoi oggetti";
    $templateParams["nome"] = "tabella_oggetti.php";
    $templateParams["items"] = $dbh->getItemFromVendor($_SESSION["user_id"]);
    require("template/base.php");
?>