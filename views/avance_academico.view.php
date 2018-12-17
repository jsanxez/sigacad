<?php
session_start();
if (!isset($_SESSION["usuario"]))
    header("Location: ../index.php");

/*---------------------------------*/
require "sidebar.view.php";
require "header.view.php";
/*---------------------------------*/
require "../models/Curso.php";
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

                        <?php
                        $query = "select distinct r.nombre as carrera
                                  from estudiantes e join matriculas m join cursos c join carreras_cursos cc join carreras r
                                  on (e.dni=m.dni_estudiante and m.cod_curso=c.codigo and c.codigo=cc.codigo_curso and cc.codigo_carrera=r.codigo)
                                  where e.dni='$usuario'";
                        $nombre_carrera = Login::consulta($query);

                        foreach ($nombre_carrera as $columna)
                            echo "<h4 style='text-align: center'>" . utf8_encode($columna["carrera"]) . "</h4><br>";

                        echo "<div class='col-md-6 col-sm-12 col-xs-12'>";
                        echo "<label>DNI: " .$usuario."</label><br>";
                        echo "<label>ESTUDIANTE: " . $nombre ."</label>";
                        echo "</div>";

                        echo "<div class='col-md-6 col-sm-12 col-xs-12' style='text-align: right'>";
                        echo "<label>FECHA: " . date("d")."-".date("m")."-".date("Y")."</label><br>";
                        echo "<label>SEMESTRE: 2018-II</label>";
                        echo "</div>";
                        ?>


                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>

                            <tr style="background-color: #e8eff4">
                                <th rowspan="2">Código</th>
                                <th rowspan="2">Curso</th>
                                <th rowspan="2">Docente</th>
                                <th colspan="4">Unidad 1</th>
                                <th colspan="4">Unidad 2</th>
                                <th colspan="4">Unidad 3</th>
                                <th colspan="4">Unidad 4</th>
                            </tr>
                            <tr style="background-color: #e8eff4">
                                <th>CC</th>
                                <th>CP</th>
                                <th>CA</th>
                                <th>P</th>
                                <th>CC</th>
                                <th>CP</th>
                                <th>CA</th>
                                <th>P</th>
                                <th>CC</th>
                                <th>CP</th>
                                <th>CA</th>
                                <th>P</th>
                                <th>CC</th>
                                <th>CP</th>
                                <th>CA</th>
                                <th>P</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php

                            $query = "select c.codigo, c.nombre as curso, c.creditos, d.p_nombre, d.apellido_p, d.apellido_m, c.creditos,
                                   max(case when unidad=1 then cc end) unidad11,
                                   max(case when unidad=1 then cp end) unidad12,
                                   max(case when unidad=1 then ca end) unidad13,
                                   max(case when unidad=1 then promedio end) promedio1,
                                   max(case when unidad=2 then cc end) unidad21,
                                   max(case when unidad=2 then cp end) unidad22,
                                   max(case when unidad=2 then ca end) unidad23,
                                   max(case when unidad=2 then promedio end) promedio2,
                                   max(case when unidad=3 then cc end) unidad31,
                                   max(case when unidad=3 then cp end) unidad32,
                                   max(case when unidad=3 then ca end) unidad33,
                                   max(case when unidad=3 then promedio end) promedio3,
                                   max(case when unidad=4 then cc end) unidad41,
                                   max(case when unidad=4 then cp end) unidad42,
                                   max(case when unidad=4 then ca end) unidad43,
                                   max(case when unidad=4 then promedio end) promedio4
                                    from estudiantes e join matriculas m join cursos c join notas n join docentes d join docentes_cursos dc
                                    on (e.dni = m.dni_estudiante and m.cod_curso = c.codigo and m.dni_estudiante = n.dni_estudiante and
                                        m.cod_curso = n.codigo_curso and d.dni = dc.dni_docente and dc.codigo_curso = c.codigo)
                                    where e.dni = '$usuario'
                                    group by n.codigo_curso";

                            $datos_todos = Curso::consulta($query);

                            $creditos_tot = 0;
                            foreach ($datos_todos as $columna) {

                                echo "<tr>";
                                echo "<td>" . $columna["codigo"] . "</td>";
                                echo "<td>" . utf8_encode($columna["curso"]) . "</td>";
                                echo "<td>" . utf8_encode($columna["p_nombre"])." ".utf8_encode($columna["apellido_p"])." ".utf8_encode($columna["apellido_m"])."</td>";
                                echo "<td>" . $columna["unidad11"] . "</td>";
                                echo "<td>" . $columna["unidad12"] . "</td>";
                                echo "<td>" . $columna["unidad13"] . "</td>";
                                echo "<td style='background-color:#edf5f7'>" . $columna["promedio1"] . "</td>";
                                echo "<td>" . $columna["unidad21"] . "</td>";
                                echo "<td>" . $columna["unidad22"] . "</td>";
                                echo "<td>" . $columna["unidad23"] . "</td>";
                                echo "<td style='background-color:#edf5f7'>" . $columna["promedio2"] . "</td>";
                                echo "<td>" . $columna["unidad31"] . "</td>";
                                echo "<td>" . $columna["unidad32"] . "</td>";
                                echo "<td>" . $columna["unidad33"] . "</td>";
                                echo "<td style='background-color:#edf5f7'>" . $columna["promedio3"] . "</td>";
                                echo "<td>" . $columna["unidad41"] . "</td>";
                                echo "<td>" . $columna["unidad42"] . "</td>";
                                echo "<td>" . $columna["unidad43"] . "</td>";
                                echo "<td style='background-color:#edf5f7'>" . $columna["promedio4"] . "</td>";

                                echo "</tr>";

                                $creditos_tot += $columna["creditos"];
                            }
                            ?>

                            </tbody>
                        </table>
                        <hr>
                        <?php
                        echo "<label>Créditos matriculados: $creditos_tot</label><br>";

                        ?>
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

