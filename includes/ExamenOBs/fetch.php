   <?php  
 //fetch.php  
include "../../conexion.php";
 if(isset($_POST["id_fila"]))  
 {  
      $query = "SELECT * FROM tabla_examen_obstetrico WHERE id_examen_obs = '".$_POST["id_fila"]."'";  
      $result = mysqli_query($conexion, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>

 