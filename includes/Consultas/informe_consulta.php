<?php

include("../../conexion.php");

if (isset($_POST['tipo_informe'])) {
    $tipo_de_informe = $_POST['tipo_informe'];
    $desde = $_POST['fecha1'];
    $hasta = $_POST['fecha2'];

    if ($tipo_de_informe == 4) {
        $query = ("SELECT * from consultas where liq != 'particular' and fecha_cobro between '$desde' and '$hasta' order by ObraSocial_Paciente asc, fecha_cobro asc");
        $resultado = mysqli_query($conexion, $query);
    } elseif ($tipo_de_informe == 5) {
        $ob = $_POST['obra_social'];
        $query = ("SELECT * from consultas where ObraSocial_Paciente='$ob' AND fecha_cobro between '$desde' and '$hasta' order by ObraSocial_Paciente asc, fecha_cobro asc");
        $resultado = mysqli_query($conexion, $query);
    } elseif ($tipo_de_informe == 6) {
        $liq = $_POST['liq'];
        $query = ("SELECT * from consultas where liq='$liq' AND fecha_cobro between '$desde' and '$hasta' order by liq asc, fecha_cobro asc");
        $resultado = mysqli_query($conexion, $query);
    }


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
