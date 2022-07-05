<?php
include("../../conexion.php");

if (isset($_POST)) {

	$opcion = $_POST['opcion'];

	if ($opcion === 'filter') {
		$tag = $_POST['tag'];

		if ($tag === 'mes_anio_fecha') {

			$mes = $_POST['mes'];
			$anio = $_POST['anio'];

			$resultado = mysqli_query($conexion, "select nombre_pac,apellido_pac,obsocial_pac,fum_ficha,fpp_ok,terminacion from pacientes as p INNER JOIN ficha_obstetrica as f ON p.id_paciente=f.id_paciente_ficha where terminacion=0 and fpp_ok!=0 and MONTH(fpp_ok)='$mes' AND YEAR(fpp_ok)='$anio' order by fpp_ok") or die(mysqli_error($conexion));

			listar($resultado, $conexion);
		} elseif ($tag === 'rango') {
			$fecha1 = $_POST['fecha1'];
			$fecha2 = $_POST['fecha2'];

			$resultado = mysqli_query($conexion, "select nombre_pac,apellido_pac,obsocial_pac,fum_ficha,fpp_ok,terminacion from pacientes as p INNER JOIN ficha_obstetrica as f ON p.id_paciente=f.id_paciente_ficha where terminacion=0 and fpp_ok!=0 AND fpp_ok between '$fecha1' and '$fecha2' order by fpp_ok") or die(mysqli_error($conexion));

			listar($resultado, $conexion);
		} elseif ($tag === 'filtro_obra_social_tag') {
			$select_obra_social_filtro = $_POST['select_obra_social_filtro'];

			$resultado = mysqli_query($conexion, "select nombre_pac,apellido_pac,obsocial_pac,fum_ficha,fpp_ok,terminacion from pacientes as p INNER JOIN ficha_obstetrica as f ON p.id_paciente=f.id_paciente_ficha where terminacion=0 and fpp_ok!=0 AND obsocial_pac='$select_obra_social_filtro' order by fpp_ok") or die(mysqli_error($conexion));

			listar($resultado, $conexion);
		} elseif ($tag === 'filtro_paciente') {
			$select_paciente_filtro = $_POST['select_paciente_filtro'];

			$resultado = mysqli_query($conexion, "select nombre_pac,apellido_pac,obsocial_pac,fum_ficha,fpp_ok,terminacion from pacientes as p INNER JOIN ficha_obstetrica as f ON p.id_paciente=f.id_paciente_ficha where terminacion=0 and fpp_ok!=0 AND id_paciente='$select_paciente_filtro' order by fpp_ok") or die(mysqli_error($conexion));

			listar($resultado, $conexion);
		} elseif ($tag === 'filtro_all') {

			$resultado = mysqli_query($conexion, "select nombre_pac,apellido_pac,obsocial_pac,fum_ficha,fpp_ok,terminacion from pacientes as p INNER JOIN ficha_obstetrica as f ON p.id_paciente=f.id_paciente_ficha where terminacion=0 and fpp_ok!=0 order by fpp_ok") or die(mysqli_error($conexion));

			listar($resultado, $conexion);
		} else {
			die('error - tag no enviado');
		}
	} else {
		die('error - Opcion no enviada');
	}
} else {

	echo "Holaa";
}

function listar($resultado, $conexion)
{
	if (!$resultado) {
		die("error");
	} else {
		$arreglo = []; //Cuando no haya registros, el arreglo se enviará vacio
		while ($data = mysqli_fetch_assoc($resultado)) {
			$arreglo["data"][] = array_map("utf8_encode", $data); //aca le pasamos todos los resultados.
		}
		echo json_encode($arreglo, JSON_UNESCAPED_UNICODE);
	}

	mysqli_free_result($resultado);
	mysqli_close($conexion);
}


//mysqli_free_result($resultado);
//mysqli_close($conexion);
