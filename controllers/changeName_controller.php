<?php
session_start();
require_once("../controllers/error_controller.php");
require_once("../models/changeName_model.php");
require_once("../db/conexion.php");

$changeName=new changeName_model();

// Comprobamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    // Obtenemos los valores enviados por el formulario
    $name = $_POST["name"];
    
    // Verificamos si todos los campos están rellenados
    if (!empty($name)) {
      
      $changeName->change_name($name);

    } else {
      // Si no se han rellenado todos los campos, mostramos un mensaje de error
      header('Location: profile_controller.php?cod=002');
    }
  }
