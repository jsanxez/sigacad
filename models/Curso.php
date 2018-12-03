<?php
/**
 * Created by PhpStorm.
 * User: jsanchez
 * Date: 4/11/18
 * Time: 15:16
 */

//require "Conectar.php";
class Curso extends Conectar
{
    private $ciclo, $cod, $nombre, $creditos, $unidades, $horas;

    public function __construct($ciclo, $cod, $nombre, $creditos, $unidades, $horas)
    {
        parent::__construct();
        $this->ciclo = $ciclo;
        $this->cod = $cod;
        $this->nombre = $nombre;
        $this->creditos = $creditos;
        $this->unidades = $unidades;
        $this->horas = $horas;
    }

    public static function get_all (){

        $consulta = "select * from cursos";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $resultado = $conexion_db->query($consulta);

        return $resultado;
    }

    public static function get_by_cod ($codigo){
        $consulta = "select * from cursos where codigo='$codigo'";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $resultado = $conexion_db->query($consulta);

        return $resultado;
    }

    public static function get_by ($columna, $valor){
        $consulta = "select * from cursos where $columna='$valor'";
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

    public function add_curso (){
        $consulta = "insert into cursos values ('$this->ciclo','$this->cod','$this->nombre','$this->creditos','$this->unidades','$this->horas')";
        $this->conexion_db->query($consulta);

        $afectados = $this->conexion_db->affected_rows;
        return $afectados;
    }

    public static function delete_by_cod ($codigo){
        $consulta = "delete from cursos where codigo='$codigo'";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $conexion_db->query($consulta);

        $afectados = $conexion_db->affected_rows;

        return $afectados;

    }
    public static function borrar_dependencias ($cod_curso){
        $consulta = "delete from carreras_cursos where codigo_curso='$cod_curso'";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $conexion_db->query($consulta);

        $afectados = $conexion_db->affected_rows;

        return $afectados;

    }

    public static function update_by_cod ($ciclo,$codigo,$nombre,$creditos,$unidades,$horas){
        $consulta = "update cursos set codigo='$codigo',ciclo='$ciclo',nombre='$nombre',creditos='$creditos',unidades='$unidades',horas_sem='$horas' where codigo='$codigo'";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $conexion_db->query($consulta);

        $afectados = $conexion_db->affected_rows;

        return $afectados;
    }


}

/*$query = "select c.semestres_ciclo as ciclo, c.codigo, c.nombre as curso, c.creditos, c.unidades, c.horas_sem, r.nombre as carrera from carreras r, cursos c
where r.codigo = 'CC01'";
$datos_todos = Curso::consulta($query);

foreach ($datos_todos as $columna) {

    echo "<br>";

    echo $columna["ciclo"] . " | ";
    echo $columna["codigo"] . " | ";
    echo $columna["curso"] . " | ";
    echo $columna["creditos"] . " | ";
    echo $columna["unidades"] . " | ";
    echo $columna["horas_sem"] . " | ";
    echo $columna["carrera"] . " | ";

}*/