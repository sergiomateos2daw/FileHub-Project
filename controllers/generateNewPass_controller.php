<?php

    //Llamada al modelo
    require_once("../controllers/error_controller.php");
    require_once("../models/generateNewPass_model.php");
    require_once("../db/conexion.php");

    $generateNewPass=new generateNewPass_model();

    if (isset($_GET['token'])) {
        $token = $_GET['token'];
      } else {
        // Si no se proporciona un token, redirigir al usuario a la página de inicio de sesión
        header('Location: ../login.php?cod=006');
        exit();
      }

    

    $generateNewPass->recover($token);


?>