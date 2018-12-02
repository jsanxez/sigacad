<?php
session_start();

require "../models/Curso.php";
/*----------------------*/
require "sidebar.view.php";
require "header.view.php";
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Mostrar:</h3>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Cursos</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>

                            <tr>
                                <th>Ciclo</th>
                                <th>Código</th>
                                <th>Curso</th>
                                <th>Créditos</th>
                                <th>Unidades</th>
                                <th>Horas sem.</th>
                                <th>Carrera</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php

                            $query = "select c.ciclo as ciclo, c.codigo, c.nombre as curso, c.creditos,
                                      c.unidades, c.horas_sem, r.nombre as carrera from carreras r, cursos c 
                                      where r.codigo = 'CC01'";

                            $datos_todos = Curso::consulta($query);

                            foreach ($datos_todos as $columna) {

                                echo "<tr>";

                                echo "<td>" . $columna["ciclo"] . "</td>";
                                echo "<td>" . $columna["codigo"] . "</td>";
                                echo "<td>" . $columna["curso"] . "</td>";
                                echo "<td>" . $columna["creditos"] . "</td>";
                                echo "<td>" . $columna["unidades"] . "</td>";
                                echo "<td>" . $columna["horas_sem"] . "</td>";
                                echo "<td>" . $columna["carrera"] . "</td>";

                                echo "</tr>";
                            }
                            ?>

                            </tbody>
                        </table>
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

<!-- Datatables -->
<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="vendors/jszip/dist/jszip.min.js"></script>
<script src="vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="vendors/pdfmake/build/vfs_fonts.js"></script>
