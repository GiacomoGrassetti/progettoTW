<?php
    require_once("setup.php");
    
    $templateParams["titolo"] = "LolItems - Home";
    $templateParams["nome"] = "home.php";
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]){
        $_SESSION["venditore"] = $dbh->checkUserVendor($_SESSION["user_id"],$_SESSION["email"]);

        if(isset($_GET["status"]) && $_GET["status"]==1){
            require 'process_cart.php';
        }
    }

    if(isset($_GET["status"])){
        if($_GET["status"]==4){
            
            $templateParams["titolo"] = "LolItems - checkout";
            $templateParams["nome"] = "checkout_complete.php";
        }
    }

    if(isset($_GET["find"]) && $_GET["find"]!="" ){
        $templateParams["articoli"]=$dbh->findItem('%'.$_GET["find"].'%');
    }else{
        $templateParams["articoli"]=$dbh->getAllItems();
    }
    
    if(!empty($templateParams["articoli"])){
        foreach($templateParams["articoli"] as $item){
            $ids[]= $item["idOggetto"];
        }
        $templateParams["stats"]=$dbh->getAllStatsFromId($ids);
        require 'template/base.php';
    }else{
        $templateParams["errorval"] = "Nothing found";
        include('controller_error.php');
    }


    

    
?>