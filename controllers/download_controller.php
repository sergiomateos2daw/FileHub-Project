<?php

    session_start();
    if(!isset($_SESSION['email'])) {
        header("Location: ../index.php");
        exit();
    }
    
    $user_id = $_SESSION['user_id'];
    $space_id = $_GET['space_id'];
    $file = $_GET['file'];


    if(file_exists("../Spaces/$user_id/$space_id/$file")){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize("../Spaces/$user_id/$space_id/$file"));
        readfile("../Spaces/$user_id/$space_id/$file");
      } else {
        echo "no existe";
      }


?>