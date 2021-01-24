<?php
    require_once("setup.php");
    $tmp = $_POST;
    $tmp["user_id"] = $_SESSION["user_id"];
    //var_dump($tmp);
    //var_dump($_SESSION);
    // Inserisci a questo punto il codice SQL per eseguire la INSERT nel tuo database
    // Assicurati di usare statement SQL 'prepared'.
    //var_dump($_POST);
    $stmt = $dbh->updateUserAddress($tmp);
    require("index.php");
?>