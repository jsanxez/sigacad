<?php
/**
 * Created by PhpStorm.
 * User: jsanchez
 * Date: 28/10/18
 * Time: 17:45
 */

//require "Conectar.php";

class Docente extends Conectar
{

    private $dni, $p_nombre, $s_nombre, $apellido_p, $apellido_m, $titulo, $genero, $fecha_nac;
    private $telefono, $correo, $direccion, $pass;

    public function __construct($dni,$p_nombre,$s_nombre,$apellido_p,$apellido_m,$titulo,$genero,$fecha_nac,$telef,$correo,$direccion,$pass)
    {
        parent::__construct();

        $this->dni = $dni;
        $this->p_nombre = $p_nombre;
        $this->s_nombre = $s_nombre;
        $this->apellido_p = $apellido_p;
        $this->apellido_m = $apellido_m;
        $this->titulo = $titulo;
        $this->genero = $genero;
        $this->fecha_nac = $fecha_nac;
        $this->telefono = $telef;
        $this->correo = $correo;
        $this->direccion = $direccion;
        $this->pass = $pass;
    }



    public static function get_all (){

        $consulta = "select * from docentes";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $resultado = $conexion_db->query($consulta);

        return $resultado;
    }

    public static function get_by_dni ($dni){
        $consulta = "select * from docentes where dni='$dni'";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $resultado = $conexion_db->query($consulta);

        return $resultado;
    }

    public static function get_by ($columna, $valor){
        $consulta = "select * from docentes where $columna='$valor'";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $resultado = $conexion_db->query($consulta);

        return $resultado;
    }

    public static function consulta ($consulta){
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $resultado = $conexion_db->query($consulta);

        return $resultado;
    }

    /*----consultas con retorno de filas afectadas----*/

    public function add_docente (){
        $consulta = "insert into docentes values ('$this->dni','$this->p_nombre','$this->s_nombre','$this->apellido_p','$this->apellido_m','$this->titulo','$this->genero','$this->fecha_nac','$this->telefono','$this->correo','$this->direccion','$this->pass')";
        $this->conexion_db->query($consulta);

        $afectados = $this->conexion_db->affected_rows;
        return $afectados;
    }

    public static function delete_by_dni ($dni){
        $consulta = "delete from docentes where dni='$dni'";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $conexion_db->query($consulta);

        $afectados = $conexion_db->affected_rows;

        return $afectados;

    }
    public static function delete_from_by ($tabla, $dni){
        $consulta = "delete from $tabla where dni_docente='$dni'";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $conexion_db->query($consulta);

        $afectados = $conexion_db->affected_rows;

        return $afectados;

    }

    public static function update_by_dni ($dni,$p_nombre,$s_nombre,$apellido_p,$apellido_m,$titulo_prof,$genero,$fecha_nac,$telefono,$correo,$direccion){
        $consulta = "update docentes set p_nombre='$p_nombre',s_nombre='$s_nombre',apellido_p='$apellido_p',apellido_m='$apellido_m',titulo_prof='$titulo_prof',genero='$genero',fecha_nac='$fecha_nac',telefono='$telefono',correo='$correo', direccion='$direccion' where dni='$dni'";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $conexion_db->query($consulta);

        $afectados = $conexion_db->affected_rows;

        return $afectados;
    }

}

/*$docentes = new Docente("10045687", "juan jose", "ore cerron");
$afectados = $docentes->add_docente();

echo "afectados: $afectados<bR>";*/

//$eliminado = $docentes->delete_by_dni("12345677");

//$datos_dni = $docentes->get_by_dni("12345678");
//$datos_columna = $docentes->get_by("genero", "M");

//$personalizado = $docentes->consulta("select nombres from docentes");

/*echo "esto es una pruba ignorar:<br>";
foreach ($personalizado as $datos){
    echo $datos["nombres"] . "<br>";
}
echo "fin de la prueba que posiblemente no funcione.<br>";*/


/*foreach ($datos_todos as $columna) {

    echo "<br>";

    echo $columna["dni"] . "<br>";
    echo $columna["nombres"] . "<br>";
    echo $columna["apellidos"] . "<br>";
    echo $columna["genero"] . "<br>";
    echo $columna["fecha_nac"] . "<br>";

}*/

/*echo "la cantidad de filas afectadas es: " . $datos_dni->num_rows;
echo "-----> por id o dni:<br>";
foreach ($datos_dni as $columna) {

//    echo $columna . ": " . $dato . " | ";
    echo $columna["dni"] . "<br>";
    echo $columna["nombres"] . "<br>";
    echo $columna["apellidos"] . "<br>";
    echo $columna["genero"] . "<br>";
    echo $columna["fecha_nac"] . "<br>";
}*/

/*echo "la cantidad de filas afectadas es: " . $datos_columna->num_rows;
echo "-----> por columna: <br>";
foreach ($datos_columna as $columna) {

//    echo $columna . ": " . $dato . " | ";
    echo $columna["dni"] . "<br>";
    echo $columna["nombres"] . "<br>";
    echo $columna["apellidos"] . "<br>";
    echo $columna["genero"] . "<br>";
    echo $columna["fecha_nac"] . "<br>";
}*/

/*-----------*/

/*$docente = new Docente();
$resultado = $docente->validar_nombre(" jose sanchez ");

echo "--|$resultado|----<br>";

if ($resultado)
    echo "verdadero";
else
    echo "falso";*/

/*$afectados = Docente::update_by_dni("70669128", "Antonio", "alberto", "Sánchez", "altamirano","indefinido","M","1997-12-02", "12365487", "jsanchez@gmail.com");

if ($afectados == 1)
    echo "datos afectados<br>";
else
    echo "error al escanear";*/