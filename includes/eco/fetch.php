   <?php  
 //fetch.php  
include "../../conexion.php";
 if(isset($_POST["id_fila"]))  
 {  
      $query = "SELECT * FROM tabla_ecografias WHERE id_eco = '".$_POST["id_fila"]."'";  
      $result = mysqli_query($conexion, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
