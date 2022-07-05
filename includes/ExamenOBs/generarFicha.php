<?php
include "../../conexion.php";
$id = $_REQUEST['id'];

$q = "insert into ficha_obstetrica(id_paciente_ficha) values($id)";
$consulta = mysqli_query($conexion,$q) or die(mysqli_error("error: ".$conexion));

if($consulta){
    $sql = "select @@IDENTITY AS ID";
    $query = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
    $id_ficha = $row['ID'];
    //echo $id_ficha;
    ?>
    
    <meta http-equiv="refresh" content="0, url=../../new_ficha_obs.php?id=<?php echo $id_ficha;?>"/>
    <?php
}
else{
    die(mysqli_error("error: ".$conexion));
    location("../../pacientes.php");
}