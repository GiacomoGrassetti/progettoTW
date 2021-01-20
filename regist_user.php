<?php
    require_once("setup.php");
    var_dump($_POST);
    var_dump( $dbh->controlEmailExist($_POST["email"],isset($_POST["inputCustomer"])));
    #controllo email esistente usa unique su email
   

?>