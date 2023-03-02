<?php
    
    session_start();
    //Llamada al modelo
    $space_name = $_GET['space_name'];
    require_once("../models/filesOfSpaces_model.php");
    require_once("../db/conexion.php");


    //Llamada a la vista
    require_once("../views/filesOfSpaces_view.php");
?>