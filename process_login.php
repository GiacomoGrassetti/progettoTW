<?php
    require_once("setup.php");
    sec_session_start(); // usiamo la nostra funzione per avviare una sessione php sicura
    if(isset($_POST['inputEmail'], $_POST['p'])) { 
        $email = $_POST['inputEmail'];
        $password = $_POST['p']; // Recupero la password criptata.
        var_dump($_POST);
        if(login($email, $password, $dbh) == true) {
            // Login eseguito
            echo 'Success: You have been logged in!';
            $_SESSION['loggedin'] = true;
            header('Location: ./');
        } else {
            // Login fallito
            header('Location: ./controller_error.php?error=Wrong login , try again!');
        }
    } else { 
    // Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
    echo 'Invalid Request';
    }
?>