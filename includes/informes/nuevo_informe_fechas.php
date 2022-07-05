<?php

include("../../conexion.php");
$busca=$_POST['month'];
$busca1=$_POST['year'];
switch ($busca) {
    case 'Enero':
        $busca="1";
        break;
    case 'Febrero':
        $busca="2";
        break;
    case 'Marzo':
        $busca="3";
        break;
    case 'Abril':
        $busca="4";
        break;
    case 'Mayo':
        $busca="5";
        break;
    case 'Junio':
        $busca="6";
        break;
    case 'Julio':
        $busca="7";
        break;
    case 'Agosto':
        $busca="8";
        break;
    case 'Septiembre':
        $busca="9";
        break;
    case 'Octubre':
        $busca="10";
        break;
    case 'Noviembre':
        $busca="11";
        break;
    case 'Diciembre':
        $busca="12";
        break;
    default:
        $busca="Error";
        break; //swich meses a español
}

//si obra social no esta que busque todas
$resultado = mysqli_query($conexion,"select nombre_pac,apellido_pac,obsocial_pac, terminacion from pacientes as p INNER JOIN ficha_obstetrica as f ON p.id_paciente=f.id_paciente_ficha where MONTH(terminacion)='$busca' AND YEAR(terminacion)='$busca1' order by obsocial_pac") or die(mysqli_error($conexion));

if(!$resultado){
    die("error");
}else{
    $arreglo = []; //Cuando no haya registros, el arreglo se enviará vacio
    while( $data = mysqli_fetch_assoc($resultado)) {
        $arreglo["data"][] = array_map("utf8_encode", $data); //aca le pasamos todos los resultados.
    }
    echo json_encode($arreglo, JSON_UNESCAPED_UNICODE);
}

mysqli_free_result($resultado);
mysqli_close($conexion);