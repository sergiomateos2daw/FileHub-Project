<?php
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
        echo 'Username or password is incorrect.';
        header('Location: ../index.php');
        session_destroy();
        exit();
    }
}else{
    echo 'No entra';
}

?>