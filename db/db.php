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
        $stmt = $this->db->prepare("SELECT * FROM oggetto where oggetto.id=?");
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>