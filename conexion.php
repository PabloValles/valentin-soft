<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
$HOST = "localhost";
$USER = "root";
$PASS = "";
$DB = "valentin2";

function conectar(){
	global $HOST, $USER, $PASS, $DB;
	$cnx = mysqli_connect($HOST, $USER, $PASS, $DB);
	if (mysqli_connect_errno()) {
		echo "Conexión fallida: ".mysqli_connect_error();
		exit();
	}
	return $cnx;
}

$conexion = conectar();


?>

