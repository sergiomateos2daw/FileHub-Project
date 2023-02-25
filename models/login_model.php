<?php
class login_model{
    private $db;
    private $users;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->users=array();
    }

    public function get_users(){
        $consulta=$this->db->query("select * from users;");
        while($filas=$consulta->fetch_assoc()){
            $this->users[]=$filas;
        }
        return $this->users;
    }
}
?>