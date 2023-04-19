<?php
    session_start();
    if(!isset($_SESSION['email'])) {
        header("Location: ../index.php");
        exit();
    }
    //Llamada al modelo
    
    require_once("../models/profile_model.php");
    require_once("../db/conexion.php");

    $profile_model=new profile_model();
    
    //Llamada a la vista
    require_once("../views/profile_view.php");
?>