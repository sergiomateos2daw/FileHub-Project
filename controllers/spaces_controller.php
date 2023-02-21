<?php
    //Llamada al modelo
    require_once("models/spaces_model.php");
    $per=new spaces_model();
    $datos=$per->get_spaces();
    
    //Llamada a la vista
    require_once("views/spaces_view.php");
?>