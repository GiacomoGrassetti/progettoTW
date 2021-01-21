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
        if($tmp["inputRole"] == "customer"){
            $insert_stmt =  $this->db->prepare("INSERT INTO cliente (password, strada, citta, stato, idCliente, nome, cognome, email, telefono, immagine, codP, salt)
                                            VALUES (?, ?, ?, ?, NULL, ?, ?, ?, ?, ?, ?, ?)");  
        }else{
            var_dump($tmp);
            $insert_stmt =  $this->db->prepare("INSERT INTO venditore (password, strada, citta, stato, idVenditore, nome, cognome, email, telefono, immagine, codP, salt)
                                            VALUES (?, ?, ?, ?, NULL, ?, ?, ?, ?, ?, ?, ?)");  
        }
        $insert_stmt->bind_param('sssssssssss',$tmp["p"],$tmp["address"],$tmp["city"],$tmp["state"],$tmp["firstName"],$tmp["lastName"],$tmp["email"],$tmp["inputMobileNumber"],$tmp["profile_photo"],$tmp["postalCode"],$random_salt); 
        // Esegui la query ottenuta.
        return $insert_stmt->execute();
    }

    public function getUserLogin($email){
        $stmt = $this->db->prepare("SELECT idCliente, username, email, password, salt FROM cliente WHERE email = ? LIMIT 1");
        $stmt->bind_param('s', $email); // esegue il bind del parametro '$email'.
        $stmt->execute(); // esegue la query appena creata.
        $stmt->store_result();
        if($stmt->num_rows == 1){    
            $stmt->bind_result($user_id,$username, $email, $db_password, $salt); // recupera il risultato della query e lo memorizza nelle relative variabili.
            $stmt->fetch();
            $tmp = array("user_id" => $user_id,"username"=>$username, "email" => $email, "password" => $db_password, "salt" => $salt);
            return $tmp;
        }else{
            return null;
        }
    }

    public function getAllItems(){
        $stmt = $this->db->prepare("SELECT * FROM oggetto");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getItemCat($id){
        $stmt = $this->db->prepare("SELECT categoria.nome FROM categoria JOIN diviso ON diviso.idCategoria=categoria.idCategoria WHERE diviso.idOggetto=? and (categoria.idCategoria=2 or categoria.idCategoria=8)");
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
        $stmt = $this->db->prepare("SELECT statistica.nome, statistica.valore FROM statistica JOIN possiede ON possiede.idStat=statistica.idStat WHERE possiede.idOggetto=?");
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function controlEmailExist($mail,$type){
        var_dump($type);
        $stmt = $this->db->prepare("SELECT COUNT(*) as num FROM cliente WHERE cliente.email=?");
        $stmt->bind_param('i',$mail);
        $stmt->execute();
        $result = $stmt->get_result();
        $result=$result->fetch_all(MYSQLI_ASSOC);
        var_dump($result);

        $tmp=$result[0]["num"];
        $stmt = $this->db->prepare("SELECT COUNT(*) as num FROM venditore WHERE venditore.email=?");
        $stmt->bind_param('i',$mail);
        $stmt->execute();
        $result = $stmt->get_result();
        $result=$result->fetch_all(MYSQLI_ASSOC);
        var_dump($result);
        $tmp+=$result[0]["num"];
        var_dump($tmp);
        return ($tmp==0)?true:false;
    }

    public function findItem($name){
        $stmt = $this->db->prepare("SELECT * FROM oggetto WHERE oggetto.nome like ?");
        $stmt->bind_param('s',$name);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>