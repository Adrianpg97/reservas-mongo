<?php
class Db {

    private static $conexion = NULL;

    private function __construct() {}

    public static function conectar() {
        $conexion = new MongoDB\Client;
        self::$conexion = $conexion->peliculas;

        return self::$conexion;}
    }
?>