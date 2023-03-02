<?php
session_start();
if(!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit();
}
require_once("../models/register_in_db_model.php");
require_once("../db/conexion.php");

$register_in_db=new register_in_db_model();

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re_password'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    if($password == $re_password){
        $register_in_db->register($name, $email, $password);
    }else{
        echo '<h1>Las contraseñas no coinciden</h1>';
        header('Location: ../index.php');
        
    }
    
    

}else{
    echo 'no entra';
}

?>