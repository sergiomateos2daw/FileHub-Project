<?php
    
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">';
    echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>';

    // $cod_error=0;

    if(isset($_GET["cod"])){
        $cod_error = $_GET["cod"];
    }else{
        $cod_error = 000;
    }
    

    function alert_mensaje($menaje)
    {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Opss...</strong> '.$menaje.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    function alert_mensaje_success($menaje)
    {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Opss...</strong> '.$menaje.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    switch ($cod_error){
        case 000:
            // EN CASO DE NO HABER ERROR, NO HACE NADA
            break;
        case 001:
            alert_mensaje("Las contraseñas no coinciden.");   
        break;
        case 002:
            alert_mensaje("Debes rellenar todos los campos.");   
        break;
        case 003:
            alert_mensaje("Ya existe una cuenta en uso con esa dirección de correo.");   
        break;
        case 004:
            alert_mensaje("Usuario o contraseña incorrectos.");   
        break;
        case 005:
            alert_mensaje_success("Se ha enviado un correo para recuperar la contraseña.");   
        break;
        case 006:
            alert_mensaje("Enlace de recuperación no válido.");   
        break;
        case 007:
            alert_mensaje_success("Contraseña actulizada correctamente.");   
        break;
        case 010:
            alert_mensaje_success("Inicia sesión de nuevo para finalizar el cambio de nombre.");   
        break;
    }
?>