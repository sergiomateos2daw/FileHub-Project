<?php
class generateNewPass_model{
    private $db;
 
    public function __construct(){
        $this->db=Conectar::conexion();
    }

    public function recover($token){
        // Comprobar si el token existe en la base de datos
        $stmt = $this->db->prepare("SELECT email FROM recover_pass WHERE token = ?");
        $stmt->bind_param('s', $token);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 0) {
            // Si el token no es válido o ha expirado, redirigir al usuario a la página de inicio de sesión
            header('Location: ../login.php?cod=006');
            exit();
        }

        // Si el token es válido, almacenar el correo electrónico en una variable de sesión

        session_start();

        $stmt->bind_result($email);
        $stmt->fetch();
        $_SESSION['email_returned'] = $email;
        $_SESSION['token_returned'] = $token;
        $stmt->close();
        //Llamada a la vista
        require_once("../views/generateNewPass_view.php");
        
    }


}
?>