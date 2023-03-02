<?php
    //Llamada al modelo
    session_start();
    if(!isset($_SESSION['email'])) {
        header("Location: ../index.php");
        exit();
    }
    require_once("../models/removeSpace_model.php");
    require_once("../db/conexion.php");

    $removeSpace=new removeSpace_model();

    $space_id = $_GET['space_id'];
    $user_id = $_GET['user_id'];

    $removeSpace->remove_space($space_id,$user_id);
    
    //Llamada a la vista
    require_once("../views/spaces_view.php");
?>