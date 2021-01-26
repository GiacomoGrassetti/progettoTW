<?php
    require_once("setup.php");
    $templateParams["titolo"] = "LolItems - personal area";
    $templateParams["nome"] = "personal_area.php";

    $userInfo = $dbh->getUserInfo($_SESSION["user_id"]);
    
    require("template/base.php");
?>