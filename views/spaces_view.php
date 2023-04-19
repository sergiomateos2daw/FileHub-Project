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
  <title>Mi unidad - FileHub</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css'>
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
  <!-- FAVICON PARA DIFERENTES DISPOSITIVOS -->
  <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
  <link rel="manifest" href="images/favicon/site.webmanifest">
  <link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#2d89ef">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="./styles/spaces_styles.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <!------------------------------------------>
</head>
<script>
  $(document).ready(function() {
    $("#news-slider").owlCarousel({
      items: 5,
      itemsDesktop: [1199, 5],
      itemsDesktopSmall: [980, 2],
      itemsMobile: [600, 1],
      navigation: true,
      navigationText: ["", ""],
      pagination: true,
      autoPlay: false
    });
  });
</script>

<body>
  <!----------------------- NAVBAR ---------------------->
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a href="./controllers/spaces_controller.php"><img src="./images/LOGO_250x250.png" height="70" width="70"></a>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li>
          <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="title">Mi unidad</h1>
          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <?php
          if ($contador_espacios >= 8) {
            echo '<li> <!-- ESTE BOTON MUESTRA EL ESPACIO DISPONIBLE -->
            <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <button class="btn btn-primary position-relative title" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Espacios usados <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                  <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                </svg>
                <span class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger">
                  !
                  <span class="visually-hidden">unread messages</span>
                </span>
              </button>
            </div>
          </li>';
          } else {
            echo '<li> <!-- ESTE BOTON MUESTRA EL ESPACIO DISPONIBLE -->
            <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <button class="btn btn-primary title" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Espacios usados <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                  <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                </svg></button>
            </div>
          </li>';
          }
        ?>
          
          <li class="nav-item">
            <a class="nav-link" href="./index.php">Mi unidad</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user" aria-hidden="true"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <button class="dropdown-item" disabled type="button"><?= $_SESSION['name'] ?></button>
              <a class="dropdown-item" type="button" href="./controllers/profile_controller.php">Administrar perfil</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" type="button" href="./controllers/logout_controller.php">Cerrar sesión</a>
            </div>
          </li>
        </ul>
      </form>
    </div>
  </nav>
  <!---------------------------- LIMITED SPACE BAR ------------------------>
  <div class="offcanvas offcanvas-bottom" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header title">
      <h5 class="offcanvas-title" id="offcanvasBottomLabel">Espacios usados</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body small">
      <div class="progress">
        <?php
        if ($porcentaje_usado >= 80) {
          echo '<div class="progress-bar bg-danger" role="progressbar" style="width: ' . $porcentaje_usado . '%;" aria-valuenow="' . $porcentaje_usado . '" aria-valuemin="0" aria-valuemax="100"><b>' . $porcentaje_usado . '%</b></div>';
        } elseif ($porcentaje_usado >= 50) {
          echo '<div class="progress-bar bg-warning text-dark" role="progressbar" style="width: ' . $porcentaje_usado . '%;" aria-valuenow="' . $porcentaje_usado . '" aria-valuemin="0" aria-valuemax="100"><b>' . $porcentaje_usado . '%</b></div>';
        } else {
          echo '<div class="progress-bar " role="progressbar" style="width: ' . $porcentaje_usado . '%;" aria-valuenow="' . $porcentaje_usado . '" aria-valuemin="0" aria-valuemax="100"><b>' . $porcentaje_usado . '%</b></div>';
        }
        ?>

      </div>
      <br>
      <p class="title">Has usado <?php echo $contador_espacios ?> de 8 espacios</p>
    </div>
  </div>
  <!------------------------------- ESPACIOS ------------------------------>
  <link rel="stylesheet" href="./styles/spaces_styles.css">
  <div class="container-fluid">
    <div class="row-flex">
      <div class="col-md-12">
        <div id="news-slider" class="owl-carousel">
          <?php
          foreach ($datos as $dato) {
            echo '<div class="post-slide">
                      <div class="post-img">
                          <img src="./images/folder.png" alt="">
                          <a href="controllers/filesOfSpaces_controller.php?space_name=' . $dato["name"] . '&space_id=' . $dato["id"] . '" class="over-layer"><i class="fa fa-sign-in"></i></a>
                      </div>
                      <div class="post-content">
                          <h3 class="post-title">
                              <div class="labelContainer"><a href="controllers/filesOfSpaces_controller.php?space_name=' . $dato["name"] . '&space_id=' . $dato["id"] . '">' . $dato["name"] . '</a></div>
                          </h3>
                          <p class="post-description">' . $dato["description"] . '</p>
                          <span class="post-date"><i class="fa fa-file-o"></i>' . $dato["num_files"] . '</span>
                          <button type="button" class="btn btn-danger read-more" data-toggle="modal" data-target="#exampleModalCenter'.$dato["id"].'">
                            Eliminar
                          </button>
                          
                      </div>
                  </div>';
            // generarModalEliminar($dato["id"], $_SESSION['user_id'], $dato["name"]);
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <?php
  if ($contador_espacios >= 8) {
    echo '<button type="button" class="btn btn-flotante" disabled data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Nuevo espacio</button>';
  } else {
    echo '<button type="button" class="btn btn-flotante" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Nuevo espacio</button>';
  }
  ?>
  <!-------------------------- BOTON NUEVO ESPACIO --------------------------->
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
              <input type="text" class="form-control" name="user_id" id="user_id" value="<?= $_SESSION['user_id'] ?>" required style="display: none;">
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
  <?php
    foreach ($datos as $dato) {
    generarModalEliminar($dato["id"], $_SESSION['user_id'], $dato["name"]);
    }
  ?>
  <!---------------------------- CONFIRMACION DE BORRADO ------------------------------>
  <!-- Modal
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Eliminar espacio</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <b>
            <h5>¿Realmente deseas eliminar este espacio?</h5>
          </b>
          Una vez eliminado no podrás recuperar ninguno de los archivos que contenga.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <a href="./controllers/removeSpace_controller.php?space_id=$space_id&user_id=$user_id" type="button" class="btn btn-danger">Eliminar espacio</a>
        </div>
      </div>
    </div>
  </div> -->
  <!----------------------------------------------------------------------------------->
  <script src='https://code.jquery.com/jquery-1.12.0.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js'></script>
</body>

</html>