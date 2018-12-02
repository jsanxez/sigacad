<?php
session_start();

if (!isset($_SESSION["usuario"]))
    header("Location: ../index.php");
    
require "../controllers/mod_curso_controller.php";
/*------------------------*/
require "sidebar.view.php";
require "header.view.php";
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
                        <h2>Datos curso</h2>

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

                        <form action="../views/editar_curso.view.php" method="post"
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
                                    elseif ($filas == 0){
                                        echo "<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>";
                                        echo "<span style='color: red;' class='col-md-6 col-sm-4 col-xs-12'>Datos no encontrados...</span><br>";
                                    }
                                }

                                //ELIMINAR DE LA TABLA
                                if (isset($_POST["eliminar_select"])) {

                                    if (isset($_POST["select"])){

                                        $codigo = $_POST["select"];
                                        $afectados = Curso::delete_by_cod($codigo);

                                        echo "<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>";
                                        echo "<span style='color: green;' class='col-md-6 col-sm-4 col-xs-12'>Eliminado satisfactoriamente.</span><br>";

                                    }else{
                                        echo "<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>";
                                        echo "<span style='color: red;' class='col-md-6 col-sm-4 col-xs-12'>Seleccione la fila a eliminar.</span><br>";
                                    }
                                }
                                //ELIMINAR DEL FORMULARIO:
                                if (isset($_POST["eliminar"])) {

                                    $galleta = $_COOKIE["galleta_codigo"];

                                    $afectados = Curso::delete_by_cod($galleta);

                                    if ($afectados == 1){
                                        echo "<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>";
                                        echo "<span style='color: green;' class='col-md-6 col-sm-4 col-xs-12'>Eliminado satisfactoriamente.</span><br>";
                                    }
                                    else{
                                        echo "<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>";
                                        echo "<span style='color: red;' class='col-md-6 col-sm-4 col-xs-12'>Error al eliminar.</span><br>";

                                    }
                                }


                                if (isset($_POST["modificar"])) {

                                    //$filas siempre será 1 dado que la consulta se realiza por codigo:
                                    if ($filas == 1){
                                        inicializar_variables($resultado);
                                    }else{
                                        echo "<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>";
                                        echo "<span style='color: #F5963F;' class='col-md-6 col-sm-4 col-xs-12'>Seleccione la fila a modificar.</span><br>";
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ciclo <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="number" name="ciclo" required="required"
                                           data-validate-minmax="1,6" class="form-control col-md-7 col-xs-12"
                                    value="<?php if ($filas == 1) echo $ciclo; ?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Código <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12"
                                           name="codigo" placeholder="Código del curso" required="required" type="text"
                                    value="<?php if ($filas == 1) echo $codigo; ?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="nombre"
                                           placeholder="Nombre del curso" required="required" type="text"
                                    value="<?php if ($filas == 1) echo utf8_encode($nombre); ?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Créditos <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="number" name="creditos" required="required"
                                           data-validate-minmax="1,5" class="form-control col-md-7 col-xs-12"
                                    value="<?php if ($filas == 1) echo $creditos; ?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Unidades <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="number" name="unidades" required="required"
                                           data-validate-minmax="1,14" class="form-control col-md-7 col-xs-12"
                                    value="<?php if ($filas == 1) echo $unidades; ?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Horas sem. <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="number" name="horas" required="required"
                                           data-validate-minmax="1,6" class="form-control col-md-7 col-xs-12"
                                        value="<?php if ($filas == 1) echo $horas; ?>">
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


