<?php
class createSpace_model{
    private $db;
 
    public function __construct(){
        $this->db=Conectar::conexion();
    }

    public function new_space($space_name, $space_description, $user_id){
        //Saneamos los datos del formulario Filter_sanitize
        
        $query = "INSERT INTO spaces VALUES (
            null,
            '$user_id',
            '$space_name',
            '$space_description',
            0)";

        $this->db=Conectar::conexion();

        $stmt = $this->db->prepare($query);
        $stmt->execute();
    
        header('Location: ../index.php');
        exit();
    }

    public function read_num_spaces($user_id){
        //Saneamos los datos del formulario Filter_sanitize

        $stmt = $this->db->prepare("SELECT num_spaces FROM users WHERE id = $user_id");
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($num_spaces);
        $stmt->fetch();
        $num_spaces = $num_spaces;
        $stmt->close();
        return $num_spaces;
    }

}
?>