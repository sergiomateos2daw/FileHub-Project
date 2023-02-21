<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Inicio - FileHub</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- FAVICON PARA DIFERENTES DISPOSITIVOS -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
    <link rel="manifest" href="images/favicon/site.webmanifest">
    <link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="views/styles/spaces_style.css">
    <!------------------------------------------>
</head>

<body>
    
<div class="container-fluid">
  <div class="px-lg-5">
        
    <!-- For demo purpose -->
    <div class="banner">
      <div class="col-lg-12 mx-auto">
        <div class=" p-5 shadow-sm rounded banner">
          <h1 class="display-4">Bootstrap 4 photo gallery</h1>
          <p class="lead">Bootstrap photogallery snippet.</p>
          <p class="lead">Snippet by <a href="https://bootstrapious.com/snippets" class="text-reset"> 
                        Bootstrapious</a>, Images by <a href="https://unsplash.com" class="text-reset">Unsplash</a>.
          </p>
        </div>
      </div>
    </div>
    <!-- End -->
    <br>
    <div class="row">
        <?php
            foreach ($datos as $dato) {
                echo '<div class="col">
                    <div class="bg-white rounded shadow-sm"><img src="images/folder.png" alt="" class="img-fluid card-img-top">
                    <div class="p-4">
                        <h5> <a href="#" class="text-dark">'.$dato["name"].'</a></h5>
                        <p class="small text-muted mb-0">'.$dato["description"].'</p>
                        <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                        <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">'.$dato["id"].'</span></p>
                        <div class="badge badge-danger px-3 rounded-pill font-weight-normal">'.$dato["num_files"].'</div>
                        </div>
                    </div>
                    </div>
                </div>';
            }
        ?>

    </div>
    <div class="py-5 text-right"><a href="#" class="btn btn-dark px-5 py-3 text-uppercase">Show me more</a></div>
  </div>
</div>

</body>

</html>