<?php
    //Llamada al modelo
    require_once("controllers/error_controller.php");
    require_once("models/login_model.php");
    require_once("db/conexion.php");

    $per=new login_model();
    $datos_users=$per->get_users();
    
    foreach ($datos_users as $dato_user) {
        $path = 'Spaces/'.$dato_user["id"];
        if (!file_exists($path)) {
            mkdir($path, 0777);
        }
    }

    //Llamada a la vista
    require_once("views/login_view.php");
?>