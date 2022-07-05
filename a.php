<?php include 'conexion.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	

<?php
$id = 1;

//consulta
$sql = "select * from pacientes where id_paciente='$id'";
$query = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));

$llena_paciente=mysqli_fetch_array($query);
$fecha_desde = $llena_paciente['desde_pac'];
$obra_social = $llena_paciente['obsocial_pac'];

$otra = "2018-06-14";
echo $otra."<br>";
echo "Obra Social: ".$obra_social." Vence: ".$fecha_desde;
echo "<hr>";
$today = date('Y-m-d');
echo $today;
echo "<hr>";
if ($otra < $today) {
	echo "La obra social está vencida";
}elseif ($otra == $today) {
	echo "La obra social vence hoy";
}else{
	echo "La obra social está ok";
}