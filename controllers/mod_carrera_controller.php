<?php
/**
 * Created by PhpStorm.
 * User: jsanchez
 * Date: 18/11/18
 * Time: 1:52
 */

require "../models/Carrera.php";
require "../models/Validar.php";

/*-----------------------------------*/

//definimos el # de filas afectadas para evitar problemas:
$filas = 0;
$afectados = 0;

if (isset($_POST["buscar"])) {

    //saneando datos para evitar sql injection:
    $pajar = Validar::sanitize_all($_POST["busqueda"]);

    $consulta = "select * from carreras where codigo like ('%$pajar%') or nombre like ('%$pajar%')";
    $resultado = Carrera::consulta($consulta);

    //de acuerdo a las filas mostramos los datos en la tabla o en el formulario:
    $filas = $resultado->num_rows;

    function mostrar_tabla (){

        global $pajar;

        if ($pajar != "") {

            echo "<table id='datatable-buttons' class='table table-striped table-bordered'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th></th>";
            echo "<th>Código carrera</th>";
            echo "<th>Nombre carrera</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            global $resultado;
            foreach ($resultado as $columna) {
                echo "<tr>";

                echo "<td>" . "<input type='radio' name='select' value='" . $columna["codigo"] . "'></td>";
                echo "<td>" . $columna["codigo"] . "</td>";
                echo "<td>" . utf8_encode($columna["nombre"]) . "</td>";

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";


            //mostrando los botones si la consulta afecta mas de 2 filas:
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

        //guardamos el codigo seleccionado:
        $codigo = $_POST["select"];

        //generamos resultado para inicializar las variables posteriormente:
        $resultado = Carrera::get_by_cod($codigo);

        //de acuerdo a las filas mostramos los datos en la tabla o en el formulario:
        $filas = $resultado->num_rows;


    }




}


elseif (isset($_POST["guardar"])) {


    $codigo_mod = "1284486";
    $codigo = mb_strtoupper($_POST["codigo"]);
    $nombre = Validar::p_letras($_POST["nombre"]);

    //decodificando las cadenas.
    $nombre_cod = utf8_decode($nombre);

    //Actualizamos solo si los datos son válidos:
    if (Validar::validar_cadenas($nombre))
        $afectados = Carrera::update_by_cod($codigo_mod,$codigo,$nombre_cod);


}


/*----------------------*/

function inicializar_variables ($resultado){

    global $codigo;
    global $nombre;

    global $resultado;
    foreach ($resultado as $columna) {

        $codigo = $columna["codigo"];
        $nombre = $columna["nombre"];
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
