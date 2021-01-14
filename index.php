<?php 
require_once("db/db.php");
$dbh = new DbHelper("localhost", "root", "", "lolitems", 3306);
$dbh->getAllItems();
$templateParams["titolo"] = "LoLItems - Home";
$templateParams["nome"] = "home.php";

require "template/base.php";


?>