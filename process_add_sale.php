<?php
    require_once("setup.php");
    $tmp = $_POST;
    $tmp["user_id"] = $_SESSION["user_id"];
    $tmp["value"] = $tmp["value"]."%";
    $stmt = $dbh->addSale($tmp);
    header('Location: ./controller_sales.php');
?>