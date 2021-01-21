<?php
    require_once("setup.php");
    $templateParams["titolo"] = "LolItems - Home";
    $templateParams["nome"] = "home.php";
   
    if(isset($_GET["find"]) && $_GET["find"]!="" ){
        $templateParams["articoli"]=$dbh->findItem('%'.$_GET["find"].'%');
    }else{
        $templateParams["articoli"]=$dbh->getAllItems();
    } 
    require 'template/base.php';
?>