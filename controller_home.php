<?php
    $templateParams["titolo"] = "LolItems - Home";
    $templateParams["nome"] = "home.php";
   
    $templateParams["articoli"]=$dbh->getAllItems();
 
    require("template/home.php");
?>