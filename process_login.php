<?php
    require_once("setup.php");
    require_once("function_login.php");

    sec_session_start(); // usiamo la nostra funzione per avviare una sessione php sicura
    var_dump($_POST);
    if(isset($_POST['inputEmail'], $_POST['p'])) { 
        $email = $_POST['inputEmail'];
        $password = $_POST['p']; // Recupero la password criptata.

        if(login($email, $password, $dbh) == true) {
            // Login eseguito
            echo 'Success: You have been logged in!';
            header('Location: ./');
        } else {
            // Login fallito
            //header('Location: ./login.php?error=1');
        }
    } else { 
    // Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
    echo 'Invalid Request';
    }
?>