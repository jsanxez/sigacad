<?php

if (isset($_POST["registrar"])) {

    require "../models/Conectar.php";
    require "../models/Login.php";
    require "../models/Validar.php";

    $dni = $_POST["dni"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    //    echo "antes de filtrar: |$dni|, |$pass|, |$pass2|<br>";
    $password = Login::filtrar($_POST["password"]);
    $password2 = Login::filtrar($_POST["password2"]);
//    echo "antes de filtrar: |$dni|, |$pass|, |$pass2|<br>";


    //si todos los campos han sido ingresados:
    if (!empty($dni) && !empty($password) && !empty($password2)) {

        //verificamos que el dni sea valido:
        if (Validar::validar_dni($dni)){

            //buscando usuario:
            $administradores = Login::get_from("administradores", $dni);
            $estudiantes = Login::get_from("estudiantes", $dni);
            $docentes = Login::get_from("docentes", $dni);


            if ($administradores->num_rows == 1) {

                $estado_pass = Login::password_state("administradores", $dni);

                //Si el usuario no esta registrado:
                if ($estado_pass == false) {

                    if ($password == $password2) {
                        $afectados = Login::set_pass("administradores", $dni, $password);
                        header("Location: ../views/registrar.php?info=1");
                    } else
                        header("Location: ../views/registrar.php?info=noth");
                } else
                    header("Location: ../views/registrar.php?info=exist");

            }
            elseif ($estudiantes->num_rows == 1) {

                $estado_pass = Login::password_state("estudiantes", $dni);

                //Si el usuario no esta registrado:
                if ($estado_pass == false) {

                    if ($password == $password2) {
                        $afectados = Login::set_pass("estudiantes", $dni, $password);
                        header("Location: ../views/registrar.php?info=1");
                    } else
                        header("Location: ../views/registrar.php?info=noth");
                } else
                    header("Location: ../views/registrar.php?info=exist");

            }
            elseif ($docentes->num_rows == 1) {

                $estado_pass = Login::password_state("docentes", $dni);

                //Si el usuario no esta registrado:
                if ($estado_pass == false) {

                    if ($password == $password2) {
                        $afectados = Login::set_pass("docentes", $dni, $password);
                        header("Location: ../views/registrar.php?info=1");
                    } else
                        header("Location: ../views/registrar.php?info=noth");
                } else
                    header("Location: ../views/registrar.php?info=exist");
            }

            else
                header("Location: ../views/registrar.php?info=non");


        }else
            header("Location: ../views/registrar.php?info=-1");






    } else{

        header("Location: ../views/registrar.php?info=empty");
    }
}

