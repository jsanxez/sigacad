<?php
/**
 * Created by PhpStorm.
 * User: jsanchez
 * Date: 18/11/18
 * Time: 1:39
 */

require "../models/Carrera.php";
require "../models/Validar.php";

if (isset($_POST["enviar"])){

    $codigo_mod = $_POST["codigo_mod"];
    $codigo = mb_strtoupper($_POST["codigo"]);
    $nombre = Validar::p_letras($_POST["nombre"]);

    if (Validar::validar_cadenas($nombre)){

        $carreras = new Carrera($codigo_mod, $codigo, $nombre);
        $afectados = $carreras->add_carrera();

        if ($afectados >= 1) {
            $info = '1';
            header("Location: ../views/agregar_carrera.view.php?info=" . $info);
        } else {
            $info = "nada";
            header("Location: ../views/agregar_carrera.view.php?info=" . $info);
        }
    }else{
        $info = "-1";
        header("Location: ../views/agregar_carrera.view.php?info=" . $info);
        //    echo "Estas intentando enviar: $ciclo,$codigo,$nombre,$creditos,$unidades,$horas<br>";
    }




}
elseif (isset($_POST["cancelar"]))
    header("Location: ../views/agregar_carrera.view.php");