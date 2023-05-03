<?php
class profile_model{
    private $db;
 
    public function __construct(){
        $this->db=Conectar::conexion();
    }


}
?>