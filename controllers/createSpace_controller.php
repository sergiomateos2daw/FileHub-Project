<?php
    //Llamada al modelo
    require_once("../models/createSpace_model.php");
    require_once("../db/conexion.php");

    $createSpace=new createSpace_model();

    $space_name = filter_var($_POST['space_name'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
    $space_description = filter_var($_POST['space_description'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
    $user_id = filter_var($_POST['user_id'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);

    $createSpace->new_space($space_name, $space_description, $user_id);
    
    //Llamada a la vista
    require_once("../views/spaces_view.php");
?>