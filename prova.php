<?php
    require_once("setup.php");
    $id = [];
    array_push($id,4);
    $qnt = [];
    array_push($qnt,2);
    $tmp = array("id" => $id, "qnt"=>$qnt);
    var_dump($tmp);
    $dbh->notifyVendor("E' stato emesso un ordine per %s quatita %d", $tmp);
    //include_once("process_checkout.php");
?>