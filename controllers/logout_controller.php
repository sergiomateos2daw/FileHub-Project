<?php

        require_once("../controllers/error_controller.php");
        session_start();
        session_destroy();
        header("Location: ../index.php");
        exit;
?>
