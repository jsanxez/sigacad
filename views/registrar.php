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
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div>

    <div class="login_wrapper">
            <section class="login_content">

                <form action="../controllers/register_controller.php" method="post">
                    <h1>Crear cuenta</h1>
                    <div>
                        <input type="text" name="dni" class="form-control" placeholder="DNI">
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Contraseña">
                    </div>
                    <div>
                        <input type="password" name="password2" class="form-control" placeholder="Repetir contraseña">
                    </div>


                    <?php

                    if (!empty($_GET["info"])){

                        if ($_GET["info"] == '1')
                            echo "<span style='color: green;'>Registrado exitosamente</span><br><br>";
                        elseif ($_GET["info"] == 'noth')
                            echo "<span style='color: red;'>Las contraseñas no coinciden</span><br><br>";
                        elseif ($_GET["info"] == '-1')
                            echo "<span style='color: red;'>Datos inválidos</span><br><br>";
                        elseif ($_GET["info"] == 'empty')
                            echo "<span style='color: red;'>Campos vacíos</span><br><br>";
                        elseif ($_GET["info"] == 'exist')
                            echo "<span style='color: red;'>Usted ya esta registrado</span><br><br>";
                        elseif ($_GET["info"] == 'non')
                            echo "<span style='color: red;'>Usuario no existente</span><br><br>";
                    }

                    ?>

                        <input type="submit" name="registrar" value="Registrar" class="btn btn-default submit">


                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Ya tiene una cuenta?
                            <a href="../index.php" class="to_register"> Ingresar </a>
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
</body>
</html>
