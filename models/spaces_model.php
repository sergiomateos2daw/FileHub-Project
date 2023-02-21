<?php
class spaces_model{
    private $db;
    private $spaces;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->spaces=array();
    }
    public function get_spaces(){
        $consulta=$this->db->query("select * from spaces;");
        while($filas=$consulta->fetch_assoc()){
            $this->spaces[]=$filas;
        }
        return $this->spaces;
    }
}
?>