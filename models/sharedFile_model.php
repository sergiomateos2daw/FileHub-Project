<?php
class sharedFile_model{
    private $db;
 
    public function __construct(){
        $this->db=Conectar::conexion();
    }

    public function obtenerRuta($codigo){
        
        $consulta=$this->db->query("select * from shared_files where url = '$codigo';");
        while($filas=$consulta->fetch_assoc()){
            $location[]=$filas;
        }
        if (isset($location)) {
            return $location;
        }else{
            return $location = "Enlace no válido";
        }
        
        
    }

}
?>