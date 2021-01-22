<?php
    require_once("setup.php");
    $templateParams["titolo"] = "LolItems - Home";
    $templateParams["nome"] = "home.php";
   
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