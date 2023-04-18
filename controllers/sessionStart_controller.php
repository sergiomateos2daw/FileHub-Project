<?php
session_start();
require_once("../controllers/error_controller.php");
require_once("../models/sessionStart_model.php");
require_once("../db/conexion.php");

$sessionStart=new sessionStart_model();

if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if($sessionStart->login($email, $password)) {
        $user = $sessionStart->getUsuario($email);
        $sessionStart->startSession($user['email'],$user['id'],$user['name'],$user['rol']);
        header('Location: ../index.php');
    } else {
        // echo 'Usuario o contraseña incorrectos.';
        header('Location: ../index.php?cod=004');
        // header('Location: ../index.php');
        session_destroy();
        exit();
    }
}else{
}

?>