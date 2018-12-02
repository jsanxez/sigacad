<?php

session_start();
if (isset($_POST["login"])) {

    require "../models/Conectar.php";
    require "../models/Login.php";

    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    $errores = "";


    if (!empty($usuario) && !empty($password)) {

        //filtramos por seguridad:
        $usuario = Login::filtrar($usuario);
        $password = Login::filtrar($password);

        //buscando usuario:
        $administradores = Login::consulta("select * from administradores where username='$usuario' and not length(password) = 0");
        $docentes = Login::consulta("select * from docentes where dni='$usuario' and not length(password) = 0");
        $estudiantes = Login::consulta("select * from estudiantes where dni='$usuario' and not length(password) = 0");


        if ($administradores->num_rows){

            $adm_query = "select * from administradores where username='$usuario' and password='$password'";
            $administradores = Login::consulta($adm_query);

            if ($administradores->num_rows){
                $_SESSION["usuario"] = $usuario;
                header("Location: ../views/dashboard.view.php");
            }
            else
                header("Location: ../index.php?info=noth");
        }
        elseif ($estudiantes->num_rows){

            $estudiantes = Login::verificar_usuario("estudiantes", $usuario, $password);

            if ($estudiantes->num_rows){
                $_SESSION["usuario"] = $usuario;
                header("Location: ../views/estudiantes.view.php");
            }
            else
                header("Location: ../index.php?info=noth");

        }
        elseif ($docentes->num_rows){

            $docentes = Login::verificar_usuario("docentes", $usuario, $password);

            if ($docentes->num_rows){
                $_SESSION["usuario"] = $usuario;
                header("Location: ../views/docentes.view.php");
            }
            else
                header("Location: ../index.php?info=noth");

        }else
            header("Location: ../index.php?info=-1");

        /*$query = "select username, password from administradores where username='$usuario' and password='$password'";
        $resultado = Login::consulta($query);
        $afectados = $resultado->num_rows;*/

    } else
        header("Location: ../index.php?info=empty");

}