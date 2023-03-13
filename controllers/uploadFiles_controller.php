<?php
    
    session_start();

    $space_name = $_GET['space_name'];
    $space_id = $_GET['space_id'];
    $user_id = $_SESSION['user_id'];

    // Llamada al modelo
    require_once("../models/uploadFiles_model.php");
    // Llamada a la conexión
    require_once("../db/conexion.php");
    // LLamada a la vista
    require_once("../views/uploadFiles_view.php");


?>