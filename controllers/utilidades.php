<?php
/**
 * Created by PhpStorm.
 * User: jsanchez
 * Date: 9/12/18
 * Time: 12:27
 */

function mostrar_opciones (){

    $resultado = Login::consulta("select codigo, nombre from carreras");

    echo "<select name='carrera'>";
    foreach ($resultado as $columna) {

        if ($_POST["carrera"] == $columna["codigo"]){
            echo "<option value='" . $columna["codigo"] . "' selected>". utf8_encode($columna["nombre"]) .   "</option>";

        }
        else
            echo "<option value='" . $columna["codigo"] . "'>". utf8_encode($columna["nombre"]) .   "</option>";

    }
    echo " </select>";

}