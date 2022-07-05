<?php
include "../../conexion.php";
if (isset($_POST["id_obrasocial_valores"])) {
    $query = "SELECT valor_consulta FROM valores_cobro_consultas WHERE id_obraSocial = '" . $_POST["id_obrasocial_valores"] . "' AND codigo_consulta = '" . $_POST["codigo_consulta_valores"] . "' ";
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_array($result);
    $valor = $row['valor_consulta'];

    if ($valor != 0) {
        echo $valor;
    } else {
        return 0;
    }
} else {
    echo "La obra social no ha sido enviada";
}
