<?php
class sendRecoverPassword_model{
    private $db;
 
    public function __construct(){
        $this->db=Conectar::conexion();
    }

    public function insert_token_in_db($email, $token){
        
        $query = "INSERT INTO recover_pass VALUES (
            null,
            '$email',
            '$token')";

        $this->db=Conectar::conexion();

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
    }

}
?>