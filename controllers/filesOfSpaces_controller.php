<?php
    
    session_start();
    //Llamada al modelo
    $space_name = $_GET['space_name'];
    require_once("../models/filesOfSpaces_model.php");
    require_once("../db/conexion.php");

    $path = "../Spaces/";
    if ($handler = opendir($thefolder)) {
        while (false !== ($file = readdir($handler))) {
            echo "$file<br>";
        }
        closedir($handler);
    }


    //Llamada a la vista
    require_once("../views/filesOfSpaces_view.php");
?>