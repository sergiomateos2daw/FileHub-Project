<?php

    if(!isset($_SESSION['email'])) {
        header("Location: ../index.php");
        exit();
    }
    //Llamada al modelo
    require_once("models/spaces_model.php");
    
    $per=new spaces_model();
    $datos=$per->get_spaces();
    
    foreach ($datos as $dato) {
        $path = 'Spaces/'.$dato["id_user"].'/'.$dato["id"];
        if (!file_exists($path)) {
            mkdir($path, 0777);
        }
    }
    
    //Llamada a la vista
    require_once("views/spaces_view.php");
?>