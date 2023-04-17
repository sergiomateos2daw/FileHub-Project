<?php

    // Llamada al modelo
    require_once("../models/sharedFile_model.php");
    // Llamada a la conexión
    require_once("../db/conexion.php");

    $sharedFile=new sharedFile_model();

    $codigo = $_GET['codigo'];

    $get_file = $sharedFile->obtenerRuta($codigo);

    if($get_file=="Enlace no válido"){
        $file = "Enlace no válido";
        $location = "Enlace no válido";
    }else{
        $file = $get_file[0]['name'];
        $location = $get_file[0]['location'];
    }
    
    
    // LLamada a la vista
    require_once("../views/sharedFile_views.php");
?>