<?php
/**
 * Created by PhpStorm.
 * User: jsanchez
 * Date: 12/11/18
 * Time: 17:34
 */

require "../models/Estudiante.php";
require "../models/Matricula.php";
require "../models/Validar.php";


/*-----------------------------------*/

//definimos el # de filas afectadas para evitar problemas:
$filas = 0;
$afectados = 0;

if (isset($_POST["buscar"])) {

    //saneando datos para evitar sql injection:
    $pajar = Validar::sanitize_all($_POST["busqueda"]);

    $consulta = "select * from estudiantes where dni like ('%$pajar%') or p_nombre like ('%$pajar%') or apellido_p like ('%$pajar%')";
    $resultado = Estudiante::consulta($consulta);

    //de acuerdo a las filas mostramos los datos en la tabla o en el formulario:
    $filas = $resultado->num_rows;

    function mostrar_tabla (){

        global $pajar;

        if ($pajar != "") {

            echo "<table id='datatable-buttons' class='table table-striped table-bordered'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th></th>";
            echo "<th>DNI</th>";
            echo "<th>Nombre</th>";
            echo "<th>Apellido</th>";
            echo "<th>Teléfono</th>";
            echo "<th>Discapacidad</th>";
            echo "<th>Género</th>";
            echo "<th>Fecha nac.</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            global $resultado;
            foreach ($resultado as $columna) {
                echo "<tr>";

                echo "<td>" . "<input type='radio' name='select' value='" . $columna["dni"] . "'></td>";
                echo "<td>" . $columna["dni"] . "</td>";
                echo "<td>" . utf8_encode($columna["p_nombre"]) . "</td>";
                echo "<td>" . utf8_encode($columna["apellido_p"]) . "</td>";
                echo "<td>" . $columna["telefono"] . "</td>";
                echo "<td>" . $columna["discapacidad"] . "</td>";
                echo "<td>" . $columna["genero"] . "</td>";
                echo "<td>" . $columna["fecha_nac"] . "</td>";

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";


            //mostrando los botones si la consulta afecta más de 1 fila:
            echo "<div class='form-group'>";
            echo "<div class='col-md-6 col-md-offset-3'>";
            echo "<input type='submit' name='eliminar_select' value='Eliminar' class='btn btn-danger'>";
            echo "<input type='submit' name='modificar' value='Modificar' id='send' class='btn btn-warning'>";
            echo "</div>";
            echo "</div>";

        }

    }

}


elseif (isset($_POST["modificar"])) {


    if (isset($_POST["select"])){

        //guardamos el dni seleccionado:
        $dni = $_POST["select"];

        //generamos resultado para inicializar las variables posteriormente:
        $resultado = Estudiante::get_by_dni($dni);

        //de acuerdo a las filas mostramos los datos en la tabla o en el formulario:
        $filas = $resultado->num_rows;

    }


}


elseif (isset($_POST["guardar"])) {

    $dni = trim($_POST["dni"]);
    $p_nombre =  Validar::sanear_cadena($_POST["p_nombre"]);
    $s_nombre =  Validar::sanear_nombres($_POST["s_nombre"]);
    $apellido_p =  Validar::sanear_cadena($_POST["apellido_p"]);
    $apellido_m =  Validar::sanear_cadena($_POST["apellido_m"]);
    $genero =  $_POST["genero"];
    $fecha_nac =  Validar::invertir_fecha($_POST["fecha_nac"]);
    $discapacidad =  $_POST["discapacidad"];
    $telefono = trim($_POST["telefono"]);
    $correo = trim($_POST["correo"]);
    $direccion = trim($_POST["direccion"]);
    $obs = Validar::sanear_cadena($_POST["obs"]);

    //decodificando las cadenas para que se guarden en la codificación correcta:
    $pnombre_cod = utf8_decode($p_nombre);
    $snombre_cod = utf8_decode($s_nombre);
    $papellido_cod = utf8_decode($apellido_p);
    $mapellido_cod = utf8_decode($apellido_m);
    $direc_cod = utf8_decode($direccion);
    $obs_cod = utf8_decode($obs);
    //echo "$dni,$p_nombre,$s_nombre,$apellido_p,$apellido_m,$genero,$fecha_nac,$discapacidad,$telefono,$correo,$obs<br>";


    //Actualizamos solo si los datos son válidos:
    if (Validar::validar_todo($dni,$p_nombre,$s_nombre,$apellido_p,$apellido_m,$telefono,$fecha_nac,$correo))
        $afectados = Estudiante::update_by_dni($dni,$pnombre_cod,$snombre_cod,$papellido_cod,$mapellido_cod,$genero,$fecha_nac,$discapacidad,$telefono,$correo,$direc_cod,$obs);

}


/*----------------------*/

function inicializar_variables ($resultado){

    global $dni;
    global $p_nombre;
    global $s_nombre;
    global $apellido_p;
    global $apellido_m;
    global $genero;
    global $fecha_nac;
    global $discapacidad;
    global $telefono;
    global $correo;
    global $direccion;
    global $obs;

    global $resultado;
    foreach ($resultado as $columna) {

        $dni = $columna["dni"];
        $p_nombre = $columna["p_nombre"];
        $s_nombre = $columna["s_nombre"];
        $apellido_p = $columna["apellido_p"];
        $apellido_m = $columna["apellido_m"];
        $genero = $columna["genero"];
        $fecha_nac = Validar::invertir_fecha($columna["fecha_nac"]);
        $discapacidad = $columna["discapacidad"];
        $telefono = $columna["telefono"];
        $correo = $columna["correo"];
        $direccion = $columna["direccion"];
        $obs = $columna["observacion"];
    }
}

function mostrar_botones ()
{

    echo "<br>";
    echo "<div class='form-group'>";
    echo "<div class='col-md-6 col-md-offset-3'>";
    echo "<input type='submit' name='eliminar' value='Eliminar' class='btn btn-danger'>";
    echo "<input type='submit' name='guardar' value='Guardar' id='send' class='btn btn-success'>";
    echo "</div>";
    echo "</div>";
}
