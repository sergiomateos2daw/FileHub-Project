<?php
class createSharedFile_model{
    private $db;
 
    public function __construct(){
        $this->db=Conectar::conexion();
    }

    public function insert_shared_file($user_id, $space_id, $file, $url){
        
        $query = "INSERT INTO shared_files VALUES (
            null,
            '$user_id',
            '$file',
            '$url',
            '../Spaces/$user_id/$space_id/$file')";

        $this->db=Conectar::conexion();

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
    }

}
?>