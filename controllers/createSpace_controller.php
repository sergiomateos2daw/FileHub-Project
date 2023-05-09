<?php
    session_start();
    if(!isset($_SESSION['email'])) {
        header("Location: ../index.php");
        exit();
    }
    //Llamada al modelo
    
    require_once("../models/createSpace_model.php");
    require_once("../db/conexion.php");

    $createSpace=new createSpace_model();

    $space_name = filter_var($_POST['space_name'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
    $space_description = filter_var($_POST['space_description'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
    $user_id = filter_var($_POST['user_id'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);

    $num_spaces = $createSpace->read_num_spaces($user_id);
    
    if($num_spaces < 8){
        $createSpace->new_space($space_name, $space_description, $user_id);
    }else{
        header('Location: ../index.php?cod=001');
    }
    
    
    //Llamada a la vista
    require_once("../views/spaces_view.php");
?>