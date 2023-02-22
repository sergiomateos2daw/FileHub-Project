<?php
class sessionStart_model{
    private $db;

    function login($email, $password) {
        $this->db=Conectar::conexion();
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($this->db, $query);
        
        if(mysqli_num_rows($result) == 1) {
            mysqli_close($this->db);
            return true;
        } else {
            mysqli_close($this->db);
            return false;
        }
    }
    
    function getUsuario($email) {
        $this->db = Conectar::conexion();
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($this->db, $query);
        
        $usuaio = mysqli_fetch_assoc($result);
        mysqli_close($this->db);
        return $usuaio;
    }
    
    function startSession($email, $user_id, $name, $rol) {
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['name'] = $name;
        $_SESSION['rol'] = $rol;
    }
}
?>
