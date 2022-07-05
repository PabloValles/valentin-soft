<?php
include("../../conexion.php");

if (isset($_POST)) {

    $opcion = $_POST['opcion'];

    if ($opcion === 'admin') {
        $tag = $_POST['tag'];

        if ($tag === 'x_fechas') {
            $fecha1 = $_POST['fecha1'];
            $fecha2 = $_POST['fecha2'];
            $sql = "SELECT * FROM consultas WHERE fecha_cobro BETWEEN '$fecha1' AND '$fecha2'";
            $resultado = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
            listar($resultado, $conexion);
        } elseif ($tag === 'x_fechas_os') {
            $fecha1 = $_POST['fecha1'];
            $fecha2 = $_POST['fecha2'];

            $resultado = mysqli_query($conexion, "select nombre_pac,apellido_pac,obsocial_pac,fum_ficha,fpp_ok,terminacion from pacientes as p INNER JOIN ficha_obstetrica as f ON p.id_paciente=f.id_paciente_ficha where terminacion=0 and fpp_ok!=0 AND fpp_ok between '$fecha1' and '$fecha2' order by fpp_ok") or die(mysqli_error($conexion));

            listar($resultado, $conexion);
        } elseif ($tag === 'mes_anio') {
            $fecha1 = $_POST['fecha1'];
            $fecha2 = $_POST['fecha2'];

            $resultado = mysqli_query($conexion, "select nombre_pac,apellido_pac,obsocial_pac,fum_ficha,fpp_ok,terminacion from pacientes as p INNER JOIN ficha_obstetrica as f ON p.id_paciente=f.id_paciente_ficha where terminacion=0 and fpp_ok!=0 AND fpp_ok between '$fecha1' and '$fecha2' order by fpp_ok") or die(mysqli_error($conexion));

            listar($resultado, $conexion);
        } elseif ($tag === 'particulares') {
            $fecha1 = $_POST['fecha1'];
            $fecha2 = $_POST['fecha2'];

            $resultado = mysqli_query($conexion, "select nombre_pac,apellido_pac,obsocial_pac,fum_ficha,fpp_ok,terminacion from pacientes as p INNER JOIN ficha_obstetrica as f ON p.id_paciente=f.id_paciente_ficha where terminacion=0 and fpp_ok!=0 AND fpp_ok between '$fecha1' and '$fecha2' order by fpp_ok") or die(mysqli_error($conexion));

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
