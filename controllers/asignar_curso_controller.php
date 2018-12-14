<?php
/**
 * Created by PhpStorm.
 * User: jsanchez
 * Date: 7/12/18
 * Time: 17:05
 */

require "../models/Curso.php";

function mostrar_cursos (){

    $carrera = $_POST["carrera"];
    $ciclo = $_POST["ciclo"];

    echo "<table id='datatable-buttons' class='table table-striped table-bordered'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th colspan='2'>Código</th>";
    echo "<th>Curso</th>";
    echo "<th>Créditos</th>";
    echo "<th>Ciclo</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    $query = "select c.codigo, c.nombre as curso, c.creditos, c.ciclo
                                      from cursos c join carreras_cursos cc join carreras r
                                      on (c.codigo=cc.codigo_curso and cc.codigo_carrera=r.codigo) 
                                      where r.codigo='$carrera' and c.ciclo=$ciclo";

    $resultado = Curso::consulta($query);

    foreach ($resultado as $columna) {

        echo "<tr>";

        if (isset($_POST["select"]) && $_POST["select"] == $columna["codigo"])
            echo "<td>" . "<input type='radio' name='select' value='" . $columna["codigo"] . "' checked></td>";
        else
            echo "<td>" . "<input type='radio' name='select' value='" . $columna["codigo"] . "'></td>";

        echo "<td>" . $columna["codigo"] . "</td>";
        echo "<td>" . utf8_encode($columna["curso"]) . "</td>";
        echo "<td>" . $columna["creditos"] . "</td>";
        echo "<td>" . $columna["ciclo"] . "</td>";

        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
}


function mostrar_docentes (){
    $carrera = $_POST["carrera"];
    $codigo = $_POST["select"];


    echo "<table id='datatable-buttons' class='table table-striped table-bordered'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th colspan='2'>DNI</th>";
    echo "<th>Nombre</th>";
    echo "<th colspan='2'>Docente</th>";
    echo "<th>Título</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    $query = "select d.dni, d.p_nombre, d.apellido_p, d.apellido_m, d.titulo_prof
                  from carreras r join carreras_cursos cc join cursos c join docentes d join docentes_cursos dc
                  on (r.codigo=cc.codigo_carrera and cc.codigo_curso=c.codigo and d.dni=dc.dni_docente and dc.codigo_curso=c.codigo)
                  where r.codigo='$carrera' and c.codigo='$codigo'";

    $resultado = Curso::consulta($query);

    foreach ($resultado as $columna) {

        echo "<tr>";

        echo "<td>" . "<input type='radio' name='select' value='" . $columna["dni"] . "'></td>";
        echo "<td>" . $columna["dni"] . "</td>";
        echo "<td>" . utf8_encode($columna["p_nombre"]) . "</td>";
        echo "<td>" . utf8_encode($columna["apellido_p"]) . "</td>";
        echo "<td>" . utf8_encode($columna["apellido_m"]) . "</td>";
        echo "<td>" . utf8_encode($columna["titulo_prof"]) . "</td>";

        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";

}
//devuelve todos los valores de la tabla en una matriz para usarlos despues:
function get_datos_docente (){
    $carrera = $_POST["carrera"];
    $codigo = $_POST["select"];

    $query = "select d.dni, d.p_nombre, d.apellido_p, d.apellido_m, d.titulo_prof
                  from carreras r join carreras_cursos cc join cursos c join docentes d join docentes_cursos dc
                  on (r.codigo=cc.codigo_carrera and cc.codigo_curso=c.codigo and d.dni=dc.dni_docente and dc.codigo_curso=c.codigo)
                  where r.codigo='$carrera' and c.codigo='$codigo'";
    $resultado = Curso::consulta($query);

    $matrix = [];
    $i=0;
    foreach ($resultado as $columna) {

        $matrix[$i] = $columna["dni"];
        $matrix[$i+=1]= $columna["p_nombre"];
        $matrix[$i+=1]= $columna["apellido_p"];
        $matrix[$i+=1]= $columna["apellido_m"];
        $matrix[$i+=1]= $columna["titulo_prof"];

        $i++;
    }
    $matrix[$i] = $resultado->num_rows;

    return $matrix;
}

function mostrar_docente_cursos ($dni_docente1, $dni_docente2=""){

    $cod_curso = $_POST["select"];

    echo "<table id='datatable-buttons' class='table table-striped table-bordered'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th colspan='2'>Carrera</th>";
    echo "<th>Curso</th>";
    echo "<th>Ciclo</th>";
    echo "<th colspan='2'>Docente</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    if (!$dni_docente2=="")
        $query = "select r.nombre as carrera, c.codigo, c.nombre as curso, c.ciclo, d.p_nombre, d.apellido_p
              from carreras r join carreras_cursos cc join cursos c join docentes d join docentes_cursos dc
              on (r.codigo=cc.codigo_carrera and cc.codigo_curso=c.codigo and d.dni=dc.dni_docente and dc.codigo_curso=c.codigo)
              where d.dni='$dni_docente1' and c.codigo not like ('$cod_curso') or d.dni='$dni_docente2' and c.codigo not like ('$cod_curso')";
    else
        $query = "select r.nombre as carrera, c.codigo, c.nombre as curso, c.ciclo, d.p_nombre, d.apellido_p
              from carreras r join carreras_cursos cc join cursos c join docentes d join docentes_cursos dc
              on (r.codigo=cc.codigo_carrera and cc.codigo_curso=c.codigo and d.dni=dc.dni_docente and dc.codigo_curso=c.codigo)
              where d.dni='$dni_docente1' and c.codigo not like ('$cod_curso')";


    $resultado = Curso::consulta($query);

    foreach ($resultado as $columna) {

        echo "<tr>";

        echo "<td>" . "<input type='radio' name='select' value='" . $columna["codigo"] . "'></td>";
        echo "<td>" . utf8_encode($columna["carrera"]) . "</td>";
        echo "<td style='background-color: #f4f186'>" . utf8_encode($columna["curso"]) . "</td>";
        echo "<td>" . $columna["ciclo"] . "</td>";
        echo "<td>" . utf8_encode($columna["p_nombre"]) . "</td>";
        echo "<td>" . utf8_encode($columna["apellido_p"]) . "</td>";

        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}





function mostrar_boton ($nombre, $mostrar, $class_color){

    echo "<div class='form-group'>";
    echo "<div class='col-md-12' style='text-align: center'>";
    echo "<input type='submit' name='$nombre' value='$mostrar' id='send' class='btn $class_color'>";
    echo "</div>";
    echo "</div>";
    echo "<br>";
    echo "<br>";
}

