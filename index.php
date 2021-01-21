<?php 
require_once("setup.php");
require_once("function_login.php");
sec_session_start();
$templateParams["titolo"] = "LoLItems - Home";
$templateParams["nome"] = "home.php";
$templateParams["articoli"]=$dbh->getAllItems();
/*if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo "Welcome to the member's area, " . $_SESSION['username'] . "!";
} else {
    echo "Please log in first to see this page.";
}*/
require "template/base.php";


?>