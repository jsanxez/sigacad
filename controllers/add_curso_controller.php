<?php
/**
 * Created by PhpStorm.
 * User: jsanchez
 * Date: 18/11/18
 * Time: 0:10
 */

require "../models/Curso.php";
require "../models/Validar.php";

if (isset($_POST["enviar"])){

    $ciclo = $_POST["ciclo"];
    $codigo = mb_strtoupper($_POST["codigo"]);
    $nombre = Validar::p_letras($_POST["nombre"]);
    $creditos = $_POST["creditos"];
    $unidades = $_POST["unidades"];
    $horas = $_POST["horas"];

    //----
    $carrera = $_POST["carrera"];

    if (Validar::validar_cadenas($nombre)){

        $cursos = new Curso($ciclo, $codigo, $nombre, $creditos, $unidades, $horas);
        $query = "insert into carreras_has_cursos values ('$carrera', '$codigo')";
        echo "query: $query<br>";
        $afectados = Curso::consulta($query);
        echo "afec has: $afectados<br>";

        $afectados = $cursos->add_curso();


        if ($afectados >= 1) {
            $info = '1';
//            header("Location: ../views/agregar_curso.view.php?info=" . $info);
            echo "valor de has:$carrera, $codigo<br>";
        } else {
            $info = "nada";
            header("Location: ../views/agregar_curso.view.php?info=" . $info);
        }
    }else{
        $info = "-1";
        header("Location: ../views/agregar_curso.view.php?info=" . $info);
        //    echo "Estas intentando enviar: $ciclo,$codigo,$nombre,$creditos,$unidades,$horas<br>";
    }




}
elseif (isset($_POST["cancelar"]))
    header("Location: ../views/agregar_curso.view.php");