<?php
include "../../conexion.php";
sleep(1);
error_reporting(0);
$opcion=$_REQUEST['opcion'];

if($opcion === "eliminar"){
    $idpaciente= mysqli_real_escape_string($conexion, $_POST['id_pac']);
    $id = mysqli_real_escape_string($conexion, $_POST['id_examen']);
    $query="delete from examen_fisico where id_examen_fisico='$id'";
    $del=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
    
    if($del){
        ?>
        <meta http-equiv="refresh" content="2, editaPaciente.php?accion=<?php echo $idpaciente;?>">
        <script>
            Command: toastr["error"]("Excelente has eliminado corretamente el examen")
            toastr.options = {
              "closeButton": false,
              "debug": true,
              "newestOnTop": false,
              "progressBar": true,
              "positionClass": "toast-top-full-width",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }
        </script>
        <?php
        
    }
                                      
    
}else{
    echo "opcion no enviada";
}