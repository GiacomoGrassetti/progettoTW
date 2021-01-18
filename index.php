<?php 
require_once("setup.php");
$templateParams["titolo"] = "LoLItems - Home";
$templateParams["nome"] = "home.php";
$templateParams["articoli"]=$dbh->getAllItems();
require "template/base.php";


?>