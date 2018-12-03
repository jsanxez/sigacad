<?php
session_start();

if (!isset($_SESSION["usuario"]))
    header("Location: ../index.php");

/*------------------------------------------*/
require "sidebar.view.php";
require "header.view.php";
/*------------------------------------------*/
require "../controllers/mod_estudiante_controller.php";
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Modificar:</h3>
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

                        <form action="../views/editar_estudiante.view.php" method="post"
                              class="form-horizontal form-label-left" novalidate>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                </label>
                                <div class="col-md-6 col-sm-4 col-xs-12">
                                    <input type="text" class="col-md-8 col-xs-8" name="busqueda"
                                           placeholder="Búsqueda..."
                                           style="background-color: #c7e4ed;border-style: none;border-radius: 5px; padding: 7px 10px;">
                                    <input type="submit" value="Buscar" name="buscar"
                                           class="col-md-3 col-xs-3 pull-right btn btn-info"
                                           style="margin-bottom: 1px">
                                </div>

                                <span>&ensp;</span><br>
                                <span>&ensp;</span><br>
                                <hr>

                                <?php

                                if (isset($_POST["buscar"])) {

                                    if ($filas > 1)
                                        mostrar_tabla();
                                    //se inicializan las variables para mostrarlas en cada entrada del formulario:
                                    elseif ($filas == 1)
                                        inicializar_variables($resultado);
                                    elseif ($filas == 0){
                                        echo "<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>";
                                        echo "<span style='color: red;' class='col-md-6 col-sm-4 col-xs-12'>Datos no encontrados...</span><br>";
                                    }
                                }


                                if (isset($_POST["modificar"])) {

                                    //$filas siempre será 1 dado que la consulta se realiza por dni:
                                    if ($filas == 1){
                                        inicializar_variables($resultado);
                                    }else{
                                        echo "<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>";
                                        echo "<span style='color: #F5963F;' class='col-md-6 col-sm-4 col-xs-12'>Seleccione la fila a modificar.</span><br>";
                                    }
                                }


                                //ELIMINAR DE LA TABLA
                                if (isset($_POST["eliminar_select"])) {

                                    if (isset($_POST["select"])){

                                        $dni = $_POST["select"];
                                        //eliminar datos de matriculas y estudiantes:
                                        $afectados_m = Matricula::delete_mtr($dni);
                                        $afectados = Estudiante::delete_by_dni($dni);

                                        if ($afectados == 1 && $afectados_m >= 1){
                                            echo "<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>";
                                            echo "<span style='color: green;' class='col-md-6 col-sm-4 col-xs-12'>Eliminado satisfactoriamente.</span><br>";
                                        }else {
                                            echo "<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>";
                                            echo "<span style='color: red;' class='col-md-6 col-sm-4 col-xs-12'>Error al eliminar</span><br>";
                                        }


                                    }else{
                                        echo "<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>";
                                        echo "<span style='color: red;' class='col-md-6 col-sm-4 col-xs-12'>Seleccione la fila a eliminar.</span><br>";
                                    }
                                }
                                //ELIMINAR DEL FORMULARIO:
                                if (isset($_POST["eliminar"])) {

                                    $dni = $_POST["dni"];

                                    //eliminar datos de matriculas y estudiantes:
                                    $afectados_m = Matricula::delete_mtr($dni);
                                    $afectados = Estudiante::delete_by_dni($dni);

                                    if ($afectados == 1 && $afectados_m >= 1){
                                        echo "<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>";
                                        echo "<span style='color: green;' class='col-md-6 col-sm-4 col-xs-12'>Eliminado satisfactoriamente.</span><br>";
                                    }
                                    else{
                                        echo "<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>";
                                        echo "<span style='color: red;' class='col-md-6 col-sm-4 col-xs-12'>Error al eliminar.</span><br>";

                                    }
                                }


                                if (isset($_POST["guardar"])){

                                    if ($afectados == 1){
                                        echo "<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>";
                                        echo "<span style='color: green;' class='col-md-6 col-sm-4 col-xs-12'>Datos actualizados correctamente.</span><br>";
                                    }else{
                                        echo "<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>";
                                        echo "<span style='color:#F5963F;' class='col-md-6 col-sm-4 col-xs-12'>Datos no actualizados.</span><br>";
                                    }
                                }



                                ?>

                                <hr>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Primer nombre<span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12"
                                           data-validate-length-range="3" data-validate-words="1" name="p_nombre"
                                           placeholder="Ingrese nombre" required="required" type="text"
                                           value="<?php if ($filas == 1) echo utf8_encode($p_nombre); ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Segundo nombre &nbsp;<span
                                            class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12"
                                           data-validate-length-range="5" data-validate-words="1" name="s_nombre"
                                           placeholder="Ingrese nombre(s)" type="text"
                                           value="<?php if ($filas == 1) echo utf8_encode($s_nombre); ?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Paterno <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12"
                                           data-validate-length-range="3" data-validate-words="1" name="apellido_p"
                                           placeholder="..." required="required" type="text"
                                           value="<?php if ($filas == 1) echo utf8_encode($apellido_p); ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Materno <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12"
                                           data-validate-length-range="3" data-validate-words="1" name="apellido_m"
                                           placeholder="..." required="required" type="text"
                                           value="<?php if ($filas == 1) echo utf8_encode($apellido_m); ?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">DNI <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="number" name="dni" required="required"
                                           data-validate-minmax="10000000,99999999"
                                           class="form-control col-md-7 col-xs-12"
                                           value="<?php if ($filas == 1) echo $dni; ?>">
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
                                            <input type='text' class="form-control" name="fecha_nac"
                                                   value="<?php if ($filas == 1) echo $fecha_nac; ?>">
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
                                           class="form-control col-md-7 col-xs-12"
                                           value="<?php if ($filas == 1) echo $telefono; ?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Correo &nbsp;
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="email" name="correo" required="required"
                                           class="form-control col-md-7 col-xs-12"
                                           value="<?php if ($filas == 1) echo $correo; ?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Dirección &nbsp;
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="name" name="direccion" class="form-control col-md-7 col-xs-12"
                                    value="<?php if ($filas == 1) echo utf8_encode($direccion); ?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Observación &nbsp;
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea name="obs" placeholder="opcional..."
                                                  class="form-control col-md-7 col-xs-12"><?php if ($filas == 1) echo $obs; ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Discapacidad *</label>
                                <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top: 7px;">
                                        <label>
                                            <input type="radio" name="discapacidad" value="SI" <?php if ($filas == 1 && $discapacidad=="SI") echo "checked"; ?>>&ensp;Si&ensp;
                                        </label>
                                        <label>
                                            <input type="radio" name="discapacidad" value="NO" <?php if ($filas == 1 && $discapacidad=="NO") echo "checked"; ?>>&ensp;No
                                        </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Género *</label>
                                <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top: 5px;">
                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                        <label>
                                            <input type="radio" name="genero" value="M" <?php if ($filas == 1 && $genero=="M") echo "checked"; ?>>&ensp;M&ensp;
                                        </label>
                                        <label>
                                            <input type="radio" name="genero" value="F" <?php if ($filas == 1 && $genero=="F") echo "checked"; ?>>&ensp;F&ensp;
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <?php
                            // mostrar botones cuando solo hay una fila afectada por la busqueda:
                            if ($filas == 1) {
                                mostrar_botones();
                            }

                            ?>
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


