<?php
    require_once("setup.php");
    $password = $_POST['p']; 
    // Crea una chiave casuale
    $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
    // Crea una password usando la chiave appena creata.
    $password = hash('sha512', $password.$random_salt);
    $tmp = $_POST;
    $tmp["p"] = $password;
    $tmp["user_id"] = $_SESSION["user_id"];
    //var_dump($tmp);
    //var_dump($_SESSION);
    // Inserisci a questo punto il codice SQL per eseguire la INSERT nel tuo database
    // Assicurati di usare statement SQL 'prepared'.
    //var_dump($_POST);
    $stmt = $dbh->updateUserInfo($tmp, $random_salt);
    require("index.php");
?>