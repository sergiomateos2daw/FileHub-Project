<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Espacios</title>
    </head>
    <body>
        <?php
            foreach ($datos as $dato) {
                echo $dato["description"]."<br/>";
            }
        ?>
    </body>
</html>