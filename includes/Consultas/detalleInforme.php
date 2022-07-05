<?php

include("../../conexion.php");
$busca = $_POST['fecha1'];
$busca1 = $_POST['fecha2'];
$ob = $_POST['obra_social'];

//si obra social no esta que busque todas
if ($ob === "all") {
    $query = ("select * from consultas where fechaConsulta between '$busca' and '$busca1' order by fechaConsulta");
    $resultado = mysqli_query($conexion, $query);
} else {
    $query = ("select * from consultas where ObraSocial_Paciente='$ob' and fechaConsulta between '$busca' and '$busca1' order by fechaConsulta");
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
