<?php
class changeName_model{
    private $db;

    function change_name($name) {

        $query = "UPDATE users SET name = ? WHERE id = ?";

        $this->db=Conectar::conexion();


        $stmt = mysqli_prepare($this->db, $query);

        mysqli_stmt_bind_param($stmt, "ss", $name, $_SESSION['user_id']);

        if (mysqli_stmt_execute($stmt)) {
            header('Location: logout_controller.php?cod=010');
            mysqli_close($this->db);
            // exit();
            
        } else {
            header('Location: ../index.php');
            mysqli_close($this->db);
            session_destroy();
            exit();
        }
        
    }
}
?>
