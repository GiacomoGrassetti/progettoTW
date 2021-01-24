<?php
    require_once("setup.php");
    function login($email, $password, $dbh) {
        // Usando statement sql 'prepared' non sarà possibile attuare un attacco di tipo SQL injection.
        $stmt = $dbh->getUserLogin($email);
        if (isset($stmt)) {
            $password = hash('sha512', $password.$stmt["salt"]); // codifica la password usando una chiave univoca.
            /*var_dump($password); echo '<br>';
            var_dump($stmt["password"]);*/
            if($stmt["password"] == $password) { // Verifica che la password memorizzata nel database corrisponda alla password fornita dall'utente.
                // Password corretta!            
                $user_browser = $_SERVER['HTTP_USER_AGENT']; // Recupero il parametro 'user-agent' relativo all'utente corrente.
                
                $stmt["user_id"] = preg_replace("/[^0-9]+/", "", $stmt["user_id"]); // ci proteggiamo da un attacco XSS
                $_SESSION['user_id'] = $stmt["user_id"]; 
                $stmt["username"] = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $stmt["username"]); // ci proteggiamo da un attacco XSS
                $_SESSION['username'] = $stmt["username"];
                $_SESSION['login_string'] = hash('sha512', $password.$user_browser);
                // Login eseguito con successo.
                $_SESSION["loggedin"] = true;
                return true;    
            } else {
                return false;
            }
        } else {
            // L'utente inserito non esiste.
            return false;
        }
    }

    function login_check($dbh) {
        // Verifica che tutte le variabili di sessione siano impostate correttamente
        if(isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
            $user_id = $_SESSION['user_id'];
            $login_string = $_SESSION['login_string'];
            $username = $_SESSION['username'];     
            $user_browser = $_SERVER['HTTP_USER_AGENT']; // reperisce la stringa 'user-agent' dell'utente.
            $stmt = $dbh->getLoginCheck($user_id);
            if (isset($stmt)) { 
                $login_check = hash('sha512', $stmt.$user_browser);
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
    }

    function sec_session_start() {
        if(empty($_SESSION["loggedin"])) {
            $session_name = 'sec_session_id'; // Imposta un nome di sessione
            $secure = false; // Imposta il parametro a true se vuoi usare il protocollo 'https'.
            $httponly = true; // Questo impedirà ad un javascript di essere in grado di accedere all'id di sessione.
            ini_set('session.use_only_cookies', 1); // Forza la sessione ad utilizzare solo i cookie.
            $cookieParams = session_get_cookie_params(); // Legge i parametri correnti relativi ai cookie.
            session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
            session_name($session_name); // Imposta il nome di sessione con quello prescelto all'inizio della funzione.
            session_start(); // Avvia la sessione php.
            session_regenerate_id(); // Rigenera la sessione e cancella quella creata in precedenza.
            $_SESSION["loggedin"] = true;
        }
    }
?>