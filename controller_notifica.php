<?php
    require_once("setup.php");
    $notificationText=$dbh->getUserNotification($_SESSION["user_id"]);

?>