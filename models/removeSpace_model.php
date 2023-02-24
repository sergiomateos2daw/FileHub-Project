<?php
class removeSpace_model{
    private $db;
 
    public function __construct(){
        $this->db=Conectar::conexion();
    }

    public function remove_space($space_id){
        //Saneamos los datos del formulario Filter_sanitize
        
        $query = "delete from spaces where id = '$space_id'";

        $this->db=Conectar::conexion();

        $stmt = $this->db->prepare($query);
        $stmt->execute();

    
        header('Location: ../index.php');
        exit();
    }
}
?>