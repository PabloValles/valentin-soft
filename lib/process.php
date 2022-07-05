<?php
include("../conexion.php");
sleep(1);
error_reporting(0);

$opcion = $_REQUEST['opcion'];
/*
opciones -> nuevo, edit, delete;
*/

if (isset($opcion)) {

    if ($opcion === "nuevo") {

        $tag = $_REQUEST['tag'];

        if ($tag === "paciente") {
            $apellido_paciente = mysqli_real_escape_string($conexion, $_POST['apellido_paciente']);
            $nombre_paciente = mysqli_real_escape_string($conexion, $_POST['nombre_paciente']);
            $fecha_nacimiento_paciente = mysqli_real_escape_string($conexion, $_POST['nacimiento_pac']);
            $edad_paciente = mysqli_real_escape_string($conexion, $_POST['edad_paciente']);
            $dni_paciente = mysqli_real_escape_string($conexion, $_POST['dni_paciente']);
            $tel_paciente = mysqli_real_escape_string($conexion, $_POST['tel_paciente']);
            $prof_paciente = mysqli_real_escape_string($conexion, $_POST['prof_paciente']);
            $empresa_paciente = mysqli_real_escape_string($conexion, $_POST['empresa_paciente']);
            $osocial_paciente = mysqli_real_escape_string($conexion, $_POST['osocial_paciente']);
            $plan_osocial_paciente = mysqli_real_escape_string($conexion, $_POST['plan_osocial_pac']);
            $nro_osocial_paciente = mysqli_real_escape_string($conexion, $_POST['nro_osocial_pac']);
            $f_desde = "2018-01-01";
            $f_hasta = "2022-01-01";
            $dire_paciente = mysqli_real_escape_string($conexion, $_POST['dire_paciente']);
            $contacto_paciente = mysqli_real_escape_string($conexion, $_POST['contacto_paciente']);
            $email_paciente = mysqli_real_escape_string($conexion, $_POST['email_paciente']);
            $gs_paciente = mysqli_real_escape_string($conexion, $_POST['GS_paciente']);
            $fecha_1_consulta_paciente = mysqli_real_escape_string($conexion, $_POST['fecha_1_consulta_paciente']);
            $motivo_consulta_paciente = mysqli_real_escape_string($conexion, $_POST['motivo_paciente']);
            $notas = mysqli_real_escape_string($conexion, $_POST['notas_adicionales_paciente']);
            $estado_civil_pac = mysqli_real_escape_string($conexion, $_POST['estado_civil_paciente']);
            // verificación DNI
            $ver_dni = mysqli_query($conexion, "SELECT dni_pac from pacientes where dni_pac='$dni_paciente'");

            if (mysqli_num_rows($ver_dni) > 0) {
                echo "Error en DNI. El mismo ya ha sido registrado a otro paciente.";
?>
                <meta http-equiv="refresh" content="2, pacientes.php">
                <?php
            } else {
                $consulta = "insert into pacientes(apellido_pac,nombre_pac,fecha_nacimiento,edad_pac,dni_pac,tel_paciente,profesion_pac,empresa_pac,obsocial_pac,plan_obsocial_pac,nro_obsocial_pac,desde_pac,hasta_pac,estado_civil_pac,direc_pac,contacto_pac,mail,gru_sanguineo_pac,fecha_primera_consulta,motivo_consulta,notas) values('$apellido_paciente','$nombre_paciente','$fecha_nacimiento_paciente','$edad_paciente','$dni_paciente','$tel_paciente','$prof_paciente','$empresa_paciente','$osocial_paciente','$plan_osocial_paciente','$nro_osocial_paciente','$f_desde','$f_hasta','$estado_civil_pac','$dire_paciente','$contacto_paciente','$email_paciente','$gs_paciente','$fecha_1_consulta_paciente','$motivo_consulta_paciente','$notas')";

                $ins = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                if ($ins) {
                    $query_ultimo_pac = mysqli_query($conexion, "SELECT id_paciente from pacientes order by id_paciente desc limit 1");
                    while ($ask = mysqli_fetch_array($query_ultimo_pac)) {
                        $id_u_pac = $ask['id_paciente'];
                    }

                    //ahora insertamos las 2 tablas que nos quedan...
                    $ch_pac_diab = mysqli_real_escape_string($conexion, $_POST['ch_pac_diab']);
                    $ch_pac_hiper = mysqli_real_escape_string($conexion, $_POST['ch_pac_hiper']);
                    $ch_pac_hipo = mysqli_real_escape_string($conexion, $_POST['ch_pac_hipo']);
                    $ch_pac_tabaq = mysqli_real_escape_string($conexion, $_POST['ch_pac_tabaq']);
                    $peso_pac = mysqli_real_escape_string($conexion, $_POST['peso_pac']);
                    $altura_pac = mysqli_real_escape_string($conexion, $_POST['altura_pac']);
                    $imc_pac = mysqli_real_escape_string($conexion, $_POST['imc_pac']);
                    $ant_alergicos_pac = mysqli_real_escape_string($conexion, $_POST['ant_alergicos_pac']);
                    $ant_clinicos_pac = mysqli_real_escape_string($conexion, $_POST['ant_clinicos_pac']);
                    $ant_quir_pac = mysqli_real_escape_string($conexion, $_POST['ant_quir_pac']);
                    $farmacos_pac = mysqli_real_escape_string($conexion, $_POST['farmacos_pac']);
                    $madre_pac = mysqli_real_escape_string($conexion, $_POST['madre_pac']);
                    $padre_pac = mysqli_real_escape_string($conexion, $_POST['padre_pac']);
                    $otros_pac = mysqli_real_escape_string($conexion, $_POST['otros_pac']);
                    $notas_heredo_fam_pac = mysqli_real_escape_string($conexion, $_POST['notas_heredo_fam_pac']);
                    // ===============================
                    $menarca_pac = mysqli_real_escape_string($conexion, $_POST['menarca_pac']);
                    $rm_pac = mysqli_real_escape_string($conexion, $_POST['rm_pac']);
                    $menopausia_pac = mysqli_real_escape_string($conexion, $_POST['menopausia_pac']);
                    $gestas_pac = mysqli_real_escape_string($conexion, $_POST['gestas_pac']);
                    $partos_pac = mysqli_real_escape_string($conexion, $_POST['partos_pac']);
                    $cs_pac = mysqli_real_escape_string($conexion, $_POST['cs_pac']);
                    $ab_pac = mysqli_real_escape_string($conexion, $_POST['ab_pac']);
                    $ee_pac = mysqli_real_escape_string($conexion, $_POST['ee_pac']);
                    $fum_pac = mysqli_real_escape_string($conexion, $_POST['fum_pac']);
                    $dismenorrea_pac = mysqli_real_escape_string($conexion, $_POST['dismenorrea_pac']);
                    $tipo_anticoncep_pac = mysqli_real_escape_string($conexion, $_POST['tipo_anticoncep_pac']);
                    $tiempo_anticoncep_pac = mysqli_real_escape_string($conexion, $_POST['tiempo_anticoncep_pac']);
                    $notas_anticoncep_pac = mysqli_real_escape_string($conexion, $_POST['notas_anticoncep_pac']);
                    $cirug_ginec_pac = mysqli_real_escape_string($conexion, $_POST['cirug_ginec_pac']);

                    $ins2 = mysqli_query($conexion, "INSERT INTO antecedentes_personales(diabetes,hipertension,hipotiroidismo,tabaquismo,peso,altura,imc,antecedentes_alergico,antecedentes_clinicos,antecedentes_quirurgicos,farmacos,madre,padre,otros_antecedentes,notas_antecedentes,id_paciente) VALUES ('$ch_pac_diab','$ch_pac_hiper','$ch_pac_hipo','$ch_pac_tabaq','$peso_pac','$altura_pac','$imc_pac','$ant_alergicos_pac','$ant_clinicos_pac','$ant_quir_pac','$farmacos_pac','$madre_pac','$padre_pac','$otros_pac','$notas_heredo_fam_pac','$id_u_pac')") or die(mysqli_error($conexion));

                    $ins3 = mysqli_query($conexion, "INSERT INTO antecedentes_ginecoobs(menarca_pac,rm_pac,menopausia_pac,gestas_pac,partos_pac,cs_pac,ab_pac,ee_pac,fum_pac,dismenorrea_pac,tipo_anticoncep_pac,tiempo_anticoncep_pac,notas_anticoncep_pac,cirug_ginec_pac,id_paciente) VALUES ('$menarca_pac','$rm_pac','$menopausia_pac','$gestas_pac','$partos_pac','$cs_pac','$ab_pac','$ee_pac','$fum_pac','$dismenorrea_pac','$tipo_anticoncep_pac','$tiempo_anticoncep_pac','$notas_anticoncep_pac','$cirug_ginec_pac','$id_u_pac')") or die(mysqli_error($conexion));

                    if ($ins2 && $ins3) {
                        success("paciente", "guardado");
                ?>
                        <meta http-equiv="refresh" content="2, pacientes.php">
                <?php
                    } else {
                        danger("paciente", "guardar");
                    }
                }
            }
        } elseif ($tag === "usuario") {
        } elseif ($tag === "examen_fisico") {
            $fecha_ex_fisico_pac = $_POST['fecha_ex_fisico_pac'];
            $mc_pac = $_POST['mc_pac'];
            $ex_fisico_pac = $_POST['ex_fisico_pac'];
            $colpos = $_POST['colpos'];
            $pap = $_POST['pap'];
            $ginecologica = $_POST['ginecologica'];
            $mamaria = $_POST['mamaria'];
            $mamografia = $_POST['mamografia'];
            $otros_ex_fis_pac = $_POST['otros_ex_fis_pac'];
            $notas_ex_fis_pac = $_POST['notas_ex_fis_pac'];
            $idPaciente_ex_fisico = $_POST['id_paciente_gral'];

            $consulta = "insert into examen_fisico(fecha_ex_fisico_pac,mc_pac,ex_fisico_pac,colpos_pac,pap_pac,eco_ginec_pac,eco_mam_pac,mamograf_pac,otros_ex_fis_pac,notas_ex_fis_pac,idPaciente_ex_fisico) values('$fecha_ex_fisico_pac','$mc_pac','$ex_fisico_pac','$colpos','$pap','$ginecologica','$mamaria','$mamografia','$otros_ex_fis_pac','$notas_ex_fis_pac','$idPaciente_ex_fisico')";
            $query = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
            if ($query) {
                ?>
                <div class="col-md-12 col-lg-12">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                        </button>
                        <strong>Has agregado una nueva ficha</strong> <br>
                    </div>
                </div>
            <?php
            } else {
                echo "error en la consulta";
            }
        } elseif ($tag === "consulta") {

            $id_paciente_consulta = $_POST['id_paciente_consulta'];
            $apellido = $_POST['apellido'];
            $nombre = $_POST['nombre'];
            $dni = $_POST['dni'];
            $Obra_social = $_POST['Obra_social'];
            $Plan = $_POST['Plan'];
            $N_obrasocial = $_POST['N_obrasocial'];
            $fechaConsulta = $_POST['fechaConsulta'];
            $tipo = $_POST['tipo_consulta'];
            $tipo2 = $_POST['tipo_consulta_escrito'];
            $cod = $_POST['cod'];
            $mc = $_POST['mc'];
            $liq = $_POST['liq'];


            if ($tipo === "") {
                $tipo_final = $tipo2;
            } elseif ($tipo2 === "") {
                $tipo_final = $tipo;
            }

            $reg = "INSERT INTO consultas(idPacienteConsulta,Apellido_Paciente,Nombre_Paciente,dni_pac_consul,ObraSocial_Paciente,plan,nro,fechaConsulta,tipoConsulta,cod,MotivoConsulta,liq) VALUES ('$id_paciente_consulta','$apellido','$nombre','$dni','$Obra_social','$Plan','$N_obrasocial','$fechaConsulta','$tipo_final','$cod','$mc','$liq')";
            $query = mysqli_query($conexion, $reg) or die(mysqli_error($conexion));

            if ($query) {
                success("consulta", "agregado");

                $verify_tipo = "select nombre_tipo from tipo_consultas where nombre_tipo='$tipo_final'";
                $do_verify = mysqli_query($conexion, $verify_tipo) or die(mysqli_error($conexion));
                if (mysqli_num_rows($do_verify) < 1) {
                    $add_tipo = "INSERT into tipo_consultas(nombre_tipo,codigo_tipo) VALUES ('$tipo_final', '$cod')";
                    $registrar_tipo = mysqli_query($conexion, $add_tipo) or die(mysqli_error($conexion));
                }

            ?>
                <input type="hidden" value="<?php echo $id_paciente_consulta; ?>" id="swal_ok">
                <script>
                    swal({
                        title: "Desea imprimir la órden de consulta?",
                        text: "Se generará un pdf para imiprimir, de lo contrario volverá a consultas.",
                        type: "success",
                        showCancelButton: true,
                        confirmButtonClass: 'btn-success',
                        confirmButtonText: "Imprimir",
                        closeOnConfirm: false
                    }, function() {
                        var id = $('#swal_ok').val();
                        window.location.href = "ordenes/orden_consulta.php?id_orden=" + id;
                        swal.close();
                    });
                </script>
            <?php
            } else {
                die("error");
            }
        } elseif ($tag === "mini_tabla_1") {
            $id_ficha_obstetrica_tabla_examen = mysqli_real_escape_string($conexion, $_POST['id_ficha_gral']);
            $fecha_ex_obs = mysqli_real_escape_string($conexion, $_POST['fecha_ex_obs']);
            $eg_ex_obs = mysqli_real_escape_string($conexion, $_POST['eg_ex_obs']);
            $pa_ex_obs = mysqli_real_escape_string($conexion, $_POST['pa_ex_obs']);
            $au_ex_obs = mysqli_real_escape_string($conexion, $_POST['au_ex_obs']);
            $ta_ex_obs = mysqli_real_escape_string($conexion, $_POST['ta_ex_obs']);
            $lcf_ex_obs = mysqli_real_escape_string($conexion, $_POST['lcf_ex_obs']);
            $edema_ex_obs = mysqli_real_escape_string($conexion, $_POST['edema_ex_obs']);
            $datos_ex_obs = mysqli_real_escape_string($conexion, $_POST['datos_ex_obs']);
            $id = mysqli_real_escape_string($conexion, $_POST['id_examen_obs']);
            if ($id != '') {
                $q = "update tabla_examen_obstetrico set fecha_ex_obss='$fecha_ex_obs', eg_ex_obss='$eg_ex_obs',  pa_ex_obss='$pa_ex_obs', au_ex_obss='$au_ex_obs', ta_ex_obss='$ta_ex_obs', lcf_ex_obss='$lcf_ex_obs', edema_ex_obss='$edema_ex_obs', datos_ex_obss='$datos_ex_obs' where id_examen_obs='$id'";
                $query = mysqli_query($conexion, $q) or die(mysqli_error($conexion));
            } else {
                $q = "insert into tabla_examen_obstetrico(id_ficha_obss,fecha_ex_obss,eg_ex_obss,pa_ex_obss,au_ex_obss,ta_ex_obss,lcf_ex_obss,edema_ex_obss,datos_ex_obss) values('$id_ficha_obstetrica_tabla_examen','$fecha_ex_obs','$eg_ex_obs','$pa_ex_obs','$au_ex_obs','$ta_ex_obs','$lcf_ex_obs','$edema_ex_obs','$datos_ex_obs')";
                $query = mysqli_query($conexion, $q) or die(mysqli_error($conexion));
            }
        } elseif ($tag === "mini_tabla_2") {
            $id_ficha_obstetrica_tabla_eco = mysqli_real_escape_string($conexion, $_POST['id_ficha_gral']);
            $fecha_eco = mysqli_real_escape_string($conexion, $_POST['fecha_eco']);
            $eg_eco = mysqli_real_escape_string($conexion, $_POST['eg_eco']);
            $dbp_eco = mysqli_real_escape_string($conexion, $_POST['dbp_eco']);
            $pa_eco = mysqli_real_escape_string($conexion, $_POST['pa_eco']);
            $lf_eco = mysqli_real_escape_string($conexion, $_POST['lf_eco']);
            $plac_eco = mysqli_real_escape_string($conexion, $_POST['plac_eco']);
            $grado_eco = mysqli_real_escape_string($conexion, $_POST['grado_eco']);
            $la_eco = mysqli_real_escape_string($conexion, $_POST['la_eco']);
            $pef_eco = mysqli_real_escape_string($conexion, $_POST['pef_eco']);
            $p_eco = mysqli_real_escape_string($conexion, $_POST['p_eco']);
            $ipaud = mysqli_real_escape_string($conexion, $_POST['ipaud']);
            $ipaui = mysqli_real_escape_string($conexion, $_POST['ipaui']);
            $id = mysqli_real_escape_string($conexion, $_POST['id_tab_eco']);
            if ($id != '') {
                $q = "update tabla_ecografias set fecha_eco='$fecha_eco', eg_eco='$eg_eco',  dbp_eco='$dbp_eco', pa_eco='$pa_eco', lf_eco='$lf_eco', plac_eco='$plac_eco', grado_eco='$grado_eco', la_eco='$la_eco', pef_eco='$pef_eco', p_eco='$p_eco', ipaud_eco='$ipaud', ipaui_eco='$ipaui' where id_eco='$id'";
                $query = mysqli_query($conexion, $q) or die(mysqli_error($conexion));
            } else {
                $q = "insert into tabla_ecografias(id_ficha_obstetrica,fecha_eco,eg_eco,dbp_eco,pa_eco,lf_eco,plac_eco,grado_eco,la_eco,pef_eco,p_eco,ipaud_eco,ipaui_eco) values('$id_ficha_obstetrica_tabla_eco','$fecha_eco','$eg_eco','$dbp_eco','$pa_eco','$lf_eco','$plac_eco','$grado_eco','$la_eco','$pef_eco','$p_eco','$ipaud','$ipaui')";
                $query = mysqli_query($conexion, $q) or die(mysqli_error($conexion));
            }
        } elseif ($tag === "mini_tabla_3") {
            $id_ficha_obstetrica_tabla_lab = mysqli_real_escape_string($conexion, $_POST['id_ficha_gral']);
            $fechaLab = mysqli_real_escape_string($conexion, $_POST['fechaLab']);
            $htoLab = mysqli_real_escape_string($conexion, $_POST['htoLab']);
            $hbLab = mysqli_real_escape_string($conexion, $_POST['hbLab']);
            $plaq = mysqli_real_escape_string($conexion, $_POST['plaq']);
            $gb = mysqli_real_escape_string($conexion, $_POST['gb']);
            $tsh = mysqli_real_escape_string($conexion, $_POST['tsh']);
            $t4l = mysqli_real_escape_string($conexion, $_POST['t4l']);
            $tpo = mysqli_real_escape_string($conexion, $_POST['tpo']);
            $tp = mysqli_real_escape_string($conexion, $_POST['tp']);
            $ttpk = mysqli_real_escape_string($conexion, $_POST['ttpk']);
            $glu = mysqli_real_escape_string($conexion, $_POST['glu']);
            $ur = mysqli_real_escape_string($conexion, $_POST['ur']);
            $creat = mysqli_real_escape_string($conexion, $_POST['creat']);
            $uric = mysqli_real_escape_string($conexion, $_POST['uric']);
            $ldh = mysqli_real_escape_string($conexion, $_POST['ldh']);
            $got = mysqli_real_escape_string($conexion, $_POST['got']);
            $gpt = mysqli_real_escape_string($conexion, $_POST['gpt']);
            $bd = mysqli_real_escape_string($conexion, $_POST['bd']);
            $bi = mysqli_real_escape_string($conexion, $_POST['bi']);
            $bt = mysqli_real_escape_string($conexion, $_POST['bt']);
            $colesterol = mysqli_real_escape_string($conexion, $_POST['colesterol']);
            $hdl = mysqli_real_escape_string($conexion, $_POST['hdl']);
            $ldl = mysqli_real_escape_string($conexion, $_POST['ldl']);
            $tg = mysqli_real_escape_string($conexion, $_POST['tg']);
            $id = mysqli_real_escape_string($conexion, $_POST['id_tab_lab']);
            if ($id != '') {
                $q = "update tabla_laboratorio set fecha_lab='$fechaLab', hto_lab='$htoLab',  hb_lab='$hbLab', plaq_lab='$plaq', gb_lab='$gb', tsh_lab='$tsh', t4l_lab='$t4l', tpo_lab='$tpo', tp_lab='$tp', ttpk_lab='$ttpk', glu_lab='$glu', ur_lab='$ur', creat_lab='$creat', uric_lab='$uric', ldh_lab='$ldh', got_lab='$got', gpt_lab='$gpt', bd_lab='$bd', bi_lab='$bi', bt_lab='$bt', colesterol_lab='$colesterol', hdl_lab='$hdl', ldl_lab='$ldl', tg_lab='$tg' where id_lab='$id'";
                $query = mysqli_query($conexion, $q) or die(mysqli_error($conexion));
            } else {
                $q = "insert into tabla_laboratorio(id_ficha_obstetrica,fecha_lab,hto_lab,hb_lab,plaq_lab,gb_lab,tsh_lab,t4l_lab,tpo_lab,tp_lab,ttpk_lab,glu_lab,ur_lab,creat_lab,uric_lab,ldh_lab,got_lab,gpt_lab,bd_lab,bi_lab,bt_lab,colesterol_lab,hdl_lab,ldl_lab,tg_lab) values('$id_ficha_obstetrica_tabla_lab','$fechaLab','$htoLab','$hbLab','$plaq','$gb','$tsh','$t4l','$tpo','$tp','$ttpk','$glu','$ur','$creat','$uric','$ldh','$got','$gpt','$bd','$bi','$bt','$colesterol','$hdl','$ldl','$tg')";
                $query = mysqli_query($conexion, $q) or die(mysqli_error($conexion));
            }
        } else {
            echo "error tag no enviado";
        }
    } elseif ($opcion === "edit") {
        $tag = $_REQUEST['tag'];
        if ($tag === "ficha_obstetrica") {
            $id_ficha = mysqli_real_escape_string($conexion, $_POST['idFicha']);
            $id_paciente = mysqli_real_escape_string($conexion, $_POST['idPacFicha']);
            $fum_pac_first = mysqli_real_escape_string($conexion, $_POST['fum_pac_first']);
            $fpp_pac_second = mysqli_real_escape_string($conexion, $_POST['fpp_pac_second']);
            $fpp_ok = date('Y-m-d', strtotime($fpp_pac_second));
            $gestas_pac = mysqli_real_escape_string($conexion, $_POST['gestas_pac']);
            $partos_pac = mysqli_real_escape_string($conexion, $_POST['partos_pac']);
            $cs_pac = mysqli_real_escape_string($conexion, $_POST['cs_pac']);
            $ab_pac = mysqli_real_escape_string($conexion, $_POST['ab_pac']);
            $ee_pac = mysqli_real_escape_string($conexion, $_POST['ee_pac']);
            $htal_pac = mysqli_real_escape_string($conexion, $_POST['htal_pac']);
            $grup_sang_pac = mysqli_real_escape_string($conexion, $_POST['grup_sang_pac']);
            $marido_pac = mysqli_real_escape_string($conexion, $_POST['marido_pac']);
            $patolog_pac = mysqli_real_escape_string($conexion, $_POST['patolog_pac']);
            $farmacos_pac = mysqli_real_escape_string($conexion, $_POST['farmacos_pac']);
            $pi_pac = mysqli_real_escape_string($conexion, $_POST['pi_pac']);
            $anteced_pac = mysqli_real_escape_string($conexion, $_POST['anteced_pac']);
            $notas_eco_pac = mysqli_real_escape_string($conexion, $_POST['notas_eco_pac']);
            $tn_eco_pac = mysqli_real_escape_string($conexion, $_POST['tn_eco_pac']);
            $hn_eco_pac = mysqli_real_escape_string($conexion, $_POST['hn_eco_pac']);
            $pres = mysqli_real_escape_string($conexion, $_POST['pres']);
            $notas_imp_eco_pac = mysqli_real_escape_string($conexion, $_POST['notas_imp_eco_pac']);
            $ser_1t_ficha = mysqli_real_escape_string($conexion, $_POST['ser_1t_ficha']);
            $ser_2t_ficha = mysqli_real_escape_string($conexion, $_POST['ser_2t_ficha']);
            $ser_3t_ficha = mysqli_real_escape_string($conexion, $_POST['ser_3t_ficha']);
            $cmv_pac = mysqli_real_escape_string($conexion, $_POST['cmv_pac']);
            $rubeola_pac = mysqli_real_escape_string($conexion, $_POST['rubeola_pac']);
            $uro_1t_pac = mysqli_real_escape_string($conexion, $_POST['uro_1t_pac']);
            $uro_2t_pac = mysqli_real_escape_string($conexion, $_POST['uro_2t_pac']);
            $uro_3t_pac = mysqli_real_escape_string($conexion, $_POST['uro_3t_pac']);
            $eg_input_1a = mysqli_real_escape_string($conexion, $_POST['eg_input_1a']);
            $eg_input_2a = mysqli_real_escape_string($conexion, $_POST['eg_input_2a']);
            $eg_input_1b = mysqli_real_escape_string($conexion, $_POST['eg_input_1b']);
            $eg_input_2b = mysqli_real_escape_string($conexion, $_POST['eg_input_2b']);
            $notas_ctog_pac = mysqli_real_escape_string($conexion, $_POST['notas_ctog_pac']);
            $vacunas_pac = mysqli_real_escape_string($conexion, $_POST['vacunas_pac']);
            $input_ch20 = mysqli_real_escape_string($conexion, $_POST['input_ch20']);
            $input_ch24 = mysqli_real_escape_string($conexion, $_POST['input_ch24']);
            $input_ch28 = mysqli_real_escape_string($conexion, $_POST['input_ch28']);
            $strep_pac = mysqli_real_escape_string($conexion, $_POST['strep_pac']);
            $psicoprof_pac = mysqli_real_escape_string($conexion, $_POST['psicoprof_pac']);
            $mad_pac = mysqli_real_escape_string($conexion, $_POST['mad_pac']);
            $lactan_pac = mysqli_real_escape_string($conexion, $_POST['lactan_pac']);
            $nst_pac = mysqli_real_escape_string($conexion, $_POST['nst_pac']);
            $doppler_pac = mysqli_real_escape_string($conexion, $_POST['doppler_pac']);
            $ecocard_pac = mysqli_real_escape_string($conexion, $_POST['ecocard_pac']);
            $notas_muy_imp_pac = mysqli_real_escape_string($conexion, $_POST['notas_muy_imp_pac']);
            $terminacion = mysqli_real_escape_string($conexion, $_POST['f_terminacion']);
            $tipo_terminacion = mysqli_real_escape_string($conexion, $_POST['tipo_terminacion']);

            $consulta = "update ficha_obstetrica set fum_ficha='$fum_pac_first',
                                                  fpp_ficha='$fpp_pac_second',
                                                  fpp_ok='$fpp_ok',
                                                  gestas_ficha='$gestas_pac',
                                                  partos_ficha='$partos_pac',
                                                  cs_ficha='$cs_pac',
                                                  ab_ficha='$ab_pac',
                                                  ee_ficha='$ee_pac',
                                                  htal_ficha='$htal_pac',
                                                  grup_sang_ficha='$grup_sang_pac',
                                                  marido_ficha='$marido_pac',
                                                  patologia_ficha='$patolog_pac',
                                                  farmacos_ficha='$farmacos_pac',
                                                  pi_ficha='$pi_pac',
                                                  antec_ficha='$anteced_pac',
                                                  ecografias_ficha='$notas_eco_pac',
                                                  tn_ficha='$tn_eco_pac',
                                                  hn='$hn_eco_pac',
                                                  pres_ficha='$pres',
                                                  notas_eco_ficha='$notas_imp_eco_pac',
                                                  ser_1t_ficha='$ser_1t_ficha',
                                                  ser_2t_ficha='$ser_2t_ficha',
                                                  ser_3t_ficha='$ser_3t_ficha',
                                                  ser_cmv_ficha='$cmv_pac',
                                                  ser_rubeola_ficha='$rubeola_pac',
                                                  urocul_1t_ficha='$uro_1t_pac',
                                                  urocul_2t_ficha='$uro_2t_pac',
                                                  urocul_3t_ficha='$uro_3t_pac',
                                                  ctog_eg_1='$eg_input_1a',
                                                  ctog_eg_2='$eg_input_2a',
                                                  ctog_eg_3='$eg_input_1b',
                                                  ctog_eg_4='$eg_input_2b',
                                                  ctog_notas='$notas_ctog_pac',
                                                  vacunas_ficha='$vacunas_pac',
                                                  coombs_20_ficha='$input_ch20',
                                                  coombs_24_ficha='$input_ch24',
                                                  coombs_28_ficha='$input_ch28',
                                                  strepto_ficha='$strep_pac',
                                                  psicoprof_ficha='$psicoprof_pac',
                                                  maduracion_ficha='$mad_pac',
                                                  lactan_ficha='$lactan_pac',
                                                  nst_ficha='$nst_pac',
                                                  doppler_ficha='$doppler_pac',
                                                  ecocar_ficha='$ecocard_pac',
                                                  notas_ficha='$notas_muy_imp_pac',
                                                  terminacion='$terminacion',
                                                  tipo_terminacion='$tipo_terminacion'
                                                  where id_ficha='$id_ficha' and id_paciente_ficha='$id_paciente'";

            $query = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
            if ($query) {
                success("ficha", "editado");
                $ask = mysqli_query($conexion, "update antecedentes_ginecoobs set gestas_pac='$gestas_pac',
                                                                                 partos_pac='$partos_pac',
                                                                                 cs_pac='$cs_pac',
                                                                                 ab_pac='$ab_pac',
                                                                                 ee_pac='$ee_pac'
                                                                                 where id_paciente='$id_paciente'") or die(mysqli_error($conexion));
            } else {
                echo "error vuelva a intentar";
            }
        } elseif ($tag === "usuario") {
        } elseif ($tag === "consulta") {
        } else {
            echo "error tag no enviado";
        }
    } elseif ($opcion === "delete") {

        $id_delete = $_REQUEST['id'];
        $tag = $_REQUEST['tag'];
        if ($tag === "paciente") {
            //delete($conexion,$id_delete,"pacientes","id_paciente");
            $borrar = "delete from pacientes where id_paciente = '$id_delete'";
            $sql = mysqli_query($conexion, $borrar) or die(mysqli_error($conexion));

            if ($sql) {
                $borrar2 = mysqli_query($conexion, "delete from antecedentes_personales where id_paciente = '$id_delete'");
                $borrar3 = mysqli_query($conexion, "delete from antecedentes_ginecoobs where id_paciente = '$id_delete'");
                $borrar4 = mysqli_query($conexion, "delete from examen_fisico where idPaciente_ex_fisico = '$id_delete'");
                $borrar5 = mysqli_query($conexion, "delete from ficha_obstetrica where id_paciente_ficha = '$id_delete'");
            ?>
                <script>
                    $.Notification.notify('error', 'bottom right', 'Bien hecho!!', 'Has eliminado el paciente correctamente, aguarde unos segundos por favor.');
                </script>
                <meta http-equiv="refresh" content="2, pacientes.php">
                <div class="col-md-12 col-lg-12">
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                        </button>
                        <strong>Has eliminado</strong> el paciente correctamente <br>
                        <h3>Aguarde 2 segundos para continuar</h3>
                    </div>
                </div>
            <?php
            } else {
                echo "error en la consulta";
            }
        } elseif ($tag === "usuario") {
        } elseif ($tag === "consulta") {
            $borrar = "delete from consultas where idConsulta = '$id_delete'";
            $sql = mysqli_query($conexion, $borrar) or die(mysqli_error($conexion));
            if ($sql) {
            ?>
                <script>
                    $.Notification.notify('error', 'bottom right', 'Bien hecho!!', 'Has eliminado la consulta correctamente, aguarde unos segundos por favor.');
                </script>
                <meta http-equiv="refresh" content="1, consultas.php">
                <div class="col-md-12 col-lg-12">
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                        </button>
                        <strong>Has eliminado</strong> la consulta correctamente <br>
                        <h3>Aguarde 2 segundos para continuar</h3>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "error tag no enviado";
        }
    } elseif ($opcion === "obraSocial") {
        $tag = $_REQUEST['tag'];

        if ($tag === "obraSocial-tag") {
            $id = mysqli_real_escape_string($conexion, $_POST['id']);
            $nombre = strtoupper(mysqli_real_escape_string($conexion, $_POST['nombre'])); //lo paso a mayusculas
            $estado = mysqli_real_escape_string($conexion, $_POST['estado']);
            $lugar_presentacion = mysqli_real_escape_string($conexion, $_POST['lugar_presentacion']);
            $dias_cobro = mysqli_real_escape_string($conexion, $_POST['dias_cobro']);
            if ($id != '') {
                $q = "update osociales set nombre='$nombre', lugar_presentacion='$lugar_presentacion', dias_cobro='$dias_cobro', estado='$estado' where id='$id'";
                $query = mysqli_query($conexion, $q) or die(mysqli_error($conexion));
            } else {
                $q = "insert into osociales(nombre,lugar_presentacion,dias_cobro,estado) values('$nombre','$lugar_presentacion','$dias_cobro','$estado')";
                $query = mysqli_query($conexion, $q) or die(mysqli_error($conexion));
            }
        } else {
            echo "tag no enviado";
        }
    } elseif ($opcion === "tipoConsulta") {
        $tag = $_REQUEST['tag'];

        if ($tag === "tipoConsulta-tag") {
            $id = mysqli_real_escape_string($conexion, $_POST['id_tipo']);
            $nombre = strtoupper(mysqli_real_escape_string($conexion, $_POST['nombre_tipo'])); //lo paso a mayusculas
            $cod = mysqli_real_escape_string($conexion, $_POST['codigo_tipo']);
            if ($id != '') {
                $q = "update tipo_consultas set nombre_tipo='$nombre', codigo_tipo='$cod' where id_tipo='$id'";
                $query = mysqli_query($conexion, $q) or die(mysqli_error($conexion));
            } else {
                $q = "insert into tipo_consultas(nombre_tipo,codigo_tipo) values('$nombre','$cod')";
                $query = mysqli_query($conexion, $q) or die(mysqli_error($conexion));
            }
        } elseif ($tag === "cod") {
            $nombre_tipo_consulta = $_POST['tipo'];
            $query = "select * from tipo_consultas where nombre_tipo = '$nombre_tipo_consulta'";
            $sql = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
            $codigos = mysqli_fetch_array($sql);
            echo $codigos['codigo_tipo'];
        }
    } elseif ($opcion === "valores") {
        $tag = $_REQUEST['tag'];

        if ($tag === "valores-tag") {
            $id = mysqli_real_escape_string($conexion, $_POST['id_valores']);
            $id_obrasocial_valores = mysqli_real_escape_string($conexion, $_POST['id_obrasocial_valores']);
            $codigo_consulta_valores = mysqli_real_escape_string($conexion, $_POST['codigo_consulta_valores']);
            $valor_consulta = mysqli_real_escape_string($conexion, $_POST['valor_consulta']);
            if ($id != '') {
                $q = "update valores_cobro_consultas set id_obraSocial='$id_obrasocial_valores', codigo_consulta='$codigo_consulta_valores', valor_consulta='$valor_consulta' where id_valores='$id'";
                $query = mysqli_query($conexion, $q) or die(mysqli_error($conexion));
                if ($query) {
                    echo "<strong>Bien Hecho!</strong> Has modificado el registro correctamente.";
                }
            } else {
                $comprobar_codigo = mysqli_query($conexion, "SELECT * from valores_cobro_consultas where codigo_consulta='$codigo_consulta_valores' and id_obraSocial='$id_obrasocial_valores'");

                if (mysqli_num_rows($comprobar_codigo) > 0) {
                    echo '<strong>Cuidado!</strong> el código de consulta y la obra social ya tienen un valor asignado.';
                } else {
                    $q = "insert into valores_cobro_consultas(id_obraSocial,codigo_consulta,valor_consulta) values('$id_obrasocial_valores','$codigo_consulta_valores','$valor_consulta')";
                    $query = mysqli_query($conexion, $q) or die(mysqli_error($conexion));
                    if ($query) {
                        echo '<strong>Buen trabajo!</strong> el valor: <b>' . $valor_consulta . '</b> ha sido cargado correctamente.';
                    } else {
                        echo "error";
                    }
                }
            }
        } else {
            echo "tag no enviado";
        }
    } else {
        echo "ERROR OPCION NO ENVIADA. REINTENTE !";
    }
} else {
    echo "Error opción no enviada.";
}


function delete($conexion, $id_delete, $table, $campo)
{

    $query = "delete from $table where $campo = $id_delete";
    $sql = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

    if ($sql) {
        ?>
        <script>
            $.Notification.notify('error', 'bottom right', 'Bien hecho!!', 'Has eliminado el paciente correctamente, aguarde unos segundos por favor.');
        </script>
        <meta http-equiv="refresh" content="2, pacientes.php">
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
            </button>
            <strong>Has eliminao</strong> el paciente correctamente <br>
            <h3>Aguarde 2 segundos para continuar</h3>
        </div>
    <?php
    } else {
        echo "error en la consulta";
    }
}

function success($tagg, $operacion)
{

    ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
        </button>
        <strong>Excelente</strong> Su consulta ha sido gestionada con éxito. <br>
        Usted a <?php echo $operacion . " el o la " . $tagg . " correctamente..."; ?> <br>
        Aguarda unos segundos
    </div>
    <script>
        Command: toastr["success"]("Excelente has realizado la consulta corretamente")
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

function danger($tagg, $operacion)
{

?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
        </button>
        <strong>Un Error</strong> ha ocurrido en la consulta <br>
        No se ha podido <?php echo $operacion . " el " . $tagg . "correctamente..."; ?>
    </div>
<?php

}
