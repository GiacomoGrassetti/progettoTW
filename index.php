<?php 
require_once("setup.php");
require_once("function_login.php");
sec_session_start();
$templateParams["titolo"] = "LoLItems - Home";
$templateParams["nome"] = "home.php";

require "controller_home.php";


?>