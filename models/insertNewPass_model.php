<?php
class insertNewPass_model{
    private $db;

    function insert_new_pass($email, $password) {
        
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "UPDATE users SET password = ? WHERE email = ?";

        $this->db=Conectar::conexion();


        $stmt = mysqli_prepare($this->db, $query);

        mysqli_stmt_bind_param($stmt, "ss", $password, $email);

        if (mysqli_stmt_execute($stmt)) {
            header('Location: ../index.php?cod=007');
            mysqli_close($this->db);
            exit();
            
        } else {
            header('Location: ../index.php');
            mysqli_close($this->db);
            exit();
        }
        
    }
}
?>
