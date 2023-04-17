<?php
    
    session_start();

    // Llamada al modelo
    require_once("../models/createSharedFile_model.php");
    // Llamada a la conexión
    require_once("../db/conexion.php");

    $createSharedFile=new createSharedFile_model();

    $space_name = $_GET['space_name'];
    $user_id = $_SESSION['user_id'];
    $space_id = $_GET['space_id'];
    $file = $_GET['file'];

    $codigo = bin2hex(random_bytes(14));
    $codigo = str_replace(' ', '', $file) . '_' . $codigo;
    $codigo = preg_replace('([^A-Za-z0-9])', '', $codigo);
    
    $url_created = "https://localhost/filehub/controllers/sharedFile_controller.php?codigo=$codigo";

    $createSharedFile->insert_shared_file($user_id, $space_id, $file, $codigo);
    
    // LLamada a la vista
    require_once("../views/createSharedFile_views.php");
?>