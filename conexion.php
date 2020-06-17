<?php   
	//Archivo de conexion
$servidor = 'localhost';
$usuario = 'root';
$clave = '';
$DB = 'hotel';
$conn = new mysqli($servidor, $usuario, $clave, $DB);
if ($conn->connect_error) {
	die('Conexion fallida: '.$conn -> connect_error);
}
?>