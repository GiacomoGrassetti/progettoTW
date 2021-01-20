<?php
class DbHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db=new mysqli($servername, $username, $password, $dbname, $port);
        if($this->db->connect_error){
            die("Connection to database failed: " . $this->db->connect_error );
        }
    }

    public function getAllItems(){
        $stmt = $this->db->prepare("SELECT * FROM oggetto");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getItemCat($id){
        $stmt = $this->db->prepare("SELECT categoria.nome FROM categoria JOIN diviso ON diviso.idCategoria=categoria.idCategoria WHERE diviso.idOggetto=?");
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
}
?>