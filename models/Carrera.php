<?php
/**
 * Created by PhpStorm.
 * User: jsanchez
 * Date: 4/11/18
 * Time: 15:16
 */

//require "Conectar.php";
class Carrera extends Conectar
{
    private $cod_mod, $codigo, $nombre;

    public function __construct($cod_mod, $codigo, $nombre)
    {
        parent::__construct();
        $this->cod_mod = $cod_mod;
        $this->codigo = $codigo;
        $this->nombre = $nombre;
    }

    public static function get_all (){

        $consulta = "select * from carreras";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $resultado = $conexion_db->query($consulta);

        return $resultado;
    }

    public static function get_by_cod ($codigo){
        $consulta = "select * from carreras where codigo='$codigo'";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $resultado = $conexion_db->query($consulta);

        return $resultado;
    }

    public static function get_by ($columna, $valor){
        $consulta = "select * from carreras where $columna='$valor'";
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

    public function add_carrera (){
        $consulta = "insert into carreras values ('$this->cod_mod','$this->codigo','$this->nombre')";
        $this->conexion_db->query($consulta);

        $afectados = $this->conexion_db->affected_rows;
        return $afectados;
    }

    public static function delete_by_cod ($codigo){
        $consulta = "delete from carreras where codigo='$codigo'";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $conexion_db->query($consulta);

        $afectados = $conexion_db->affected_rows;

        return $afectados;

    }

    public static function update_by_cod ($cod_mod,$codigo,$nombre){
        $consulta = "update carreras set codigo='$codigo',institutos_cod_modular='$cod_mod',nombre='$nombre' where codigo='$codigo'";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $conexion_db->query($consulta);

        $afectados = $conexion_db->affected_rows;

        return $afectados;
    }
}

/*
$datos_todos = Carrera::get_all();

foreach ($datos_todos as $columna) {

    echo "<br>";

    echo $columna["semestres_ciclo"] . "<br>";
    echo $columna["codigo"] . "<br>";
    echo $columna["nombre"] . "<br>";
    echo $columna["creditos"] . "<br>";
    echo $columna["unidades"] . "<br>";
    echo $columna["horas_sem"] . "<br>";

}*/

/*$efect = Carrera::update_by_cod("1284486", "AM03", "Contrucción de arte en maderas");

if ($efect)
    echo "ingresado y afectados: $efect";
else
    echo "error";*/