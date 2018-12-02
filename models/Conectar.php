<?php
require "config.php";

class Conectar extends mysqli{

    protected $conexion_db;

    public function __construct()
    {
        $this->conexion_db = new mysqli(HOST,USER_NAME,PASS,DB_NAME);

        if ($this->conexion_db->connect_errno){
            die("Error al conectar<br>");
            return;
        }
     //   else
    //        echo "conexion exitosa!<br>";

        $this->conexion_db->set_charset("utf8");
    }

}
