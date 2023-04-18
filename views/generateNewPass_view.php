<?php
if (!isset($_SESSION['email_returned'])) {
  header("Location: ../index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Generar nueva contraseña - FileHub</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- FAVICON PARA DIFERENTES DISPOSITIVOS -->
    <link rel="apple-touch-icon" sizes="180x180" href="../images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon/favicon-16x16.png">
    <link rel="manifest" href="../images/favicon/site.webmanifest">
    <link rel="mask-icon" href="../images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#ffffff">
    <!------------------------------------------>
    <link rel="stylesheet" href="../styles/login_style.css">
</head>
<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-3 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div id="contenderFormulario" class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-12">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                    <a href="../index.php"><img src="../images/LOGO_250x250.png" style="width: 185px;" alt="logo"></a>
                                        <h4 class="mt-1 mb-5 pb-1">Genera una nueva contraseña</h4>
                                    </div>
                                    <form method="POST" action="../controllers/insertNewPass_controller.php">
                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example11" name="password" class="form-control" placeholder="Contraseña" required/>
                                            <label class="form-label" for="password">Contraseña</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example11" name="re_password" class="form-control" placeholder="Vuelve a introducir la contraseña" required/>
                                            <label class="form-label" for="re-password">Introducir contraseña de nuevo</label>
                                        </div>
                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Cambiar contraseña</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>