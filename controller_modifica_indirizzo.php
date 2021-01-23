<?php 
    require_once("setup.php");
    $templateParams["titolo"] = "LolItems - update";
    $templateParams["nome"] = "modifica_indirizzo.php";

    $userInfo = $dbh->getUserInfo($_SESSION["user_id"]);

    require("template/base.php");
?>