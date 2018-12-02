<?php
/**
 * Created by PhpStorm.
 * User: jsanchez
 * Date: 28/10/18
 * Time: 17:45
 */

//require "Conectar.php";

class Estudiante extends Conectar
{

    private $dni, $p_nombre, $s_nombre, $apellido_p, $apellido_m, $genero, $fecha_nac, $discapacidad;
    private $telefono, $correo, $direccion, $obs, $pass;

    public function __construct($dni, $p_nombre,$s_nombre, $apellido_p, $apellido_m, $genero, $fecha_nac, $discapacidad, $telef, $correo, $direccion, $obs, $pass)
    {
        parent::__construct();

        $this->dni = $dni;
        $this->p_nombre = $p_nombre;
        $this->s_nombre = $s_nombre;
        $this->apellido_p = $apellido_p;
        $this->apellido_m = $apellido_m;
        $this->genero = $genero;
        $this->fecha_nac = $fecha_nac;
        $this->discapacidad = $discapacidad;
        $this->telefono = $telef;
        $this->correo = $correo;
        $this->direccion = $direccion;
        $this->obs = $obs;
        $this->pass = $pass;
    }


    public static function get_all (){

        $consulta = "select * from estudiantes";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $resultado = $conexion_db->query($consulta);

        return $resultado;
    }

    public static function get_by_dni ($dni){
        $consulta = "select * from estudiantes where dni='$dni'";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $resultado = $conexion_db->query($consulta);

        return $resultado;
    }

    public static function get_by ($columna, $valor){
        $consulta = "select * from estudiantes where $columna='$valor'";
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

    public function add_estudiante (){
        $consulta = "insert into estudiantes values ('$this->dni','$this->p_nombre','$this->s_nombre','$this->apellido_p','$this->apellido_m','$this->genero','$this->fecha_nac','$this->discapacidad','$this->telefono','$this->correo', '$this->direccion','$this->obs','$this->pass')";
        $this->conexion_db->query($consulta);

        $afectados = $this->conexion_db->affected_rows;
        return $afectados;
    }

    public static function delete_by_dni ($dni){
        $consulta = "delete from estudiantes where dni='$dni'";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $conexion_db->query($consulta);

        $afectados = $conexion_db->affected_rows;

        return $afectados;

    }

    public static function update_by_dni ($dni,$p_nombre,$s_nombre,$apellido_p,$apellido_m,$genero,$fecha_nac,$dspcd,$telefono,$correo, $direccion, $obs){
        $consulta = "update estudiantes set dni='$dni',p_nombre='$p_nombre',s_nombre='$s_nombre',apellido_p='$apellido_p',apellido_m='$apellido_m',genero='$genero',fecha_nac='$fecha_nac',discapacidad='$dspcd',telefono='$telefono',correo='$correo',direccion='$direccion',observacion='$obs' where dni='$dni'";
        $conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);
        $conexion_db->query($consulta);

        $afectados = $conexion_db->affected_rows;

        return $afectados;
    }

}


//$p_nombre = "   álvaro ";
/*
$estudiantes = new Estudiante("10105678", "Jehú2", "", "Sánchez", "Torrín", "M", "1997-12-17", "NO", "321465", "", "", "");
$resultado = $estudiantes->validar_cadena($p_nombre);

echo "cadena ingresada: |$p_nombre|<br>";

if ($resultado==true)
    echo "cadena valida";
else
    echo "invalido";*/

//$estudiantes = new Estudiante("10105678", "Jehú2", "", "Sánchez", "Torrín", "M", "1997-12-17", "NO", "321465", "", "", "");
//$resultado = $estudiantes->sanear_cadena($p_nombre);
//
//echo "original: $p_nombre<br>";
//echo "modificado: |" . $resultado . "|<br>";

