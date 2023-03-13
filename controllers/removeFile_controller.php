<?php
    //Llamada al modelo
    session_start();
    if(!isset($_SESSION['email'])) {
        header("Location: ../index.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $space_id = $_GET['space_id'];
    $space_name= $_GET['space_name'];
    $file= $_GET['file'];

    unlink("../Spaces/$user_id/$space_id/$file"); 
    
    //Llamada a la vista
    require_once('../controllers/filesOfSpaces_controller.php');
?>