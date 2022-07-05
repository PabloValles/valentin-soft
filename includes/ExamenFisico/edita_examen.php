<?php
include "../../conexion.php";
sleep(1);
error_reporting(0);
$opcion=$_REQUEST['opcion'];

if($opcion === "modificar"){
    
    $id_paciente_gral = mysqli_real_escape_string($conexion, $_POST['id_paciente_gral']);
    $id_examen = mysqli_real_escape_string($conexion, $_POST['id_examen']);
    $fecha_ex_fisico_pac = mysqli_real_escape_string($conexion, $_POST['fecha_ex_fisico_pac']);
    $mc_pac = mysqli_real_escape_string($conexion, $_POST['mc_pac']);
    $ex_fisico_pac = mysqli_real_escape_string($conexion, $_POST['ex_fisico_pac']); //ok
    $colpos = mysqli_real_escape_string($conexion, $_POST['colpos']);
    $pap = mysqli_real_escape_string($conexion, $_POST['pap']);
    $ginecologica = mysqli_real_escape_string($conexion, $_POST['ginecologica']);
    $mamaria = mysqli_real_escape_string($conexion, $_POST['mamaria']); //OK
    $mamografia = mysqli_real_escape_string($conexion, $_POST['mamografia']);
    $otros_ex_fis_pac = mysqli_real_escape_string($conexion, $_POST['otros_ex_fis_pac']);
    $notas_ex_fis_pac = mysqli_real_escape_string($conexion, $_POST['notas_ex_fis_pac']);
    
    $query_dp = "update examen_fisico SET fecha_ex_fisico_pac='$fecha_ex_fisico_pac',
                                   mc_pac='$mc_pac',
                                   ex_fisico_pac='$ex_fisico_pac',
                                   colpos_pac='$colpos',
                                   pap_pac='$pap',
                                   eco_ginec_pac='$ginecologica',
                                   eco_mam_pac='$mamaria',
                                   mamograf_pac='$mamografia',
                                   otros_ex_fis_pac='$otros_ex_fis_pac',
                                   notas_ex_fis_pac='$notas_ex_fis_pac' 
                                   where id_examen_fisico = '$id_examen' and idPaciente_ex_fisico='$id_paciente_gral'";
    $modFirst = mysqli_query($conexion,$query_dp) or die(mysqli_error($conexion));
    
    if($modFirst){
        ?>
        <meta http-equiv="refresh" content="2">
        <script>
            Command: toastr["success"]("Excelente has modificado corretamente el examen")
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "newestOnTop": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "2000",
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
