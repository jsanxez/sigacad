<?php
/**
 * Created by PhpStorm.
 * User: jsanchez
 * Date: 21/11/18
 * Time: 21:20
 */

class Matricula extends Conectar
{

    public function __construct()
    {
        parent::__construct();

    }

    public static function add_matricula ($dni_est, $cod_carr){

        $consulta = "insert into matriculas (dni_estudiante, cod_curso)
                     select e.dni, cc.codigo_curso
                     from estudiantes e join carreras_cursos cc
                     where e.dni='$dni_est' and cc.codigo_curso like ('$cod_carr%')";

        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $conexion_db->query($consulta);

        $afectados = $conexion_db->affected_rows;
        return $afectados;
    }

    public static function delete_mtr ($dni){

        $consulta = "delete from matriculas where dni_estudiante='$dni'";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $conexion_db->query($consulta);

        $afectados = $conexion_db->affected_rows;
        return $afectados;
    }


}