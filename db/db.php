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
            return null;
        }
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
            $tmp = array("user_id" => $user_id,"username"=>$username, "email" => $email, "password" => $db_password, "salt" => $salt);
            return $tmp;
        }else{
            return null;
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
                "salt" => $salt);

            return $tmp;
        }else{
            return null;
        }
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
                                            WHERE idCliente = ?");
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

    public function getItemFromId($id){
        $stmt = $this->db->prepare("SELECT * FROM oggetto where oggetto.idOggetto=?");
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getItemSpecs($id){
        $stmt = $this->db->prepare("SELECT possiede.idOggetto, statistica.nome, statistica.valore FROM statistica JOIN possiede ON possiede.idStat=statistica.idStat WHERE possiede.idOggetto=?");
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

    public function addNewObject($obj,$cat,$specs){
        $obj["immagine"]="a.png";
        $obj["nome"]="ssss";
        $obj["descrizione"]="sssssssssssssssssssssssssss";
        $obj["quantita"]=9;
        $obj["idSconto"]=null;
        $obj["idVenditore"]=3;
        $obj["prezzo"]=5.7;
        $cat["id"]=5;
        $cat["id"]=9;
        $spec["nome"]="sdsdsds";
        $spec["valore"]="4564";
        $specs[]=$spec;
        $stmt=$this->db->prepare("INSERT INTO oggetto(idOggetto,immagine,descrizione,nome,quantita,idSconto,idVenditore,prezzo) VALUES(NULL,?,?,?,?,?,?,?)");
        $stmt->bind_param('sssiiid',$obj["immagine"],$obj["descrizione"],$obj["nome"],$obj["quantita"],$obj["idSconto"],$obj["idVenditore"],$obj["prezzo"]);
        if($stmt->execute()){
            $stmtcat=$this->db->prepare("INSERT INTO diviso(idOggetto,idCategoria) VALUES (?,?)");
            foreach($cat as $category){
                $stmtcat->bind_param('ii', $stmt->insert_id, $category);
                $stmtcat->execute();
            }
            $stmtspec=$this->db->prepare("INSERT INTO statistica(idStat,valore,nome) VALUES (NULL,?,?)");
            $stmtref=$this->db->prepare("INSERT INTO possiede(idOggetto,idStat) VALUES (?,?)");
            foreach($specs as $spec){
                $stmtspec->bind_param('ss', $spec["valore"],$spec["nome"]);
                if($stmtspec->execute()){
                    $stmtref->bind_param('ii',$stmt->insert_id,$stmtspec->insert_id);
                    $stmtref->execute();
                }

            }
            return true;
        }else{
            return false;
        }
    }
}
?>