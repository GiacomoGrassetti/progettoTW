<?php
    require_once("setup.php");
    //var_dump($_POST);
    //var_dump( $dbh->controlEmailExist($_POST["email"],isset($_POST["inputCustomer"])));
    #controllo email esistente usa unique su email
    //$userInfo = array("name" => , "surname" => , "email" => , "phone" => , "p" => ,"address" => , "city" => , "state" => , "codP" => );
    // Recupero la password criptata dal form di inserimento.
    $password = $_POST['p']; 
    // Crea una chiave casuale
    $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
    // Crea una password usando la chiave appena creata.
    $password = hash('sha512', $password.$random_salt);
    $tmp = $_POST;
    $tmp["p"] = $password; 
    // Inserisci a questo punto il codice SQL per eseguire la INSERT nel tuo database
    // Assicurati di usare statement SQL 'prepared'.
    $stmt = $dbh->getUserRegister($tmp, $random_salt);
    
    /*if ($insert_stmt = $mysqli->prepare("INSERT INTO members (username, email, password, salt) VALUES (?, ?, ?, ?)")) {    
        $insert_stmt->bind_param('ssss', $username, $email, $password, $random_salt); 
        // Esegui la query ottenuta.
        $insert_stmt->execute();
    }*/
   

?>