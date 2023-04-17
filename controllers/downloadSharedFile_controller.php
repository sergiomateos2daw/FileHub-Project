<?php

    
    
    $file = $_GET['file'];
    $location = $_GET['location'];

    descargar($file, $location);

    function descargar($file, $location){
        $rutaAbsoluta = "$location"; // La ubicación del archivo. En mi caso está en el mismo directorio que este script
        $nombreArchivo = "$file"; // El nombre que se le sugiere al usuario cuando guarda el archivo. Solo el nombre, NO la ruta absoluta
        $tamanio = filesize($rutaAbsoluta);
        $tamanioFragmento = 5 * (1024 * 1024); //5 MB
        set_time_limit(300);
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Pragma: no-cache");
        header('Content-Length: ' . $tamanio);
        header(sprintf('Content-disposition: attachment; filename="%s"', $nombreArchivo));
        // Servir el archivo en fragmentos, en caso de que el tamaño del mismo sea mayor que el tamaño del fragmento
        if ($tamanio > $tamanioFragmento) {
        $manejador = fopen($rutaAbsoluta, 'rb');

        // Mientras no lleguemos al final del archivo...
        while (!feof($manejador)) {
            // Imprime lo que regrese fread, y fread leerá N cantidad de bytes en donde N es el tamaño del fragmento
            print(@fread($manejador, $tamanioFragmento));

            ob_flush();
            flush();
        }
        // Cerrar el archivo
        fclose($manejador);
        } else {
        // Si el tamaño del archivo es menor que el del fragmento, podemos usar readfile sin problema
        readfile($rutaAbsoluta);
        }
    }

?>