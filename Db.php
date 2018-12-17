<?php
	require 'vendor/autoload.php';

	class  Db{
		private static $conexion=NULL;
		private function __construct (){}
 
		public static function conectar(){

				//Abrimos conexión a Mongo
				//Esto es una prueba de conexion 2
				$conexion = new MongoDB\Client;
				//Seleccionamos base de datos
				//Prueba conexionn mongo Db
				self::$conexion = $conexion->pruebas;

				return self::$conexion;
		}		
	} 
?>