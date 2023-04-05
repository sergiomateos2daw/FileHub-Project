<?php
session_start();
$space_id = $_GET['space_id'];
$space_name = $_GET['space_name'];
$user_id = $_SESSION['user_id'];

if (isset($_FILES['files']) && !empty($_FILES['files'])) {
    // Upload destination directory
    $upload_destination = "../Spaces/$user_id/$space_id/";
    // Iterate all the files and move the temporary file to the new directory
    for ($i = 0; $i < count($_FILES['files']['tmp_name']); $i++) {
        // Add your validation here
        $file_name = $_FILES['files']['name'][$i];
        $file_path = $upload_destination . $file_name;
        // Check if file exists
        if (file_exists($file_path)) {
            $file_parts = pathinfo($file_name);
            $file_name = $file_parts['filename'] . '_' . time() . '.' . $file_parts['extension'];
        }
        // Move temporary files to new specified location with the new filename
        move_uploaded_file($_FILES['files']['tmp_name'][$i], $upload_destination . $file_name);
    }
    // Output response
    echo '<h1>Archivos subidos con éxito</h1>';
    echo '<a class="btn btn-primary" href="../controllers/filesOfSpaces_controller.php?space_name='. $space_name .'&space_id='. $space_id .'">Volver</a>';
}

?>