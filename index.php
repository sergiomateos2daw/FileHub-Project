<?php
    session_start();
    if(!isset($_SESSION['email'])) {
        require_once("controllers/login_controller.php");
        session_destroy();
        exit();
    }
    require_once("db/conexion.php");
    require_once("controllers/spaces_controller.php");
?>