<?php

require "../models/Docente.php";
require "../models/Validar.php";

if (isset($_POST["enviar"])) {



    $dni = $_POST["dni"];
    $p_nombre =  Validar::sanear_cadena($_POST["p_nombre"]);
    $s_nombre =  Validar::sanear_cadena($_POST["s_nombre"]);
    $apellido_p =  Validar::sanear_cadena($_POST["apellido_p"]);
    $apellido_m =  Validar::sanear_cadena($_POST["apellido_m"]);
    $titulo = Validar::p_letras($_POST["titulo"]);
    $genero =  $_POST["genero"];
    $fecha_nac =  Validar::invertir_fecha($_POST["fecha_nac"]);
    $telefono = $_POST["telefono"];
    $correo = trim($_POST["correo"]);
    $direccion = trim($_POST["direccion"]);

    $docente = new Docente($dni,$p_nombre,$s_nombre,$apellido_p,$apellido_m,$titulo,$genero,$fecha_nac,$telefono,$correo,$direccion, "");

    //si todos los datos son correctos:
    if (Validar::validar_todo($dni, $p_nombre, $s_nombre, $apellido_p, $apellido_m, $telefono, $fecha_nac, $correo)) {

        $afectados = $docente->add_docente();
        /*retorna -1 si ya existe el dato y 1 si es que hubo exito*/

        if ($afectados >= 1) {
            $info = '1';
            header("Location: ../views/agregar_docente.view.php?info=" . $info);
        } else {
            $info = "nada";
            header("Location: ../views/agregar_docente.view.php?info=" . $info);
        }





    } else {
        $info = "-1";
        header("Location: ../views/agregar_docente.view.php?info=" . $info);
//            echo "estas intentado enviar: $dni,$p_nombre,$s_nombre,$apellido_p,$apellido_m,$genero,$fecha_nac,$discapacidad,$telefono,$correo,$obs,'...'<br>";
//            echo "datos de la matricula: $dni, $carrera<br>";
    }

}

elseif (isset($_POST["cancelar"]))
    header("Location: ../views/agregar_docente.view.php");