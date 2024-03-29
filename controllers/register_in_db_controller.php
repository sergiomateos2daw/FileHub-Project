<?php
session_start();
require_once("../models/register_in_db_model.php");
require_once("../db/conexion.php");

$register_in_db=new register_in_db_model();

// Comprobamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    // Obtenemos los valores enviados por el formulario
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $re_password = $_POST["re_password"];
    
    // Verificamos si todos los campos están rellenados
    if (!empty($name) && !empty($email) && !empty($password) && !empty($re_password)) {
      
      // Comprobamos si las contraseñas coinciden
      if ($password == $re_password) {
        
        // Si las contraseñas coinciden, podemos llamar a la función
        $register_in_db->register($name, $email, $password);
        
      } else {
        // Si las contraseñas no coinciden, mostramos un mensaje de error
        // echo "Las contraseñas no coinciden.";
        header('Location: register_controller.php?cod=001');
      }
      
    } else {
      // Si no se han rellenado todos los campos, mostramos un mensaje de error
      header('Location: register_controller.php?cod=002');
    }
  }
