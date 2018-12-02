<?php

require "../models/Estudiante.php";
require "../models/Matricula.php";
require "../models/Validar.php";

if (isset($_POST["enviar"])) {

    $dni = trim($_POST["dni"]);
    $p_nombre = Validar::sanear_cadena($_POST["p_nombre"]);
    $s_nombre = Validar::sanear_nombres($_POST["s_nombre"]);
    $apellido_p = Validar::sanear_cadena($_POST["apellido_p"]);
    $apellido_m = Validar::sanear_cadena($_POST["apellido_m"]);
    $genero = $_POST["genero"];
    $fecha_nac = Validar::invertir_fecha($_POST["fecha_nac"]);
    $discapacidad = $_POST["discapacidad"];
    $telefono = trim($_POST["telefono"]);
    $correo = trim($_POST["correo"]);
    $direccion = trim($_POST["direccion"]);
    $obs = Validar::sanear_cadena($_POST["obs"]);

    //datos para otra consulta simultanea:
    $carrera = trim($_POST["carrera"]);

    $estudiante = new Estudiante($dni, $p_nombre, $s_nombre, $apellido_p, $apellido_m, $genero, $fecha_nac, $discapacidad, $telefono, $correo, $direccion, $obs, "");

    //si todos los datos son correctos:
    if (Validar::validar_todo($dni, $p_nombre, $s_nombre, $apellido_p, $apellido_m, $telefono, $fecha_nac, $correo)) {
        
        //echo "los datos fueron correctos<br>";

        $afectados = $estudiante->add_estudiante();
        /*retorna -1 si ya existe el dato y 1 si es que hubo exito*/
        
        //echo "afectados agregar: $afectados<br>";

        //matriculando al estudiante en sus primeros cursos:
        $afectados2 = Matricula::add_matricula($dni, $carrera);
        
        //echo "afectados matricula: $afectados2<br>";
        
        if ($afectados >= 1 && $afectados2 >= 1) {
            $info = '1';
            header("Location: ../views/agregar_estudiante.view.php?info=" . $info);
        } else {
            $info = "nada";
            header("Location: ../views/agregar_estudiante.view.php?info=" . $info);
        }





    } else {
        $info = "-1";
        header("Location: ../views/agregar_estudiante.view.php?info=" . $info);
//            echo "estas intentado enviar: $dni,$p_nombre,$s_nombre,$apellido_p,$apellido_m,$genero,$fecha_nac,$discapacidad,$telefono,$correo,$obs,'...'<br>";
//            echo "datos de la matricula: $dni, $carrera<br>";
    }

}

elseif (isset($_POST["cancelar"]))
    header("Location: ../views/agregar_estudiante.view.php");
