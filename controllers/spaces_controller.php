<?php

    if(!isset($_SESSION['email'])) {
        header("Location: ../index.php");
        exit();
    }
    //Llamada al modelo
    require_once("models/spaces_model.php");
    
    $per=new spaces_model();
    $datos=$per->get_spaces();
    $contador_espacios = 0;
    $porcentaje_usado = 0;
    
    foreach ($datos as $dato) {
        $path = 'Spaces/'.$dato["id_user"].'/'.$dato["id"];
        if (!file_exists($path)) {
            mkdir($path, 0777);
        }
        $contador_espacios += 1;
    }
    
    function obtenerPorcentaje($cantidad, $total) {
        $porcentaje = ((float)$cantidad * 100) / $total; // Regla de tres
        $porcentaje = round($porcentaje, 0);  // Quitar los decimales
        return $porcentaje;
    }

    $porcentaje_usado = obtenerPorcentaje($contador_espacios, 8);
    
    //Llamada a la vista
    require_once("views/spaces_view.php");
?>