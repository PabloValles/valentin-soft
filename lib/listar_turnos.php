<?php

include("../conexion.php");

$query = ("SELECT * from calendar order by startdate desc");
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


?>
