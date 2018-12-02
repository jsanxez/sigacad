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
                            <h2>Datos estudiante</h2>

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


                            <form action="../controllers/add_estudiante_controller.php" method="post" class="form-horizontal form-label-left" novalidate>

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
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Carrera <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="carrera" id="">
                                            <option value="CC1">Construcción civil</option>
                                            <option value="GA1">Gastronomía</option>
                                            <option value="AM1">Contrucción de arte en madera</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Primer nombre<span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name" class="form-control col-md-7 col-xs-12"
                                               data-validate-length-range="3" data-validate-words="1" name="p_nombre"
                                               placeholder="Ingrese nombre" required="required" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Segundo nombre &nbsp;<span
                                                class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name" class="form-control col-md-7 col-xs-12"
                                               data-validate-length-range="5" data-validate-words="1" name="s_nombre"
                                               placeholder="Ingrese nombre(s)" type="text">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Paterno <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name" class="form-control col-md-7 col-xs-12"
                                               data-validate-length-range="3" data-validate-words="1" name="apellido_p"
                                               placeholder="..." required="required" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Materno <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name" class="form-control col-md-7 col-xs-12"
                                               data-validate-length-range="3" data-validate-words="1" name="apellido_m"
                                               placeholder="..." required="required" type="text">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">DNI <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" id="number" name="dni" required="required"
                                               data-validate-minmax="10000000,99999999" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha nacimiento
                                        <span class="required">*</span>
                                    </label>
                                    <div class='col-sm-4'>
                                        DD.MM.YYYY
                                        <div class="form-group">
                                            <div class='input-group date' id='myDatepicker2'>
                                                <input type='text' class="form-control" name="fecha_nac">
                                                <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Teléfono
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" id="number" name="telefono" required="required"
                                               data-validate-minmax="100000,999999999"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Correo &nbsp;
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" id="email" name="correo" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Dirección &nbsp;
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="name" name="direccion" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Observación &nbsp;
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea name="obs" placeholder="opcional..."
                                                  class="form-control col-md-7 col-xs-12"></textarea>
                                    </div>
                                </div>
<!--                                Agregando-->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Discapacidad *</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div id="discapacidad" class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="discapacidad" value="SI">&ensp;Si&ensp;
                                            </label>
                                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="discapacidad" value="NO">&ensp;No
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Género *</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div id="gender" class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="genero" value="M">&ensp;M&ensp;
                                            </label>
                                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="genero" value="F">&ensp;F&ensp;
                                            </label>
                                        </div>
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

<!-- bootstrap-daterangepicker -->
<script src="vendors/moment/min/moment.min.js"></script>
<!--<script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>-->
<!-- bootstrap-datetimepicker -->
<script src="vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

<!-- Initialize datetimepicker -->
<script>
    // $('#myDatepicker').datetimepicker();

    $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
    });

</script>


