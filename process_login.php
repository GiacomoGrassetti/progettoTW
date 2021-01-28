<?php
    require_once("setup.php");
    sec_session_start(); // usiamo la nostra funzione per avviare una sessione php sicura
    if(isset($_POST['inputEmail'], $_POST['p'])) { 
        $email = $_POST['inputEmail'];
        $password = $_POST['p']; // Recupero la password criptata.
        if(login($email, $password, $dbh) == true) {
            $_SESSION["email"] = $email;
            $_SESSION['loggedin'] = true;
            header('Location: ./controller_home.php?status=1');
        } else {
            // Login fallito
            $templateParams["errorval"] = "Bad login, try again!";
            include('controller_error.php');
        }
    }
?>