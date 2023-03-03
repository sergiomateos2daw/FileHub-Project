<?php
  if(!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Inicio - FileHub</title>
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
    <link rel="stylesheet" href="../styles/spaces_styles.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a522cdd2e0.js" crossorigin="anonymous"></script>

    <!------------------------------------------>
</head>

<body>

    <!----------------------- NAVBAR ---------------------->

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <img src="../images/LOGO_250x250.png" height="70" width="70">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li>
                    <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h1 class="title"> <a style="text-decoration: none; color: black" href="../controllers/spaces_controller.php">Mi unidad</a> > <?= $space_name ?></h1>
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
                            <button class="dropdown-item" disabled type="button"><?=$_SESSION['name']?></button>
                            <a class="dropdown-item" type="button">Modificar perfil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" type="button" href="../controllers/logout_controller.php">Cerrar sesión</a>
                        </div>
                    </li>
                </ul>
            </form>
        </div>
    </nav>
    <!------------------------------- ESPACIOS ------------------------------>
    
    <div class="container-fluid">
  <div class="px-lg-5">

    <!--------------------- CABECERA --------------------->
    <div class="row py-5">
      <div class="col-lg-12 mx-auto rounded bg-light">
        <h1 class="display-4"><?= $space_name ?></h1>
        <p class="lead">Fecha de creación: </p>
      </div>
    </div>
    <!---------------------------------------------------->
    <div class="row">
    <?php
      mostarFichero($user_id,$space_id)
    ?>
    </div>
  </div>
</div>
    <!-------------------------- BOTON NUEVO ESPACIO --------------------------->
    <button type="button" class="btn btn-flotante" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Subir archivo</button>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Espacio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="./controllers/createSpace_controller.php">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre del espacio:</label>
            <input type="text" class="form-control" name="space_name" id="space_name" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Descripción:</label>
            <input type="text" class="form-control" name="user_id" id="user_id" value="<?=$_SESSION['user_id']?>" required style="display: none;">
            <input type="text" class="form-control" name="space_description" id="space_description" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary" type="submit">Crear espacio</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
    
    <!----------------------------------------------------------------------------------->
    <script src='https://code.jquery.com/jquery-1.12.0.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js'></script>
</body>

</html>