//echo "despues de trim: |" . trim($p_nombre) . "|";
//$aguja = ['Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ', 'á', 'é', 'í', 'ó', 'ú', 'ñ'];
//$reemplazar = ['A', 'E', 'I', 'O', 'U', 'N', 'a', 'e', 'i', 'o', 'u', 'n'];
//$pajar = "Álvaro Órtiz Ñandu álvaro órtiz ñandu";
//
//$cadena_mod = str_replace($aguja, $reemplazar, $pajar);
//
//echo "original: $pajar<br>";
//echo "modificado: $cadena_mod<br>";
/*if (strpbrk($p_nombre, "áéíóú"))
    echo "se encontró tilde<br>";
else
    echo "no se encontro tilde<br>";*/


//echo "longitud: ". mb_strlen($p_nombre);
/*$codificado = utf8_encode($p_nombre);
$decodificado = utf8_decode($p_nombre);

echo "string original: $p_nombre<br>";
echo "valor codificado: $codificado<br>";
echo "valor decodificado: $decodificado<br>";*/

/*$estudiantes = new Estudiante("12345676","Maria","","Santos","Valin","M","1999-05-16","NO","987654321","maria@unknown.com","","");
$afectados = $estudiantes->add_estudiante();

if ($afectados > 0)
    echo "dato agregado<br>";
else
    echo "ningun dato agregado<br>";*/

/*$estudiantes = new Estudiante("92184498","Marianela", "Gomez Perez", "M", "1997-12-02","NO");
$afectados = $estudiantes->delete_by_dni("92184498");


echo "filas afectadas mostrar: " . $afectados . "<br>";

if ($afectados > 0)
    echo "dato eliminado<br>";
else
    echo "ningun dato eliminado<br>";


//$datos_todos = $estudiantes->get_all();


//$datos_dni = $estudiantes->get_by_dni("12345678");
//$datos_columna = $estudiantes->get_by("genero", "M");

//$personalizado = $estudiantes->consulta("select p_nombre from estudiantes");

/*echo "esto es una pruba ignorar:<br>";
foreach ($personalizado as $datos){
    echo $datos["p_nombre"] . "<br>";
}
echo "fin de la prueba que posiblemente no funcione.<br>";*/


/*foreach ($datos_todos as $columna) {

    echo "<br>";

    echo $columna["dni"] . "<br>";
    echo $columna["p_nombre"] . "<br>";
    echo $columna["apellido_p"] . "<br>";
    echo $columna["genero"] . "<br>";
    echo $columna["fecha_nac"] . "<br>";

}*/

/*echo "la cantidad de filas afectadas es: " . $datos_dni->num_rows;
echo "-----> por id o dni:<br>";
foreach ($datos_dni as $columna) {

//    echo $columna . ": " . $dato . " | ";
    echo $columna["dni"] . "<br>";
    echo $columna["p_nombre"] . "<br>";
    echo $columna["apellido_p"] . "<br>";
    echo $columna["genero"] . "<br>";
    echo $columna["fecha_nac"] . "<br>";
}*/

/*echo "la cantidad de filas afectadas es: " . $datos_columna->num_rows;
echo "-----> por columna: <br>";
foreach ($datos_columna as $columna) {

//    echo $columna . ": " . $dato . " | ";
    echo $columna["dni"] . "<br>";
    echo $columna["p_nombre"] . "<br>";
    echo $columna["apellido_p"] . "<br>";
    echo $columna["genero"] . "<br>";
    echo $columna["fecha_nac"] . "<br>";
}*/

/*-----------*/

/*$estudiante = new Estudiante();
$resultado = $estudiante->validar_nombre(" jose sanchez ");

echo "--|$resultado|----<br>";

if ($resultado)
    echo "verdadero";
else
    echo "falso";*/

/*$afectado = Estudiante::delete_by_dni("98765432");

var_dump($afectado);

if ($afectado >= 1)
    echo "<br>eliminado";
else
    echo "no eliminado";*/
/*$afectados = Estudiante::update_by_dni("70669128", "Jose", "lolo", "Sanchez", "Altamirano","M","1997.09.10","NO","974309166","jsanchez@gmail.com", "Alumno vago");

if ($afectados == 1)
    echo "datos actualizados:$afectados";
else
    echo "ningun dato actualizado:$afectados";*/

//$afectados = Estudiante::update_by_dni(00000078,Ana,Rosa,Mortadella,Durán,F,1992.01.16,NO,654987,ana@gmail.com,Nada por destacar.)