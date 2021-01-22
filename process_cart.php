<?php
    require_once("setup.php");
    if(isset($_COOKIE["cart"])){
        foreach (unserialize($_COOKIE["cart"], ["allowed_classes" => false]) as $item) {
            echo $item;
        }
    }
    include("index.php");
?>