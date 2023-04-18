<?php
session_start();
require_once("../models/insertNewPass_model.php");
require_once("../db/conexion.php");

$insertNewPass=new insertNewPass_model();

// Comprobamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    // Obtenemos los valores enviados por el formulario
    $email = $_SESSION['email_returned'];
    $password = $_POST["password"];
    $re_password = $_POST["re_password"];
    
    // Verificamos si todos los campos están rellenados
    if (!empty($password) && !empty($re_password)) {
      
      // Comprobamos si las contraseñas coinciden
      if ($password == $re_password) {
        
        // Si las contraseñas coinciden, podemos llamar a la función
        $insertNewPass->insert_new_pass($email, $password);
        
      } else {
        // Si las contraseñas no coinciden, mostramos un mensaje de error
        // echo "Las contraseñas no coinciden.";
        header('Location: generateNewPass_controller.php?cod=001&token='.$_SESSION['token_returned'].'');
      }
      
    } else {
      // Si no se han rellenado todos los campos, mostramos un mensaje de error
      header('Location: generateNewPass_controller.php?cod=002&token='.$_SESSION['token_returned'].'');
    }
  }
