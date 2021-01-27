<?php
    require_once("setup.php");
    $tmp = explode(';',$_POST["itemSpec"]);
    $specs = array();

    for ($i=0; $i < count($tmp)-1; $i++){
        $spec = explode('=',$tmp[$i]);
        //parse_str($tmp[$i],$spec);
        array_push($specs, $spec);
    }
    
    $info = $_POST;
    $info["idVenditore"] = $_SESSION["user_id"];
    $info["idOggetto"] = $_GET["idOggetto"];
    $cat = $_POST["categoria"];
    if($info["profile_photo"] == ""){
        $info["profile_photo"] = "img/items/item_default.png";
    }else{
        $info["profile_photo"] = "img/items/".$info["profile_photo"];
    }
    
   
    $dbh->modifyObj($info);

    $catAttuali = $dbh->getItemCat($_GET["idOggetto"]); 
    foreach($catAttuali as $cat){
        var_dump($cat);
        $dbh->deleteCatRef($_GET["idOggetto"],$cat["idCategoria"]);
    }

    foreach($info["categoria"] as $cat){
        $dbh->insertCatRef($_GET["idOggetto"],$cat);
    }


    $statsAttuali = $dbh->getItemSpecs($_GET["idOggetto"]);
    foreach($statsAttuali as $spec){
        var_dump($spec);
        $dbh->deleteStat($spec["idStat"]);
    }

    foreach($specs as $spec){
        $dbh->insertStats($_GET["idOggetto"],$spec[0],$spec[1]);
    }
    require("index.php");
?>