<?php
class filesOfSpaces_model{
    private $db;
 
    public function __construct(){
        $this->db=Conectar::conexion();
    }

    public function update_num_files($space_id, $num_files){
        //Saneamos los datos del formulario Filter_sanitize
        
        $query = "UPDATE spaces set num_files=$num_files where id = $space_id";

        $this->db=Conectar::conexion();

        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }

    public function get_num_files($space_id){
        $consulta=$this->db->query("select num_files from spaces where id = $space_id;");
        while($filas=$consulta->fetch_assoc()){
            $num_files[]=$filas;
        }
        return $num_files;
    }
}
?>