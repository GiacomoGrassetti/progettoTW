<?php 
require_once("db/db.php");
$dbh = new DbHelper("localhost", "root", "", "lolitems", 3306);
$templateParams["titolo"] = "LoLItems - Home";
$templateParams["nome"] = "home.php";
$templateParams["articoli"]=$dbh->getAllItems();

require "template/base.php";


?>