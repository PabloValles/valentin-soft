<?php
//fetch.php  
include "../../conexion.php";
if (isset($_POST["id_fila"])) {
    $query = "SELECT * FROM tipo_consultas WHERE id_tipo = '" . $_POST["id_fila"] . "'";
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}
