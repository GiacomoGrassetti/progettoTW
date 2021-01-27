<?php
    require_once("setup.php");
    $dbh->deleteObj($_GET["id"]);
    require("index.php");
?>