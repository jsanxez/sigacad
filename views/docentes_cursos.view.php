<?php
session_start();

if (!isset($_SESSION["usuario"]))
    header("Location: ../index.php");

/*------------------------------------------------*/
require "sidebar.view.php";
require "header.view.php";
/*------------------------------------------------*/
require "../controllers/asignar_curso_controller.php";
require "../controllers/utilidades.php";
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Gestionar</h3>
            </div>

        </div>
        <div class="clearfix"></div>

        <div class="row">

            <!-- form input mask -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Cursos:</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="col-md-6 col-sm-12 col-xs-12">

                            <form action="docentes_cursos.view.php" method="post">

                                <div class="item form-group">

                                    <label for="">Carrera:</label>
                                    <?php
                                    mostrar_opciones();
                                    ?>

                                    <label for="">&ensp;&ensp;Ciclo:</label>
                                    <select name="ciclo">
                                        <option value="1" <?= ((isset($_POST['ciclo']) && $_POST['ciclo']=="1")?"selected":"");?>>1</option>
                                        <option value="2" <?= ((isset($_POST['ciclo']) && $_POST['ciclo']=="2")?"selected":"");?>>2</option>
                                        <option value="3" <?= ((isset($_POST['ciclo']) && $_POST['ciclo']=="3")?"selected":"");?>>3</option>
                                        <option value="4" <?= ((isset($_POST['ciclo']) && $_POST['ciclo']=="4")?"selected":"");?>>4</option>
                                        <option value="5" <?= ((isset($_POST['ciclo']) && $_POST['ciclo']=="5")?"selected":"");?>>5</option>
                                        <option value="6" <?= ((isset($_POST['ciclo']) && $_POST['ciclo']=="6")?"selected":"");?>>6</option>
                                        <option value="7" <?= ((isset($_POST['ciclo']) && $_POST['ciclo']=="7")?"selected":"");?>>7</option>
                                    </select>

                                    &ensp;&ensp;&ensp;
                                    <input type='submit' name='filtrar' value='Filtrar' id='send'
                                           style="background-color:#76CDE7; border: none; border-radius: 3px">
                                </div>


                                <?php
                                if (isset($_POST["filtrar"]) || isset($_POST["asignar"])){

                                    echo "<label>Cursos:</label>";
                                    mostrar_cursos();

                                    mostrar_boton("asignar", "Asignar", "btn-info");
                                }
                                ?>
                            </form>
                        </div>

                        <div class="col-md-6 col-sm-12 col-xs-12">

                            <form action="docentes_cursos.view.php" method="post">

                                <div class="item form-group">

                                    <label for="">.</label>
                                </div>

                            <?php
                            if (isset($_POST["asignar"])){

                                if (isset($_POST["select"])){

                                    echo "<label>Docente(s) asignado(s):</label>";

                                    $datos_docente = get_datos_docente();

                                    //si existen datos en la tabla
                                    if ($datos_docente[count($datos_docente)-1] >= 1) {

                                        mostrar_docentes();

                                        echo "<label>Cursos a cargo del docente:</label>";
                                        if ($datos_docente[count($datos_docente)-1] == 1)
                                            mostrar_docente_cursos($datos_docente[0]);
                                        else
                                            mostrar_docente_cursos($datos_docente[0], $datos_docente[5]);

                                        //mostrandos 2 botones:
                                        echo "<div class='form-group'>";
                                        echo "<div class='col-md-12' style='text-align: center'>";
                                        echo "<input type='submit' name='eliminar' value='Eliminar' id='send' class='btn btn-danger'>";
                                        echo "<input type='submit' name='agregar' value='Agregar' id='send' class='btn btn-success'>";
                                        echo "</div>";
                                        echo "</div>";

                                    }else{


                                        mostrar_boton("agregar", "Agregar", "btn-success");
                                    }

                                }else{
                                    echo "<label style='color: #F5963F;'>Seleccione el curso antes de continuar...</label><br>";
                                }

                            }
                            ?>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->


<?php

require "footer.view.php";

?>
<!-- validator -->
<script src="vendors/validator/validator.js"></script>


