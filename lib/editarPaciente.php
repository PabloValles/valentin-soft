<?php
include("../conexion.php");
sleep(1);
error_reporting(0);
$opcion=$_REQUEST['opcion'];
$paciente=$_REQUEST['id_paciente_gral'];

if($opcion === "modificar_paciente"){
    
    $apellido_paciente = mysqli_real_escape_string($conexion, $_POST['apellido_paciente']);
    $nombre_paciente = mysqli_real_escape_string($conexion, $_POST['nombre_paciente']);
    $fecha_nacimiento_paciente = mysqli_real_escape_string($conexion, $_POST['nacimiento_pac']);
    $edad_paciente = mysqli_real_escape_string($conexion, $_POST['edad_paciente']); //ok
    $dni_paciente = mysqli_real_escape_string($conexion, $_POST['dni_paciente']);
    $tel_paciente = mysqli_real_escape_string($conexion, $_POST['tel_paciente']);
    $prof_paciente = mysqli_real_escape_string($conexion, $_POST['prof_paciente']);
    $empresa_paciente = mysqli_real_escape_string($conexion, $_POST['empresa_paciente']); //OK
    $osocial_paciente = mysqli_real_escape_string($conexion, $_POST['obsocial_pac']);
    $plan_osocial_paciente = mysqli_real_escape_string($conexion, $_POST['plan_osocial_pac']);
    $nro_osocial_paciente = mysqli_real_escape_string($conexion, $_POST['nro_osocial_pac']);//OK

    $desde_paciente_pre = mysqli_real_escape_string($conexion, $_POST['desde_paciente']);//OK
    $hasta_paciente_pre = mysqli_real_escape_string($conexion, $_POST['hasta_paciente']);//OK
    $desde_paciente = $desde_paciente_pre."-01";
    $hasta_paciente = $hasta_paciente_pre."-01";

    $dire_paciente = mysqli_real_escape_string($conexion, $_POST['dire_paciente']);
    $contacto_paciente = mysqli_real_escape_string($conexion, $_POST['contacto_paciente']);
    $email_paciente = mysqli_real_escape_string($conexion, $_POST['email_paciente']);//ok
    $gs_paciente = mysqli_real_escape_string($conexion, $_POST['GS_paciente']);
    $estado_civil_pac = mysqli_real_escape_string($conexion, $_POST['estado_civil_paciente']);
    $fecha_1_consulta_paciente = mysqli_real_escape_string($conexion, $_POST['fecha_1_consulta_paciente']);
    $motivo_consulta_paciente = mysqli_real_escape_string($conexion, $_POST['motivo_paciente']);
    $notas= mysqli_real_escape_string($conexion, $_POST['notas_adicionales_paciente']);
    //-------------------- ok datos personales -----------------------------------------------
    $id_antecedentes_p = mysqli_real_escape_string ($conexion, $_POST['id_antecedentes_p']);
    $ch_pac_diab = mysqli_real_escape_string ($conexion, $_POST['ch_pac_diab']);
    $ch_pac_hiper = mysqli_real_escape_string ($conexion, $_POST['ch_pac_hiper']);
    $ch_pac_hipo = mysqli_real_escape_string ($conexion, $_POST['ch_pac_hipo']);
    $ch_pac_tabaq = mysqli_real_escape_string ($conexion, $_POST['ch_pac_tabaq']);
        # fin cheqboxes
    $peso_pac = mysqli_real_escape_string ($conexion, $_POST['peso_pac']);
    $altura_pac = mysqli_real_escape_string ($conexion, $_POST['altura_pac']);
    $imc_pac = mysqli_real_escape_string ($conexion, $_POST['imc_pac']);
    $ant_alergicos_pac = mysqli_real_escape_string ($conexion, $_POST['ant_alergicos_pac']);
    $ant_clinicos_pac = mysqli_real_escape_string ($conexion, $_POST['ant_clinicos_pac']);
    $ant_quir_pac = mysqli_real_escape_string ($conexion, $_POST['ant_quir_pac']);
    $farmacos_pac = mysqli_real_escape_string ($conexion, $_POST['farmacos_pac']);
    $notas_heredo_fam_pac = mysqli_real_escape_string ($conexion, $_POST['notas_heredo_fam_pac']);
    $madre_pac = mysqli_real_escape_string ($conexion, $_POST['madre_pac']);
    $padre_pac = mysqli_real_escape_string ($conexion, $_POST['padre_pac']);
    $otros_pac = mysqli_real_escape_string ($conexion, $_POST['otros_pac']);
    //-------------------- ok antecendetes personales--------------------------------------------
    $id_antecedentes_g = mysqli_real_escape_string ($conexion, $_POST['id_antecedentes_g']);
    $menarca_pac = mysqli_real_escape_string ($conexion, $_POST['menarca_pac']);
    $rm_pac = mysqli_real_escape_string ($conexion, $_POST['rm_pac']);
    $menopausia_pac = mysqli_real_escape_string ($conexion, $_POST['menopausia_pac']);
    $gestas_pac = mysqli_real_escape_string ($conexion, $_POST['gestas_pac']);
    $partos_pac = mysqli_real_escape_string ($conexion, $_POST['partos_pac']);
    $cs_pac = mysqli_real_escape_string ($conexion, $_POST['cs_pac']);
    $ab_pac = mysqli_real_escape_string ($conexion, $_POST['ab_pac']);
    $ee_pac = mysqli_real_escape_string ($conexion, $_POST['ee_pac']);
    $fum_pac = mysqli_real_escape_string ($conexion, $_POST['fum_pac']);
    $dismenorrea_pac = mysqli_real_escape_string ($conexion, $_POST['dismenorrea_pac']);
    $tipo_anticoncep_pac = mysqli_real_escape_string ($conexion, $_POST['tipo_anticoncep_pac']);
    $tiempo_anticoncep_pac = mysqli_real_escape_string ($conexion, $_POST['tiempo_anticoncep_pac']);
    $notas_anticoncep_pac = mysqli_real_escape_string ($conexion, $_POST['notas_anticoncep_pac']);
    $cirug_ginec_pac = mysqli_real_escape_string ($conexion, $_POST['cirug_ginec_pac']);
    //-------------------- ok antecendetes ginecológicos--------------------------------------------
    
    $query_dp = "update pacientes SET apellido_pac='$apellido_paciente',
                                   nombre_pac='$nombre_paciente',
                                   fecha_nacimiento='$fecha_nacimiento_paciente',
                                   edad_pac='$edad_paciente',
                                   dni_pac='$dni_paciente',
                                   tel_paciente='$tel_paciente',
                                   profesion_pac='$prof_paciente',
                                   empresa_pac='$empresa_paciente',
                                   obsocial_pac='$osocial_paciente',
                                   plan_obsocial_pac='$plan_osocial_paciente',
                                   nro_obsocial_pac='$nro_osocial_paciente',
                                   desde_pac='$desde_paciente',
                                   hasta_pac='$hasta_paciente',
                                   estado_civil_pac='$estado_civil_pac',
                                   direc_pac='$dire_paciente',
                                   contacto_pac='$contacto_paciente',
                                   mail='$email_paciente',
                                   gru_sanguineo_pac='$gs_paciente',
                                   fecha_primera_consulta='$fecha_1_consulta_paciente',
                                   motivo_consulta='$motivo_consulta_paciente',
                                   notas='$notas' where id_paciente = $paciente";
    $modFirst = mysqli_query($conexion,$query_dp) or die(mysqli_error($conexion));
    
    if($modFirst){
        // update another two tables..
        $query_ap="update antecedentes_personales SET diabetes='$ch_pac_diab',
                                        hipertension='$ch_pac_hiper',
                                        hipotiroidismo='$ch_pac_hipo',
                                        tabaquismo='$ch_pac_tabaq',
                                        peso='$peso_pac',
                                        altura='$altura_pac',
                                        imc='$imc_pac',
                                        antecedentes_alergico='$ant_alergicos_pac',
                                        antecedentes_clinicos='$ant_clinicos_pac',
                                        antecedentes_quirurgicos='$ant_quir_pac',
                                        farmacos='$farmacos_pac',
                                        madre='$madre_pac',
                                        padre='$padre_pac',
                                        otros_antecedentes='$otros_pac',
                                        notas_antecedentes='$notas_heredo_fam_pac' where id_antecedente='$id_antecedentes_p' and id_paciente='$paciente'";
        $modSecond = mysqli_query($conexion,$query_ap) or die(mysqli_error($conexion));
        $query_ag="update antecedentes_ginecoobs SET menarca_pac='$menarca_pac',
                                        rm_pac='$rm_pac',
                                        menopausia_pac='$menopausia_pac',
                                        gestas_pac='$gestas_pac',
                                        partos_pac='$partos_pac',
                                        cs_pac='$cs_pac',
                                        ab_pac='$ab_pac',
                                        ee_pac='$ee_pac',
                                        fum_pac='$fum_pac',
                                        dismenorrea_pac='$dismenorrea_pac',
                                        tipo_anticoncep_pac='$tipo_anticoncep_pac',
                                        tiempo_anticoncep_pac='$tiempo_anticoncep_pac',
                                        notas_anticoncep_pac='$notas_anticoncep_pac',
                                        cirug_ginec_pac='$cirug_ginec_pac' where id_ginecoObs='$id_antecedentes_g' and id_paciente='$paciente'";
        $mod3 = mysqli_query($conexion,$query_ag) or die(mysqli_error($conexion));
        // notify
        ?>
        <meta http-equiv="refresh" content="1">
        <script>
            Command: toastr["success"]("Excelente has modificado corretamente el paciente")
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
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
        </button>
            <strong>Excelente</strong> Su consulta ha sido gestionada con éxito. <br>
        </div>
        <?php
        
    }
                                      
    
}else{
    echo "opcion no enviada";
}
