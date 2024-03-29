<?php
if (!isset($_SESSION['email'])) {
  header("Location: ../index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <title>Subir archivos - FileHub</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css'>
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
  <!-- FAVICON PARA DIFERENTES DISPOSITIVOS -->
  <link rel="apple-touch-icon" sizes="180x180" href="../images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon/favicon-16x16.png">
  <link rel="manifest" href="../images/favicon/site.webmanifest">
  <link rel="mask-icon" href="../images/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#2d89ef">
  <meta name="theme-color" content="#ffffff">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a522cdd2e0.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../styles/spaces_styles.css">

  <!------------------------------------------>
</head>

<body>
<div class="contenedor-unico">
  <!----------------------- NAVBAR ---------------------->

  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a href="../controllers/spaces_controller.php"><img src="../images/LOGO_250x250.png" height="70" width="70"></a>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li>
          <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="title">Mi unidad > <a style="text-decoration: none; " href="../controllers/filesOfSpaces_controller.php?space_name=<?= $space_name ?>&space_id=<?= $space_id ?>"><?= $space_name ?></a></h1>
          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="../controllers/spaces_controller.php">Mi unidad</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user" aria-hidden="true"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <button class="dropdown-item" disabled type="button"><?= $_SESSION['name'] ?></button>
              <a class="dropdown-item" type="button" href="../controllers/profile_controller.php">Administrar perfil</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" type="button" href="../controllers/logout_controller.php">Cerrar sesión</a>
            </div>
          </li>
        </ul>
      </form>
    </div>
  </nav>
  <!------------------------------- BODY ------------------------------>
  <form class="upload-form" action="../controllers/uploadFilesFinal_controller.php?space_id=<?= $space_id ?>&space_name=<?= $space_name ?>" method="post" enctype="multipart/form-data">

    <h1>Subir archivos</h1>

    <label for="files"><i class="fa-solid fa-folder-open fa-8x"></i>Selecciona los archivos que quieres subir...</label>
    <input id="files" type="file" name="files[]" multiple>

    <div class="progress"></div>

    <button type="submit">Subir</button>

    <div class="result"></div>

  </form>
  <!------------------------------------------------------------------->
  <script>
    // Declare global variables for easy access 
    const uploadForm = document.querySelector('.upload-form');
    const filesInput = uploadForm.querySelector('#files');
    // Attach onchange event handler to the files input element
    filesInput.onchange = () => {
      // Append all the file names to the label
      uploadForm.querySelector('label').innerHTML = '';
      for (let i = 0; i < filesInput.files.length; i++) {
        uploadForm.querySelector('label').innerHTML += '<span><i class="fa-solid fa-file"></i>' + filesInput.files[i].name + '</span>';
      }
    };
    // Attach submit event handler to form
    uploadForm.onsubmit = event => {
      event.preventDefault();
      // Make sure files are selected
      if (!filesInput.files.length) {
        uploadForm.querySelector('.result').innerHTML = 'Selecciona al menos un archivo';
      } else {
        // Create the form object
        let uploadFormDate = new FormData(uploadForm);
        // Initiate the AJAX request
        let request = new XMLHttpRequest();
        // Ensure the request method is POST
        request.open('POST', uploadForm.action);
        // Attach the progress event handler to the AJAX request
        request.upload.addEventListener('progress', event => {
          // Add the current progress to the button
          uploadForm.querySelector('button').innerHTML = 'Subiendo... ' + '(' + ((event.loaded / event.total) * 100).toFixed(2) + '%)';
          // Update the progress bar
          uploadForm.querySelector('.progress').style.background = 'linear-gradient(to right, #25b350, #25b350 ' + Math.round((event.loaded / event.total) * 100) + '%, #e6e8ec ' + Math.round((event.loaded / event.total) * 100) + '%)';
          // Disable the submit button
          uploadForm.querySelector('button').disabled = true;
        });
        // The following code will execute when the request is complete
        request.onreadystatechange = () => {
          if (request.readyState == 4 && request.status == 200) {
            // Output the response message
            uploadForm.querySelector('.result').innerHTML = request.responseText;
          }
        };
        // Execute request
        request.send(uploadFormDate);
      }
    };
  </script>
</div>
</body>

</html>