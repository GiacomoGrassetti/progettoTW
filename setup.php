<?php
require_once("db/db.php");
require_once("function_login.php");
sec_session_start();
$dbh = new DbHelper("localhost", "root", "", "lolitems", 3306);
?>