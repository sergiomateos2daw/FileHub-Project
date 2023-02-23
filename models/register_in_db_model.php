<?php
class register_in_db_model{
    private $db;

    function register($name, $email, $password) {

        $password_encriptado = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users VALUES (
            null,
            '$name',
            '$email',
            '$password_encriptado',
            'no-premium')";

        $this->db=Conectar::conexion();

        $stmt = $this->db->prepare($query);
        $stmt->execute();

    
        header('Location: ../index.php');
        exit();
        
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
