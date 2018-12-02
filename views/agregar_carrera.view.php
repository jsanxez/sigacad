<?php
session_start();

if (!isset($_SESSION["usuario"]))
    header("Location: ../index.php");
/*------------------------*/
require "sidebar.view.php";
require "header.view.php";
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Añadir:</h3>
            </div>

        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Datos carrera</h2>

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


                        <form action="../controllers/add_carrera_controller.php" method="post" class="form-horizontal form-label-left" novalidate>

                            <?php
                            if (!empty($_GET["info"])) {

                                if ($_GET["info"] == '-1'){
                                    echo "<label class='col-md-6 col-sm-6 col-xs-12'><span style='color: red;'>";
                                    echo "Ingrese los datos correctamente!";
                                    echo "</span></label><br><br>";

                                }elseif ($_GET["info"] == 'nada'){
                                    echo "<label class='col-md-6 col-sm-6 col-xs-12'><span style='color: red;'>";
                                    echo "Dato repetido!";
                                    echo "</span></label><br><br>";
                                }elseif ($_GET["info"] == '1'){
                                    echo "<label class='col-md-6 col-sm-6 col-xs-12'><span style='color: green;'>";
                                    echo "Datos ingresados correctamente...";
                                    echo "</span></label><br><br>";
                                }

                            }

                            ?>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Código modular <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="number" name="codigo_mod" required="required"
                                           data-validate-minmax="1000000,9999999" class="form-control col-md-7 col-xs-12" value="1284486">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Código <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12"
                                           name="codigo" placeholder="Código de la carrera" required="required" type="text">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="nombre"
                                           placeholder="Nombre de la carrera" required="required" type="text">
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <input type="submit" name="cancelar" value="Cancelar" class="btn btn-danger">
                                    <input type="submit" name="enviar" value="Enviar" id="send" class="btn btn-success">
                                </div>
                            </div>

                        </form>
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



