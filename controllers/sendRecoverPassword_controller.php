<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer-master/src/Exception.php';
    require '../PHPMailer-master/src/PHPMailer.php';
    require '../PHPMailer-master/src/SMTP.php';

    require_once("../models/sendRecoverPassword_model.php");
    require_once("../db/conexion.php");

    $mail = new PHPMailer();

    $email = $_POST['email'];
    

    $sendRecoverPassword=new sendRecoverPassword_model();

    function generarToken() {
        $bytes = random_bytes(16);
        return bin2hex($bytes);
    }

    $token = generarToken();    
    
    $sendRecoverPassword->insert_token_in_db($email, $token);

    ///////// ENVIO DE EMAIL DE RECUPERACION /////////
    
    $mail = new PHPMailer();
    $mail->CharSet = 'utf-8';
    $mail->Host = "smtp.googlemail.com";
    $mail->From = "smatpue573@g.educaand.es";
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Username = "smatpue573@g.educaand.es";
    $mail->Password = "pplnqldtfrgbayvy";
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->AddAddress("$email");
    $mail->SMTPDebug  = 1;   //Muestra las trazas del mail, 0 para ocultarla
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Recuperación de contraseña';
    $mail->Body    = '<img src="../images/LOGO_250x250.png" alt="Logo de Filehub" style="width: 200px; height: auto; margin-bottom: 20px;"> <p>Estimado/a ' . $email . ',</p><p>Hemos recibido una solicitud de recuperación de contraseña para su cuenta en nuestro sitio web. Si no solicitó una recuperación de contraseña, simplemente ignore este correo electrónico.</p><p>Si desea continuar con la recuperación de contraseña, haga clic en el siguiente enlace:</p><p><a href="https://localhost/filehub/controllers/generateNewPass_controller.php?token=' . $token . '">Crear nueva contraseña</a></p><p>Si tiene problemas con el enlace anterior, copie y pegue la siguiente URL en su navegador:</p><p>https://localhost/filehub/controllers/generateNewPass_controller.php?token=' . $token . '</p><p>Gracias,</p><p>Equipo de Soporte de FileHub</p>';  // Contenido del mensaje
    $mail->AltBody = '<img src="../images/LOGO_250x250.png" alt="Logo de Filehub" style="width: 200px; height: auto; margin-bottom: 20px;"> <p>Estimado/a ' . $email . ',</p><p>Hemos recibido una solicitud de recuperación de contraseña para su cuenta en nuestro sitio web. Si no solicitó una recuperación de contraseña, simplemente ignore este correo electrónico.</p><p>Si desea continuar con la recuperación de contraseña, haga clic en el siguiente enlace:</p><p><a href="https://localhost/filehub/controllers/generateNewPass_controller.php?token=' . $token . '">Crear nueva contraseña</a></p><p>Si tiene problemas con el enlace anterior, copie y pegue la siguiente URL en su navegador:</p><p>https://localhost/filehub/controllers/generateNewPass_controller.php?token=' . $token . '</p><p>Gracias,</p><p>Equipo de Soporte de FileHub</p>';  // Contenido del mensaje;

    
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
        header('Location: ../index.php?cod=005');
    }

    //////////////////////////////////////////////////

?>