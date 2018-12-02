<?php
session_start();
if (isset($_SESSION["usuario"]))
    header("Location: views/dashboard.view.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sigacad</title>

    <!-- Bootstrap -->
    <link href="views/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="views/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="views/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="views/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="views/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">

                <form action="controllers/login_controller.php" method="post">
                    <h1>Iniciar Sesión</h1>

                    <input type="text" class="form-control" placeholder="Usuario" name="usuario">
                    <input type="password" class="form-control" placeholder="Contraseña" name="password">

                    <?php
                    if (!empty($_GET["info"])){

                        if ($_GET["info"] == 'noth')
                            echo "<span style='color: red;'>Usuario o contraseña incorrectos</span><br><br>";
                        elseif ($_GET["info"] == '-1')
                            echo "<span style='color: red;'>Usted no está registrado</span><br><br>";
                        elseif ($_GET["info"] == 'empty')
                            echo "<span style='color: red;'>Campos vacíos</span><br><br>";
                    }
                    ?>

                    <div>
                        <input type="submit" name="login" value="Ingresar" class="btn btn-default submit">
                        <a class="reset_pass" href="#">Olvidó su contraseña?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Nuevo en el sitio?
                            <a href="views/registrar.php" class="to_register"> Crear Cuenta </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-university"></i> Sigacad</h1>
                            <p>©2018 All Rights Reserved. Sigacad is a Bootstrap 3 template. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>
