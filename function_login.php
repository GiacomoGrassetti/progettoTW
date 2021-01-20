<?php
    require_once("setup.php");
    function login($email, $password, $dbh) {
        // Usando statement sql 'prepared' non sarà possibile attuare un attacco di tipo SQL injection.
        if ($stmt = $dbh->prepare("SELECT idCliente, email, password, salt FROM clienti WHERE email = ? LIMIT 1")) { 
            $stmt->bind_param('s', $email); // esegue il bind del parametro '$email'.
            $stmt->execute(); // esegue la query appena creata.
            $stmt->store_result();
            $stmt->bind_result($user_id, $username, $db_password, $salt); // recupera il risultato della query e lo memorizza nelle relative variabili.
            $stmt->fetch();
            $password = hash('sha512', $password.$salt); // codifica la password usando una chiave univoca.
            if($stmt->num_rows == 1) { // se l'utente esiste
                    if($db_password == $password) { // Verifica che la password memorizzata nel database corrisponda alla password fornita dall'utente.
                        // Password corretta!            
                        $user_browser = $_SERVER['HTTP_USER_AGENT']; // Recupero il parametro 'user-agent' relativo all'utente corrente.
            
                        $user_id = preg_replace("/[^0-9]+/", "", $user_id); // ci proteggiamo da un attacco XSS
                        $_SESSION['user_id'] = $user_id; 
                        $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); // ci proteggiamo da un attacco XSS
                        $_SESSION['username'] = $username;
                        $_SESSION['login_string'] = hash('sha512', $password.$user_browser);
                        // Login eseguito con successo.
                        return true;    
                    } else {
                        return false;
                    }
            } else {
                // L'utente inserito non esiste.
                return false;
            }
        }
    }

    function login_check($dbh) {
        // Verifica che tutte le variabili di sessione siano impostate correttamente
        if(isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
          $user_id = $_SESSION['user_id'];
          $login_string = $_SESSION['login_string'];
          $username = $_SESSION['username'];     
          $user_browser = $_SERVER['HTTP_USER_AGENT']; // reperisce la stringa 'user-agent' dell'utente.
          if ($stmt = $mysqli->prepare("SELECT password FROM cliente WHERE id = ? LIMIT 1")) { 
             $stmt->bind_param('i', $user_id); // esegue il bind del parametro '$user_id'.
             $stmt->execute(); // Esegue la query creata.
             $stmt->store_result();
      
             if($stmt->num_rows == 1) { // se l'utente esiste
                $stmt->bind_result($password); // recupera le variabili dal risultato ottenuto.
                $stmt->fetch();
                $login_check = hash('sha512', $password.$user_browser);
                if($login_check == $login_string) {
                   // Login eseguito!!!!
                   return true;
                } else {
                   //  Login non eseguito
                   return false;
                }
             } else {
                 // Login non eseguito
                 return false;
             }
          } else {
             // Login non eseguito
             return false;
          }
        } else {
          // Login non eseguito
          return false;
        }
     }
?>