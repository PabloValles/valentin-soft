<?php 
include "../../conexion.php";
if(isset($_POST["id_fila"]))  
 {  
    $id=$_POST["id_fila"];
    $del = "delete from ficha_obstetrica where id_ficha='$id'";
    $query = mysqli_query($conexion,$del) or die(mysqli_error($conexion));
    if($query){
        echo "ok";
    }else{
        echo "error";
    }
 }  
?>

 