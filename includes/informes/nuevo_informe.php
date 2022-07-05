<?php

include("../../conexion.php");
//$busca=$_POST['mes'];
//$busca1=$_POST['year'];

//si obra social no esta que busque todas
$query = "select nombre_pac, apellido_pac, obsocial_pac, fum_ficha, fpp_ficha, terminacion, htal_ficha, tipo_terminacion from pacientes as p INNER JOIN ficha_obstetrica as f ON p.id_paciente=f.id_paciente_ficha where terminacion!=0 order by terminacion";
$resultado = mysqli_query($conexion,$query);
    
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