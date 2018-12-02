<?php
/**
 * Created by PhpStorm.
 * User: jsanchez
 * Date: 9/11/18
 * Time: 14:51
 */

class Validar
{


    /*----validando datos: ----*/

    public static function validar_dni ($dni){

        if (strlen($dni) == 8 && ctype_digit($dni))
            return true;
        else
            return false;
    }

    /*valida nombres y apellidos:*/
    public static function validar_cadena($cadena){

        $cadena = self::sanear_cadena($cadena);

        /*quitamos las tildes para poder usar ctype_alpha:*/
        $cadena = self::quitar_tilde($cadena);

        if (ctype_alpha($cadena))
            return true;
        else
            return false;

    }
    //si solo hay letras:
    public static function validar_cadenas($cadenas){
        $cadenas = str_replace(' ', '', $cadenas);

        $cadenas = self::quitar_tilde($cadenas);

        if (ctype_alpha($cadenas) || empty($cadenas))
            return true;
        else
            return false;

    }


    public static function validar_telefono ($telefono){
        $long = strlen($telefono);

        if ($long >= 6 || $long <= 9){
            return true;
        }else
            return false;
    }
    public static function validar_fecha ($fecha){

        $partes_fecha = explode(".", $fecha, 3);
        $condicion = checkdate($partes_fecha[1], $partes_fecha[2], $partes_fecha[0]);

        if ($condicion)
            return true;
        else
            return false;

    }
    public static function validar_correo ($correo){
        $valido = filter_var($correo, FILTER_VALIDATE_EMAIL);

        if ($valido)
            return true;
        else
            return false;

    }

    public static function validar_todo ($dni, $nombre, $nombres, $apellido_p, $apellido_m, $telefono, $fecha, $correo=""){

        if ($correo==""){

            if (self::validar_dni($dni) && self::validar_cadena($nombre) &&
                self::validar_cadenas($nombres) && self::validar_cadena($apellido_p) &&
                self::validar_cadena($apellido_m) && self::validar_telefono($telefono) &&
                self::validar_fecha($fecha))
                return true;
            else
                return false;
        }else {
            if (self::validar_dni($dni) && self::validar_cadena($nombre) &&
                self::validar_cadenas($nombres) && self::validar_cadena($apellido_p) &&
                self::validar_cadena($apellido_m) && self::validar_telefono($telefono) &&
                self::validar_fecha($fecha) && self::validar_correo($correo))
                return true;
            else
                return false;
        }
    }


    /*funciones extras (utilidades)*/

    /*Quitamos las tildes para no dar problemas a las demas funciones de PHP*/
    public static function quitar_tilde ($pajar){
        $aguja = ['Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ', 'á', 'é', 'í', 'ó', 'ú', 'ñ'];
        $reemplazar = ['A', 'E', 'I', 'O', 'U', 'N', 'a', 'e', 'i', 'o', 'u', 'n'];

        $cadena_mod = str_replace($aguja, $reemplazar, $pajar);

        return $cadena_mod;
    }


    /*Quita espacios innecesarios y convierte la primera letra a mayuscula
     *sin importar si esta lleva tilde
     * */
    public static function p_letra ($cadena){
        $cadena = mb_strtoupper($cadena);
        $subcadena = mb_substr($cadena, 1);
        $subcadena = mb_strtolower($subcadena);
        $cadena = mb_substr($cadena, 0, 1) . $subcadena;


        return $cadena;
    }
    /*convierte a mayusculas ciertas palabras de la entrada:*/

    public static function p_letras ($palabras){

        $palabras = trim($palabras);
        $palabras_arr = explode(" ", $palabras);

        //reutilizando la variable palabras:
        $palabras = "";
        for ($i=0; $i < count($palabras_arr); $i++){

            if (mb_strlen($palabras_arr[$i]) >= 4){

                if ($i != (count($palabras_arr)-1))
                    $palabras .= self::p_letra($palabras_arr[$i]) . " ";
                else
                    $palabras .= self::p_letra($palabras_arr[$i]);
            }
            else
                $palabras .= $palabras_arr[$i] . " ";
        }


        return $palabras;
    }


    /*Variante para los nombres*/
    public static function sanear_cadena ($cadena){
        $cadena = trim($cadena);
        $cadena = self::p_letra($cadena);


        return $cadena;
    }

    public static function sanear_nombres ($palabras){

        $palabras = trim($palabras);
        $palabras_arr = explode(" ", $palabras);

        //reutilizando la variable palabras:
        $palabras = "";
        for ($i=0; $i < count($palabras_arr); $i++){

            if ($i != (count($palabras_arr)-1))
                $palabras .= self::p_letra($palabras_arr[$i]) . " ";
            else
                $palabras .= self::p_letra($palabras_arr[$i]);
        }


        return $palabras;
    }

    public static function invertir_fecha ($fecha){
        $fecha = trim($fecha);

        if (strpos($fecha, ".") == true){

            $partes_fecha = explode(".", $fecha, 3);
            $fecha_saneada = $partes_fecha[2].".".$partes_fecha[1].".".$partes_fecha[0];
            return $fecha_saneada;
        }
        elseif (strpos($fecha, "-") == true){
            $partes_fecha = explode("-", $fecha, 3);
            $fecha_saneada = $partes_fecha[2].".".$partes_fecha[1].".".$partes_fecha[0];
            return $fecha_saneada;
        }

    }

    public static function sanitize_all ($valor){
        $valor = trim($valor);

        /*escapando comillas simples y dobles:*/
        $valor = addslashes($valor);

        /*quitando slash:*/
        $valor = str_replace("\'", "", $valor);

        $valor = filter_var($valor, FILTER_SANITIZE_STRING);

        return $valor;
    }


}



/*$valor = "   <b>'jose''</b>";
echo "valor: |$valor|<br>";
$valor2 = Validar::sanitize_all($valor);
echo "valor2: |$valor2|<br>";*/

/*$estate = Validar::validar_correo("");

if ($estate)
    echo "valido";
else
    echo "invalido";*/

/*$estado = Validar::validar_todo("65498720","Jehú","","Sáenz","Altamirano","32165487","1986.03.15", "dfsfd");

if ($estado)
    echo "datos validos";
else
    echo "datos invalidos";*/
