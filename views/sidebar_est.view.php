<!DOCTYPE html>
<html lang="es">
<head>
    <!--    <meta http-equiv="Content-Type" content="text/html; charset-iso-8859-1">-->
    <meta charset="UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema Sigacad</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">

    <!---------------------------------------------------------------------------------------------------->
    <!-- bootstrap-datetimepicker -->
    <link href="vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!---------------------------------------------------------------------------------------------------->
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

</head>


<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="dashboard.view.php" class="site_title"><i class="fa fa-university"></i> <span>Sigacad</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="images/user.png" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Bienvenido,</span>
                        <h2><?php  echo $_SESSION["usuario"]; ?></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>Gestionar</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-home"></i>Analisis de datos<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="dashboard.view.php">Estadisticas1</a></li>
                                    <li><a href="index2.html">Estadisticas2</a></li>
                                    <li><a href="index3.html">Estadisticas3</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-edit"></i>Docentes<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="docentes.view.php">Todos los docentes</a></li>
                                    <li><a href="agregar_docente.view.php">Agregar docente</a></li>
                                    <li><a href="editar_docente.view.php">Editar docente</a></li>
                                    <li><a href="form_wizards.html">Perfil docente</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-desktop"></i>Estudiantes<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="estudiantes.view.php">Todos los estudiantes</a></li>
                                    <li><a href="agregar_estudiante.view.php">Agregar estudiante</a></li>
                                    <li><a href="editar_estudiante.view.php">Editar estudiante</a></li>
                                    <li><a href="icons.html">Perfil estudiante</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-table"></i>Cursos<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="cursos.view.php">Todos los cursos</a></li>
                                    <li><a href="agregar_curso.view.php">Agregar curso</a></li>
                                    <li><a href="editar_curso.view.php">Editar curso</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-bar-chart-o"></i>Carreras<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="carreras.view.php">Todas las carreras</a></li>
                                    <li><a href="agregar_carrera.view.php">Agregar carrera</a></li>
                                    <li><a href="editar_carrera.view.php">Editar carrera</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-clone"></i>Horarios<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="fixed_sidebar.html">Gestionar horario</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="menu_section">
                        <h3>Pagos y Reportes</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-bug"></i>Reportes curriculares<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="e_commerce.html">A</a></li>
                                    <li><a href="projects.html">B</a></li>
                                    <li><a href="project_detail.html">C</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-windows"></i>Reportes de egresados<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="page_403.html">A</a></li>
                                    <li><a href="page_404.html">B</a></li>
                                    <li><a href="page_500.html">C</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-sitemap"></i>Reportes estadísticos<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="#level1_1">2018</a>
                                    <li><a>Anteriores<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li class="sub_menu"><a href="level2.html">2017</a></li>
                                            <li><a href="#level2_1">2016</a></li>
                                            <li><a href="#level2_2">2015</a></li>
                                        </ul>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i>Encuestas<span class="label label-success pull-right">765</span></a></li>
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->

                <!-- /menu footer buttons -->

                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Configuraciones">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Bloquear">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Salir" href="../controllers/logout.php">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
