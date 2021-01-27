<?php
    require_once("setup.php");
    $templateParams["titolo"] = "LolItems - Add item";
    $templateParams["nome"] = "aggiungi_articolo.php";
    $templateParams["category"] = $dbh->getAllCategory();
    require("template/base.php");
?>