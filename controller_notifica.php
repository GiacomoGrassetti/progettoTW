<?php
    require_once("setup.php");
    $templateParams["titolo"] = "LolItems - Notifiche";
    $templateParams["nome"] = "notifiche.php";

    $notificationText=$dbh->getUserNotification($_SESSION["user_id"]);
    
    require("template/base.php")
?>