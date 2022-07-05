<?php 
include "../../conexion.php";
if(isset($_POST["id_mini"]))  
 {  
    $id=$_POST["id_mini"];
    $del = "delete from consultas where idConsulta='$id'";
    $query = mysqli_query($conexion,$del) or die(mysqli_error($conexion));
    if($query){
        echo "ok";
    }else{
        echo "error";
    }
 }  
?>