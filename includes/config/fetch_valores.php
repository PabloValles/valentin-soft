<?php
//fetch.php  
include "../../conexion.php";
if (isset($_POST["id_fila"])) {
    //$query = "SELECT * FROM valores_cobro_consultas WHERE id_valores = '" . $_POST["id_fila"] . "'";
    $query = "select * from valores_cobro_consultas INNER JOIN osociales ON valores_cobro_consultas.id_obraSocial=osociales.id WHERE valores_cobro_consultas.id_valores = '" . $_POST["id_fila"] . "'";
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}
