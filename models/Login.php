<?php

//require "Conectar.php";

class Login extends Conectar
{
    public function __construct()
    {
        parent::__construct();
    }

    public static function get_from ($tabla, $dni){
        $consulta = "select * from $tabla where dni='$dni'";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $resultado = $conexion_db->query($consulta);

        return $resultado;
    }

    public static function verificar_usuario ($tabla, $usuario, $pass){
        $consulta = "select dni, password from $tabla where dni='$usuario' and password='$pass'";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $resultado = $conexion_db->query($consulta);

        return $resultado;
    }


    public static function show_password ($tabla, $dni){
        $consulta = "select password from $tabla where dni='$dni'";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $resultado = $conexion_db->query($consulta);

        return $resultado;
    }

    public static function consulta ($consulta){
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $resultado = $conexion_db->query($consulta);

        return $resultado;
    }

    public static function filtrar ($valor){
        $dato_filtrado = trim($valor);
        $dato_filtrado = stripslashes($valor);
        $dato_filtrado = filter_var($valor, FILTER_SANITIZE_STRING);

        return $dato_filtrado;
    }

    public static function set_pass ($tabla, $dni, $set_pass){
        $consulta = "update $tabla set password='$set_pass' where dni='$dni'";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $conexion_db->query($consulta);

        $afectados = $conexion_db->affected_rows;

        return $afectados;
    }

    /*public static function is_admin ($tabla, $dni, $set_pass){
        $consulta = "update $tabla set password='$set_pass' where dni='$dni'";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $conexion_db->query($consulta);

        $afectados = $conexion_db->affected_rows;

        return $afectados;
    }*/



    // funciones gordas:

    public static function password_state ($tabla, $dni){

        $entidad = self::show_password($tabla, $dni);
        $password = "";
        foreach ($entidad as $columna){
            $password = $columna["password"];
        }

        //si el password esta configurado:
        if (!$password == "")
            return true;
        else
            return false;
    }

}

/*$login_obj = new Login();
$query = "select * from administradores";

$resultado = $login_obj->consulta($query);

foreach ($resultado as $dato){
    echo $dato["id"] . "<br>";
    echo $dato["usuario"] . "<br>";
    echo $dato["password"] . "<br>";

    echo "afectados: " . $resultado->num_rows;
}*/