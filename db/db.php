<?php
class DbHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db=new mysqli($servername, $username, $password, $dbname, $port);
        if($this->db->connect_error){
            die("Connection to database failed: " . $this->db->connect_error );
        }
    }

    public function getLoginCheck($user_id){
        $stmt = $this->db->prepare("SELECT password FROM cliente WHERE idCliente = ? LIMIT 1");
        $stmt->bind_param('i', $user_id); // esegue il bind del parametro '$user_id'.
        $stmt->execute(); // Esegue la query creata.
        $stmt->store_result();
        if($stmt->num_rows == 1){ 
            $stmt->bind_result($password); // recupera le variabili dal risultato ottenuto.
            $stmt->fetch();
            return $password;
        }else{
            $stmt = $this->db->prepare("SELECT password FROM venditore WHERE idVenditore = ? LIMIT 1");
            $stmt->bind_param('i', $user_id); // esegue il bind del parametro '$user_id'.
            $stmt->execute(); // Esegue la query creata.
            $stmt->store_result();
            if($stmt->num_rows == 1){ 
                $stmt->bind_result($password); // recupera le variabili dal risultato ottenuto.
                $stmt->fetch();
                return $password;
            }
        }
        return null;
    }

    public function getUserRegister($tmp, $random_salt){
        
        if(!empty($tmp["profile_photo"])){
            $tmp["profile_photo"] = "img/user/".$tmp["profile_photo"]; 
        }else{
            $tmp["profile_photo"] = "img/user/user_default.png"; 
        }
        if($tmp["inputRole"] == "customer"){
            $insert_stmt =  $this->db->prepare("INSERT INTO cliente (username, password, strada, citta, stato, idCliente, nome, cognome, email, telefono, immagine, codP, salt)
                                            VALUES (?, ?, ?, ?, ?, NULL, ?, ?, ?, ?, ?, ?, ?)");  
        }else{
            $insert_stmt =  $this->db->prepare("INSERT INTO venditore (username, password, strada, citta, stato, idVenditore, nome, cognome, email, telefono, immagine, codP, salt)
                                            VALUES (?, ?, ?, ?, ?, NULL, ?, ?, ?, ?, ?, ?, ?)");  
        }
        $insert_stmt->bind_param('ssssssssssss',$tmp["firstName"],$tmp["p"],$tmp["address"],$tmp["city"],$tmp["state"],$tmp["firstName"],$tmp["lastName"],$tmp["email"],$tmp["inputMobileNumber"],$tmp["profile_photo"],$tmp["postalCode"],$random_salt); 
        // Esegui la query ottenuta.
        return $insert_stmt->execute();
    }


    public function getUserLogin($email){
        $stmt = $this->db->prepare("SELECT idCliente, username, email, password, salt FROM cliente WHERE email = ? LIMIT 1");
        $stmt->bind_param('s', $email); // esegue il bind del parametro '$email'.
        $stmt->execute(); // esegue la query appena creata.
        $stmt->store_result();
        if($stmt->num_rows == 1){    
            $stmt->bind_result($user_id, $username, $email, $db_password, $salt); // recupera il risultato della query e lo memorizza nelle relative variabili.
            $stmt->fetch();
            $tmp = array("user_id" => $user_id,"username"=>$username, "email" => $email, "password" => $db_password, "salt" => $salt, "role"=>"cliente");
            return $tmp;
        }else{
            $stmt = $this->db->prepare("SELECT idVenditore, username, email, password, salt FROM venditore WHERE email = ? LIMIT 1");
            $stmt->bind_param('s', $email); // esegue il bind del parametro '$email'.
            $stmt->execute(); // esegue la query appena creata.
            $stmt->store_result();
            if($stmt->num_rows == 1){    
                $stmt->bind_result($user_id, $username, $email, $db_password, $salt); // recupera il risultato della query e lo memorizza nelle relative variabili.
                $stmt->fetch();
                $tmp = array("user_id" => $user_id,"username"=>$username, "email" => $email, "password" => $db_password, "salt" => $salt, "role"=>"venditore");
                return $tmp;
            }else{        
                return null;
            }
        }
    }

    public function getUserInfo($id_cliente){

        $stmt = $this->db->prepare("SELECT idCliente, username, email, password, strada, citta, stato, nome, cognome, telefono, immagine, codP, salt FROM cliente WHERE idCliente = ? LIMIT 1");
        $stmt->bind_param('i', $id_cliente); // esegue il bind del parametro '$email'.
        $stmt->execute(); // esegue la query appena creata.
        $stmt->store_result();
        if($stmt->num_rows == 1){    
            $stmt->bind_result($user_id, $username, $email, $db_password, $strada, $citta, $stato, $nome, $cognome, $telefono, $immagine, $codP, $salt); // recupera il risultato della query e lo memorizza nelle relative variabili.
            $stmt->fetch();
            $tmp = array("
                user_id" => $user_id,
                "username"=>$username, 
                "email" => $email, 
                "password" => $db_password,
                "strada" => $strada,
                "citta" => $citta,
                "stato" => $stato,
                "nome" => $nome,
                "cognome" => $cognome,
                "telefono" => $telefono,
                "immagine" => $immagine,
                "codP" => $codP,
                "salt" => $salt,
                "role" => "cliente");

            return $tmp;
        }else{
            $stmt = $this->db->prepare("SELECT idVenditore, username, email, password, strada, citta, stato, nome, cognome, telefono, immagine, codP, salt FROM venditore WHERE idVenditore = ? LIMIT 1");
            $stmt->bind_param('i', $id_cliente); // esegue il bind del parametro '$email'.
            $stmt->execute(); // esegue la query appena creata.
            $stmt->store_result();
            if($stmt->num_rows == 1){    
                $stmt->bind_result($user_id, $username, $email, $db_password, $strada, $citta, $stato, $nome, $cognome, $telefono, $immagine, $codP, $salt); // recupera il risultato della query e lo memorizza nelle relative variabili.
                $stmt->fetch();
                $tmp = array("
                    user_id" => $user_id,
                    "username"=>$username, 
                    "email" => $email, 
                    "password" => $db_password,
                    "strada" => $strada,
                    "citta" => $citta,
                    "stato" => $stato,
                    "nome" => $nome,
                    "cognome" => $cognome,
                    "telefono" => $telefono,
                    "immagine" => $immagine,
                    "codP" => $codP,
                    "salt" => $salt,
                    "role"=>"venditore");

                return $tmp;
            //return null;
            }
        }
        return null;
    }

    public function updateUserInfo($tmp, $random_salt){
        $stmt =  $this->db->prepare("SELECT * FROM cliente WHERE idCliente = ? LIMIT 1");
        $stmt->bind_param('i',$tmp["user_id"]); 
        $stmt->execute(); // esegue la query appena creata.
        $stmt->store_result();
        if(!empty($tmp["profile_photo"])){
            $tmp["profile_photo"] = "img/user/".$tmp["profile_photo"]; 
        }else{
            $tmp["profile_photo"] = "img/user/user_default.png"; 
        }
        if($stmt->num_rows == 1){           
            $insert_stmt =  $this->db->prepare("UPDATE cliente SET username=?, password=?, nome=?, cognome=?, email=?, telefono=?, immagine=?, salt=? 
                                            WHERE idCliente = ?");
        }else{
            $insert_stmt =  $this->db->prepare("UPDATE venditore SET username=?, password=?, nome=?, cognome=?, email=?, telefono=?, immagine=?, salt=? 
                                            WHERE idVenditore = ?");
        }
        $insert_stmt->bind_param('ssssssssi', $tmp["firstName"], $tmp["p"], $tmp["firstName"], $tmp["lastName"], $tmp["email"], $tmp["inputMobileNumber"], $tmp["profile_photo"], $random_salt, $tmp["user_id"]); 
        // Esegui la query ottenuta.
        return $insert_stmt->execute();
    }

    public function updateUserAddress($tmp){
        $stmt =  $this->db->prepare("SELECT * FROM cliente WHERE idCliente = ? LIMIT 1");
        $stmt->bind_param('i',$tmp["user_id"]); 
        $stmt->execute(); // esegue la query appena creata.
        $stmt->store_result();
        if($stmt->num_rows == 1){          
            $insert_stmt =  $this->db->prepare("UPDATE cliente SET strada=?, citta=?, stato=?, codP=? WHERE idCliente = ?");
        }else{
            $insert_stmt =  $this->db->prepare("UPDATE venditore SET strada=?, citta=?, stato=?, codP=? WHERE idCliente = ?");
        }
        $insert_stmt->bind_param('ssssi', $tmp["address"], $tmp["city"], $tmp["state"], $tmp["postalCode"], $tmp["user_id"]); 
        // Esegui la query ottenuta.
        return $insert_stmt->execute();
    }

    public function getAllItems(){
        $stmt = $this->db->prepare("SELECT * FROM oggetto");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllCategory(){
        $stmt = $this->db->prepare("SELECT * FROM categoria");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getItemCat($id){
        $stmt = $this->db->prepare("SELECT categoria.nome, categoria.idCategoria FROM categoria JOIN diviso ON diviso.idCategoria=categoria.idCategoria WHERE diviso.idOggetto=?");
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getItemFromVendor($id){
        $stmt = $this->db->prepare("SELECT * FROM oggetto where oggetto.idVenditore=?");
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getItemFromId($id){
        $stmt = $this->db->prepare("SELECT * FROM oggetto where oggetto.idOggetto=?");
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getItemSpecs($id){
        $stmt = $this->db->prepare("SELECT possiede.idOggetto,statistica.idStat, statistica.nome, statistica.valore FROM statistica JOIN possiede ON possiede.idStat=statistica.idStat WHERE possiede.idOggetto=?");
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function findItem($name){
        $stmt = $this->db->prepare("SELECT * FROM oggetto WHERE oggetto.nome like ?");
        $stmt->bind_param('s',$name);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllStatsFromId($id){
        
        foreach($id as $item){
            $res[$item]=$this->getItemSpecs($item);
        }
        return $res;
    }

    public function getItemOfVendor($id){
        $stmt=$this->db->prepare("SELECT oggetto.nome, oggetto.quantita, oggetto.idOggetto, oggetto.prezzo, oggetto.immagine, oggetto.descrizione FROM oggetto join Venditore on venditore.idVenditore = oggetto.idVenditore where venditore.idVenditore=?");
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSalesOfVendor($id){
        $stmt=$this->db->prepare("SELECT sconto.idSconto, sconto.valore, sconto.dataEmissione, sconto.dataScadenza from sconto JOIN venditore ON venditore.idVenditore = sconto.idVenditore where venditore.idVenditore=?");
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertObj($obj,$cat,$specs){
        $stmt=$this->db->prepare("INSERT INTO oggetto(idOggetto,immagine,descrizione,nome,quantita,idSconto,idVenditore,prezzo) VALUES(NULL,?,?,?,?,NULL,?,?)");
        $stmt->bind_param('sssiid',$obj["profile_photo"],$obj["itemDesc"],$obj["itemName"],$obj["itemQuantity"],$obj["idVenditore"],$obj["itemPrice"]);
        if($stmt->execute()){
            $idObj=$this->db->insert_id;
            $stmtcat=$this->db->prepare("INSERT INTO diviso(idOggetto,idCategoria) VALUES (?,?)");
            foreach($cat as $category){
                $stmtcat->bind_param('ii', $idObj, $category);
                $stmtcat->execute();
            }
            $stmtspec=$this->db->prepare("INSERT INTO statistica(idStat,valore,nome) VALUES (NULL,?,?)");
            $stmtref=$this->db->prepare("INSERT INTO possiede(idOggetto,idStat) VALUES (?,?)");
            foreach($specs as $spec){
                //$stmtspec->bind_param('ss', $spec["valore"],$spec["nome"]);
                $stmtspec->bind_param('ss', $spec[1],$spec[0]);
                if($stmtspec->execute()){
                    $tmpIdSpec=$this->db->insert_id;
                    $stmtref->bind_param('ii',$idObj,$tmpIdSpec);
                    $stmtref->execute();
                }
            }
            return true;
        }else{
            return false;
        }
    }

    public function deleteObj($id){
        $allStats=$this->getItemSpecs($id);
        $stmt=$this->db->prepare("DELETE FROM oggetto WHERE oggetto.idOggetto=?");
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $deleteStat=$this->db->prepare("DELETE FROM statistica WHERE statistica.idStat=?");
        foreach($allStats as $stat){
            $deleteStat->bind_param('i',$stat["idStat"]);
            $deleteStat->execute();
        }
    }

    public function modifyObj($obj){
        $modifyStmt=$this->db->prepare("UPDATE oggetto SET nome=?, descrizione=?, prezzo=?, quantita=?, immagine=? WHERE idOggetto=?");
        $modifyStmt->bind_param('sssdsi',$obj["itemName"],$obj["itemDesc"],$obj["itemPrice"],$obj["itemQuantity"],$obj["profile_photo"],$obj["idOggetto"]);
        $modifyStmt->execute();
    }

    public function deleteCatRef($idObj,$idCat){
        $deleteCatRef=$this->db->prepare("DELETE FROM diviso WHERE diviso.idCategoria=? AND diviso.idOggetto=?");
        $deleteCatRef->bind_param('ii',$idCat,$idObj);
        $deleteCatRef->execute();
    }

    public function modifyCatRef($idObj,$idOldCat,$idNewCat){
        $modifyStmt=$this->db->prepare("UPDATE diviso SET idCategoria=? WHERE idOggetto=? AND idCategoria=?");
        $modifyStmt->bind_param('iii',$idNewCat,$idObj,$idOldCat);
        $modifyStmt->execute();
    }

    public function insertCatRef($idObj,$idCat){
        $addcat=$this->db->prepare("INSERT INTO diviso(idOggetto,idCategoria) VALUES (?,?)");
        $addcat->bind_param('ii',$idObj,$idCat);
        return $addcat->execute();
    }

    

    public function insertStats($idObj,$statN, $statV){
        $insertStat=$this->db->prepare("INSERT INTO statistica(idStat,nome,valore) VALUES(NULL,?,?)");
        $insertStat->bind_param('ss',$statN,$statV);
        if($insertStat->execute()){
            $idStat=$this->db->insert_id;
            var_dump($idStat);
            $refStmt=$this->db->prepare("INSERT INTO possiede(idStat,idOggetto) VALUES(?,?)");
            $refStmt->bind_param('ii',$idStat,$idObj);
            $refStmt->execute();
            return true;
        }
        return false;
    }

    public function deleteStat($id){
        $deleteStatRef=$this->db->prepare("DELETE FROM possiede WHERE possiede.idStat=?");
        $deleteStatRef->bind_param('i',$id);
        $deleteStatRef->execute();
        $deleteStat=$this->db->prepare("DELETE FROM statistica WHERE statistica.idStat=?");
        $deleteStat->bind_param('i',$id);
        $deleteStat->execute();
    }

    public function modifyStat($stat){
        $modifyStmt=$this->db->prepare("UPDATE statistica SET statistica.valore=?, statistica.nome=? WHERE statistica.idStat=?");
        $modifyStmt->bind_param('ssi',$stat["valore"], $stat["nome"], $stat["id"]);
        $modifyStmt->execute();
    }

    public function insertIntoCart($idCliente,$obj){
        
        $stmt=$this->db->prepare("INSERT INTO contiene(idCliente,idOggetto,quantita) VALUES(?,?,?)");
        $stmtUp=$this->db->prepare("UPDATE contiene SET quantita=? WHERE idCliente=? AND idOggetto=?");
        foreach($obj["id"] as $key=>$id){
            $present=$this->controlIfItemInCart($idCliente,$id);
            var_dump($present);
            if($present===false){    
                $stmt->bind_param('iii',$idCliente,$id,$obj["qnt"][$key]);
                $stmt->execute();
            }else{

                $present=$obj["qnt"][$key];
                $stmtUp->bind_param('iii',$present,$idCliente,$id);
                $stmtUp->execute();
            }
        }
    }

    public function controlIfItemInCart($idC,$idIt){
        $stmt=$this->db->prepare("SELECT * FROM contiene where idCliente=? and idOggetto=? ");
        $stmt->bind_param('ii',$idC,$idIt);
        $stmt->execute();
        $result = $stmt->get_result();
        $ris=$result->fetch_all(MYSQLI_ASSOC);
        if($result->num_rows==0){
            return false;
        }else{
            return $ris[0]["quantita"];
        }
    }


    public function getAllIntoCart($id){
        $stmt=$this->db->prepare("SELECT * FROM contiene where idCliente=? ");
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);

    }


}
?>