<?php 
include("header.php");
?>
<style>
    #mySaveBtn{
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        background-color: #538fbe;
        padding: 10px 30px;
        font-size: 14px;
        border: 1px solid #2d6898;
        display: scroll;
        position: fixed;
        bottom: 2%;
        right: 1%;
        background-image: linear-gradient(bottom, rgb(73,132,180) 0%, rgb(97,155,203) 100%);
        background-image: -o-linear-gradient(bottom, rgb(73,132,180) 0%, rgb(97,155,203) 100%);
        background-image: -moz-linear-gradient(bottom, rgb(73,132,180) 0%, rgb(97,155,203) 100%);
        background-image: -webkit-linear-gradient(bottom, rgb(73,132,180) 0%, rgb(97,155,203) 100%);
        background-image: -ms-linear-gradient(bottom, rgb(73,132,180) 0%, rgb(97,155,203) 100%);

        background-image: -webkit-gradient(
            linear,
            left bottom,
            left top,
            color-stop(0, rgb(73,132,180)),
            color-stop(1, rgb(97,155,203))
        );
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        text-shadow: 0px -1px 0px rgba(0,0,0,.5);
        -webkit-box-shadow: 0px 6px 0px #2b638f, 0px 3px 15px rgba(0,0,0,.4), inset 0px 1px 0px rgba(255,255,255,.3), inset 0px 0px 3px rgba(255,255,255,.5);
        -moz-box-shadow: 0px 6px 0px #2b638f, 0px 3px 15px rgba(0,0,0,.4), inset 0px 1px 0px rgba(255,255,255,.3), inset 0px 0px 3px rgba(255,255,255,.5);
        box-shadow: 0px 6px 0px #2b638f, 0px 3px 15px rgba(0,0,0,.4), inset 0px 1px 0px rgba(255,255,255,.3), inset 0px 0px 3px rgba(255,255,255,.5);
    }
    #mySaveBtn:hover{
        background-image: linear-gradient(bottom, rgb(79,142,191) 0%, rgb(102,166,214) 100%);
        background-image: -o-linear-gradient(bottom, rgb(79,142,191) 0%, rgb(102,166,214) 100%);
        background-image: -moz-linear-gradient(bottom, rgb(79,142,191) 0%, rgb(102,166,214) 100%);
        background-image: -webkit-linear-gradient(bottom, rgb(79,142,191) 0%, rgb(102,166,214) 100%);
        background-image: -ms-linear-gradient(bottom, rgb(79,142,191) 0%, rgb(102,166,214) 100%);
        background-image: -webkit-gradient(
            linear,
            left bottom,
            left top,
            color-stop(0, rgb(79,142,191)),
            color-stop(1, rgb(102,166,214))
        );
    }
    #mySaveBtn:active {
        background-image: linear-gradient(bottom, rgb(88,154,204) 0%, rgb(90,150,199) 100%);
        background-image: -o-linear-gradient(bottom, rgb(88,154,204) 0%, rgb(90,150,199) 100%);
        background-image: -moz-linear-gradient(bottom, rgb(88,154,204) 0%, rgb(90,150,199) 100%);
        background-image: -webkit-linear-gradient(bottom, rgb(88,154,204) 0%, rgb(90,150,199) 100%);
        background-image: -ms-linear-gradient(bottom, rgb(88,154,204) 0%, rgb(90,150,199) 100%);

        background-image: -webkit-gradient(
            linear,
            left bottom,
            left top,
            color-stop(0, rgb(88,154,204)),
            color-stop(1, rgb(90,150,199))
        );
        -webkit-box-shadow: 0px 2px 0px #2b638f, 0px 1px 6px rgba(0,0,0,.4), inset 0px 1px 0px rgba(255,255,255,.3), inset 0px 0px 3px rgba(255,255,255,.5);
        -moz-box-shadow: 0px 2px 0px #2b638f, 0px 1px 6px rgba(0,0,0,.4), inset 0px 1px 0px rgba(255,255,255,.3), inset 0px 0px 3px rgba(255,255,255,.5);
        box-shadow: 0px 2px 0px #2b638f, 0px 1px 6px rgba(0,0,0,.4), inset 0px 1px 0px rgba(255,255,255,.3), inset 0px 0px 3px rgba(255,255,255,.5);
        -webkit-transform: translate(0, 4px);
        -moz-transform: translate(0, 4px);
        transform: translate(0, 4px);
        -webkit-transition: all .1s ease-in-out;
        -moz-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
    }
    hr.separator{
        border: 1px solid #143a73;
    }
    #fum_pac_first{
        padding-left: 5px;
    }
</style>
<?php
$id_ficha = $_REQUEST['id'];
# ficha obstetrica
$datosFicha = mysqli_query($conexion,"select * from ficha_obstetrica where id_ficha=$id_ficha") or die(mysqli_error($conexion));
$ficha=mysqli_fetch_array($datosFicha);
$id_paciente=$ficha['id_paciente_ficha'];
# paciente
$q = "select * from pacientes, antecedentes_personales, antecedentes_ginecoobs where pacientes.id_paciente = '$id_paciente' and antecedentes_personales.id_paciente='$id_paciente' and antecedentes_ginecoobs.id_paciente='$id_paciente'";
$query = mysqli_query($conexion,$q) or die(mysqli_error($conexion));
$llena_paciente=mysqli_fetch_array($query);

?>

<body>

<?php include("navs.php");?>
<div class="wrapper">
    <div class="container">
<?php include("includes/ExamenOBs/ins_tabla_ex_obs_modal.php"); ?>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title" style="color:black"><?php echo "# Ficha número: ".$id_ficha ?><a style="text-decoration:underline" class="pull-right hidden-lg hidden-md" href="editaPaciente.php?accion=<?php echo $llena_paciente['id_paciente'];?>" title="Volver al paciente seleccionado"><span><?php echo $llena_paciente['apellido_pac']." ".$llena_paciente['nombre_pac'];?></span> &nbsp;<i class="fa fa-undo"></i></a></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-12">
                <div class="card-box" style="border:2px solid #143a73;border-radius:0px !important">
                    <form action="" method="post" id="frm_ficha_general">
                    <div class="ok-cambio"></div>
                    <input type="hidden" name="opcion" value="edit">
                    <input type="hidden" name="tag" value="ficha_obstetrica">
                    <input type="hidden" name="idPacFicha" value="<?php echo $id_paciente ?>">
                    <input type="hidden" name="idFicha" id="idFicha" value="<?php echo $id_ficha ?>">
                    <div class="row">
                        <div class="col-md-2 col-xs-12 col-sm-4">
                            <label for="fum_pac_first"><strong>FUM: </strong></label>
                            <input class="form-control" type="date" name="fum_pac_first" id="fum_pac_first" onblur="funcionFpp(this.value)" value="<?php echo $ficha['fum_ficha'];?>">
                        </div>
                        <div class="col-md-2 col-xs-12 col-sm-4">
                            <label for="fpp_pac_first"><strong >Fecha probable de parto: </strong></label>
                            <input class="form-control" type="text" name="fpp_pac_second"  id="result" style="border-color:#8a29a7 !important;" value="<?php echo $ficha['fpp_ficha'];?>">
                        </div>
                        <div class="col-md-2 col-xs-12 col-sm-4">
                            <label for="fpp_pac_first"><strong >Fecha terminación </strong></label>
                            <input class="form-control" type="date" name="f_terminacion"  id="f_terminacion" style="border-color:red; padding-left: 4px" value="<?php echo $ficha['terminacion'];?>">
                        </div>
                        <div class="col-md-2 col-xs-12 col-sm-4">
                            <label class="">Hospital</label>
                            <input id="htal_pac" name="htal_pac" type="text" class="form-control" value="<?php echo $ficha['htal_ficha'];?>">
                        </div>
                        <div class="col-md-2 col-xs-12 col-sm-4">
                            <label class="">Obra social</label>
                            <input id="htal_pac" name="ob_social_pac" type="text" class="form-control" value="<?php echo $llena_paciente['obsocial_pac'];?>">
                        </div>
                        <div class="col-md-2 col-xs-12 col-sm-4">
                            <label class="">Tipo</label>
                            <input id="htal_pac" name="tipo_terminacion" type="text" class="form-control" value="<?php echo $ficha['tipo_terminacion'];?>">
                        </div>
                    </div><hr>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-xs-12 col-sm-4">
                                <div class="input-group">
                                    <span class="input-group-addon">Gestas:</span>
                                    <input id="gestas_pac" name="gestas_pac" type="text" class="form-control" value="<?php echo $llena_paciente['gestas_pac'];?>">
                                </div>
                            </div>
                            <div class="col-md-2 col-xs-12 col-sm-4">
                                <div class="input-group">
                                    <span class="input-group-addon">P</span>
                                    <input id="partos_pac" name="partos_pac" type="text" class="form-control" value="<?php echo $llena_paciente['partos_pac'];?>">
                                </div>
                            </div>
                            <div class="col-md-2 col-xs-12 col-sm-4">
                                <div class="input-group">
                                    <span class="input-group-addon">CS</span>
                                    <input id="cs_pac" name="cs_pac" type="text" class="form-control" value="<?php echo $llena_paciente['cs_pac'];?>">
                                </div>
                            </div><br class="visible-sm"><br class="visible-sm">
                            <div class="col-md-2 col-xs-12 col-sm-4">
                                <div class="input-group">
                                    <span class="input-group-addon">AB</span>
                                    <input id="ab_pac" name="ab_pac" type="text" class="form-control" value="<?php echo $llena_paciente['ab_pac'];?>">
                                </div>
                            </div>
                            <div class="col-md-2 col-xs-12 col-sm-4">
                                <div class="input-group">
                                    <span class="input-group-addon">EE</span>
                                    <input id="ee_pac" name="ee_pac" type="text" class="form-control" value="<?php echo $llena_paciente['ee_pac'];?>">
                                </div>
                            </div>
                            <div class="col-md-2 col-xs-12 col-sm-4">
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                       <div class="row">
                           <div class="col-md-4 col-xs-12 col-sm-12 col-xl-4">
                                <div class="input-group">
                                    <span class="input-group-addon">Grupo Sanguineo:</span>
                                    <input id="grup_sang_pac" name="grup_sang_pac" type="text" class="form-control" value="<?php echo $llena_paciente['gru_sanguineo_pac'];?>">
                                </div>
                            </div><br class="visible-sm"><br class="visible-sm">
                           <div class="col-md-4 col-xs-12 col-sm-6 col-xl-4">
                                <div class="input-group">
                                    <span class="input-group-addon">Marido:</span>
                                    <input id="marido_pac" name="marido_pac" type="text" class="form-control" value="<?php echo $ficha['marido_ficha'];?>">
                                </div>
                            </div>
                           <div class="col-md-4 col-xs-12 col-sm-6 col-xl-4">
                                <div class="input-group">
                                    <span class="input-group-addon">Patología:</span>
                                    <input id="patolog_pac" name="patolog_pac" type="text" class="form-control" value="<?php echo $ficha['patologia_ficha'];?>">
                                </div>
                            </div>
                       </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 col-xs-12 col-sm-12 col-xl-4">
                                <div class="input-group">
                                    <span class="input-group-addon">Fármacos:</span>
                                    <input id="farmacos_pac" name="farmacos_pac" type="text" class="form-control" value="<?php echo $ficha['farmacos_ficha'];?>">
                                </div>
                            </div><br class="visible-sm"><br class="visible-sm">
                            <div class="col-md-4 col-xs-12 col-sm-6 col-xl-4">
                                <div class="input-group">
                                    <span class="input-group-addon">PI:</span>
                                    <input id="pi_pac" name="pi_pac" type="text" class="form-control" value="<?php echo $ficha['pi_ficha'];?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12 col-sm-6 col-xl-4">
                                <div class="input-group">
                                    <span class="input-group-addon">Antecedentes:</span>
                                    <input id="anteced_pac" name="anteced_pac" type="text" class="form-control" value="<?php echo $ficha['antec_ficha'];?>">
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="form-group"><!--TABLA 1 examen obs-->
                        <div class="col-md-12">
                            <h3><span style="color:#3dc7f4"> Exámen Obstétrico</span> <a data-toggle="modal"  data-target=".examenObstetrico" href="#examenObstetrico" id="add" class="btn btn-secondary btn-sm pull-right"><i class="fa fa-plus-circle"></i> Insertar fila</a></h3>
                            <div class="listado_tabla1"></div>
                            <div class="info"></div>
                        </div>

                    </div>
                    <br><hr class="separator"><br>
                    <div class="row">
                        <div class="col-md-12 col-xs-12 col-sm-12" style="text-align:center"><h3 style="color:orange">Ecografías</h3><br></div>
                        <div class="col-md-4 col-xs-12 col-sm-3">
                            <label><strong class="text-forms-pacientes">Ecografías: </strong></label><input class="form-control" type="text" name="notas_eco_pac" value="<?php echo $ficha['ecografias_ficha'];?>">
                        </div>
                        <div class="col-md-2 col-xs-12 col-sm-3">
                            <label><strong class="text-forms-pacientes">TN </strong></label><input class="form-control" type="text" name="tn_eco_pac" value="<?php echo $ficha['tn_ficha'];?>">
                        </div>
                        <div class="col-md-2 col-xs-12 col-sm-3">
                            <label><strong class="text-forms-pacientes">HN </strong></label><input class="form-control" type="text" name="hn_eco_pac" value="<?php echo $ficha['hn'];?>">
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-3">
                            <label><strong class="text-forms-pacientes">Pres </strong></label><input class="form-control" type="text" name="pres" value="<?php echo $ficha['pres_ficha'];?>">
                        </div>
                    </div><!--Cierra--> <br>
                    <div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h3 style="color:orange"># <a data-toggle="modal" href="#filaEcografia" class="btn btn-secondary btn-sm pull-right" id="add2"><i class="fa fa-plus"></i> Insertar fila</a></h3>
                            <div class="listado_tabla2"></div>
                            <div class="info2"></div>
                        </div>
                    </div><br><!--TABLA ECO -->
                    <div class="form-group">
                        <div class="col-md-12">
                            <label><strong>Notas Ecografías: </strong></label>
                            <textarea class="form-control" rows="3" name="notas_imp_eco_pac"><?php echo $ficha['notas_eco_ficha'];?></textarea>
                        </div>
                    </div>
                    <br><hr class="separator"><br>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h3 style="color:green">Laboratorio <a data-toggle="modal" href="#filaLab" class="btn btn-secondary btn-sm pull-right" id="add3"><i class="fa fa-plus"></i> Insertar fila</a></h3>
                            <div class="listado_tabla3"></div>
                            <div class="info3"></div>
                            
                        </div>
                    </div><!--TABLA LABORATORIO -->
                    <br><hr><br>
                    
                    <div class="row">
                        <div class="col-md-3 col-xs-12 col-sm-6">
                            <h3 style="text-align:center">SEROLOGÍA</h3>
                            <div class="form-inline">
                                <label><strong>1T: </strong></label>
                                <input class="form-control" type="text" name="ser_1t_ficha" value="<?php echo $ficha['ser_1t_ficha'];?>"><br>
                                <label><strong>2T: </strong></label>
                                <input class="form-control" type="text" name="ser_2t_ficha" value="<?php echo $ficha['ser_2t_ficha'];?>"><br>
                                <label><strong>3T: </strong></label>
                                <input class="form-control" type="text" name="ser_3t_ficha" value="<?php echo $ficha['ser_3t_ficha'];?>"><br>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-6">
                            <h3 style="text-align:center">CMV:</h3>
                            <div class="form-group">
                                <input class="form-control" type="text" name="cmv_pac" value="<?php echo $ficha['ser_cmv_ficha'];?>" placeholder="CMV">
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-6">
                            <h3 style="text-align:center">Rubeola</h3>
                            <div class="form-group">
                                <input class="form-control" type="text" name="rubeola_pac" value="<?php echo $ficha['ser_rubeola_ficha'];?>" placeholder="Rubeola">
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-6">
                            <h3 style="text-align:center">Urocultivo</h3>
                            <div class="form-inline">
                                <div class="col-md-12">
                                    <label for="uro_1t_pac"><strong class="text-forms-pacientes">1T: </strong></label>
                                    <input class="form-control" type="text" name="uro_1t_pac" value="<?php echo $ficha['urocul_1t_ficha'];?>"><br>
                                    <label for="uro_2t_pac"><strong class="text-forms-pacientes">2T: </strong></label>
                                    <input class="form-control" type="text" name="uro_2t_pac" value="<?php echo $ficha['urocul_2t_ficha'];?>"><br>
                                    <label for="uro_3t_pac"><strong class="text-forms-pacientes">3T: </strong></label>
                                    <input class="form-control" type="text" name="uro_3t_pac" value="<?php echo $ficha['urocul_3t_ficha'];?>"><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><hr>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <h3>CTOG</h3>
                                <div class="row">
                                    <div class="col-md-6 col-xs-6">
                                        <label class="sr-only"></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">EG: </div>
                                            <input type="text" class="form-control" id="exampleInputAmount" value="<?php echo $ficha['ctog_eg_1'];?>" name="eg_input_1a">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-6">
                                        <input class="form-control" type="text" name="eg_input_2a" value="<?php echo $ficha['ctog_eg_2'];?>">
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-6 col-xs-6">
                                        <label class="sr-only"></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">EG: </div>
                                            <input name="eg_input_1b" type="text" class="form-control" id="exampleInputAmount" value="<?php echo $ficha['ctog_eg_3'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-6">
                                        <input class="form-control" type="text" name="eg_input_2b" value="<?php echo $ficha['ctog_eg_4'];?>">
                                    </div>
                                </div><br class="visible-sm">
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <h3>NOTAS</h3>
                            <textarea class="form-control" rows="4" name="notas_ctog_pac"><?php echo $ficha['ctog_notas'];?></textarea>
                        </div>
                    </div>
                    <br><hr><br>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <div class="alert alert-warning">
                                        <div class="form-group">
                                            <h3>Vacunas</h3><hr>
                                            <label for="">Detalle</label>
                                            <textarea class="form-control" rows="5" name="vacunas_pac"><?php echo $ficha['vacunas_ficha'];?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <div class="alert alert-success">
                                        <div class="form-inline">
                                            <h3>Coombs</h3><hr>
                                            <div class="form-group">
                                               <div class="checkbox checkbox-circle">
                                                    <div class="checkbox checkbox-inverse">
                                                        <?php if($ficha['coombs_20_ficha'] != ""){
                                                        ?><input type="checkbox" name="ch_20_pac" checked><?php }
                                                        else{ ?>
                                                        <input type="checkbox" name="ch_20_pac"><?php } ?>
                                                        <label for="ch_pac_diab">20</label>
                                                        <input type="text" name="input_ch20" class="form-control" value="<?php echo $ficha['coombs_20_ficha'];?>">
                                                    </div>
                                                </div>
                                            </div><br><br>
                                            <div class="form-group">
                                               <div class="checkbox checkbox-circle">
                                                    <div class="checkbox checkbox-inverse">
                                                       <?php if($ficha['coombs_24_ficha'] != ""){
                                                        ?><input type="checkbox" name="ch_24_pac" checked><?php }else{ ?>
                                                        <input type="checkbox" name="ch_24_pac"><?php }?>
                                                        <label for="ch_pac_diab">24</label>
                                                        <input type="text" name="input_ch24" class="form-control" value="<?php echo $ficha['coombs_24_ficha'];?>">
                                                    </div>
                                                </div>
                                            </div><br><br>
                                            <div class="form-group">
                                               <div class="checkbox checkbox-circle">
                                                   <div class="checkbox checkbox-inverse">
                                                       <?php if($ficha['coombs_28_ficha'] != ""){
                                                        ?><input type="checkbox" name="ch_28_pac" checked><?php }else{ ?>
                                                        <input type="checkbox" name="ch_28_pac"><?php }?>
                                                        <label for="ch_pac_diab">24</label>
                                                        <input type="text" name="input_ch28" class="form-control" value="<?php echo $ficha['coombs_28_ficha'];?>">
                                                    </div>
                                                </div>
                                            </div><br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--cierra row--><hr><br>
                    <div class="row">
                        <div class="col-md-2 col-xs-12 col-sm-6 col-lg-2">
                            <h4>Streptococo</h4>
                            <input class="form-control" type="text" name="strep_pac" value="<?php echo $ficha['strepto_ficha'];?>">
                        </div>
                        <div class="col-md-2 col-xs-12 col-sm-6 col-lg-2">
                            <h4>Psicoprofilaxis</h4>
                            <input class="form-control" type="text" name="psicoprof_pac" value="<?php echo $ficha['psicoprof_ficha'];?>">
                        </div>
                        <div class="col-md-2 col-xs-12 col-sm-6 col-lg-2">
                            <h4>Maduración</h4>
                            <input class="form-control" type="text" name="mad_pac" value="<?php echo $ficha['maduracion_ficha'];?>">
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                            <h4>Lactancia</h4>
                            <input class="form-control" type="text" name="lactan_pac" value="<?php echo $ficha['lactan_ficha'];?>">
                        </div>
                        <div class="col-md-2 col-xs-12 col-sm-12 col-lg-2">
                            <h4>NST</h4>
                            <input class="form-control" type="text" name="nst_pac" value="<?php echo $ficha['nst_ficha'];?>">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <label><strong class="text-forms-pacientes">Doppler: </strong></label>
                            <textarea class="form-control" rows="3" name="doppler_pac"><?php echo $ficha['doppler_ficha'];?></textarea>
                            <br>
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <label><strong class="text-forms-pacientes">Ecocardiograma: </strong></label>
                            <textarea class="form-control" rows="3" name="ecocard_pac"><?php echo $ficha['ecocar_ficha'];?></textarea>
                        <br></div>
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <label><strong class="text-forms-pacientes">Notas: </strong></label>
                            <textarea class="form-control" rows="5" name="notas_muy_imp_pac"><?php echo $ficha['notas_ficha'];?></textarea>
                        <br></div>
                    </div>
                    <button class="hidden-xs hidden-sm xs-hidden sm-hidden" id="mySaveBtn" type="submit"><i class="fa fa-save fa-3x"></i></button>
                </form>
                </div>
            </div>
        </div>
        
    </div> <!-- container -->
</div> <!-- End wrapper -->

<script>
    var resizefunc = [];
</script>
<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/plugins/switchery/switchery.min.js"></script>
<!-- Modal-Effect -->
<script src="assets/plugins/custombox/js/custombox.min.js"></script>
<script src="assets/plugins/custombox/js/legacy.min.js"></script>

<!-- Toastr js -->
<script src="assets/plugins/toastr/toastr.min.js"></script>

<!-- Sweet Alert js -->
<script src="assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
<script src="assets/js/moment.min.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

<script>
$(document).ready(function(){
    $('#add').click(function(){  
       $('#nuevaFila')[0].reset();  
       $('#btn_modal_guardar').html("Insertar");
       $('#btn_modal_guardar').removeClass("btn-warning");
       $('#btn_modal_guardar').addClass("btn-info");
       $('#id_examen_obs').val("");
    });
    $('#add2').click(function(){  
       //$('#btn-modal').val("Insertar");  
       $('#nuevaFila2')[0].reset();
       $('#id_tab_eco').val("");
       $('#insRowTablaEco').val("Insertar");
       $('#insRowTablaEco').removeClass("btn-success");
       $('#insRowTablaEco').addClass("btn-info");
       
    });
    $('#add3').click(function(){  
       //$('#btn-modal').val("Insertar");  
       $('#nuevaFila3')[0].reset();
       $('#id_tab_lab').val("");
    });
    
    editaFichaGral();
    listarExObs();
    listarEco();
    listarLab();
    nuevaExObs();
    nuevaEco();
    nuevaLab();
    $('#mySaveBtn').fadeIn();
    $(document).on('click', '.edit_data', function(){  
        var id_fila = $(this).attr("id");
        //alert(id_fila);
        //$('#edit_modal_ex_ob').modal('show'); 
        $.ajax({  
            url:"includes/ExamenOBs/fetch.php",  
            method:"POST",  
            data:{id_fila:id_fila},  
            dataType:"json",  
            success:function(data){
                 $('#edit_modal_ex_ob').modal('show'); 
                 $('#id_examen_obs').val(data.id_examen_obs);  
                 $('#fecha_ex_obs').val(data.fecha_ex_obss);  
                 $('#eg_ex_obs').val(data.eg_ex_obss);  
                 $('#pa_ex_obs').val(data.pa_ex_obss);  
                 $('#au_ex_obs').val(data.au_ex_obss);  
                 $('#ta_ex_obs').val(data.ta_ex_obss);  
                 $('#lcf_ex_obs').val(data.lcf_ex_obss);  
                 $('#edema_ex_obs').val(data.edema_ex_obss);
                 $('#datos_ex_obs').val(data.datos_ex_obss); 
                 $('#btn_modal_guardar').val("editar"); 
                 $('#btn_modal_guardar').text("Modificar").addClass("btn-warning").removeClass("btn-info");
            }  
        });
    });
    $(document).on('click', '.edit_data_tabla2', function(){
        $('#insRowTablaEco').val("Editar");
        $('#insRowTablaEco').removeClass("btn-info");
        $('#insRowTablaEco').addClass("btn-success");
        var id_fila = $(this).attr("id");
        //alert(id_fila);
        //$('#edit_modal_ex_ob').modal('show'); 
        $.ajax({  
            url:"includes/eco/fetch.php",  
            method:"POST",  
            data:{id_fila:id_fila},  
            dataType:"json",  
            success:function(data){
                 $('#filaEcografia').modal('show'); 
                 $('#id_tab_eco').val(data.id_eco);  
                 $('#fecha_eco').val(data.fecha_eco);  
                 $('#eg_eco').val(data.eg_eco);  
                 $('#dbp_eco').val(data.dbp_eco);  
                 $('#pa_eco').val(data.pa_eco);  
                 $('#lf_eco').val(data.lf_eco);  
                 $('#plac_eco').val(data.plac_eco);  
                 $('#grado_eco').val(data.grado_eco);  
                 $('#la_eco').val(data.la_eco);  
                 $('#pef_eco').val(data.pef_eco);  
                 $('#p_eco').val(data.p_eco);  
                 $('#ipaud').val(data.ipaud_eco);
                 $('#ipaui').val(data.ipaui_eco); 
                 $('#insRowTablaEco').val("Editar"); 
                 //$('#btn_modal_guardar').text("Modificar").addClass("btn-warning").removeClass("btn-info");
            }  
        });
    });
    $(document).on('click', '.edit_data_tabla3', function(){  
        var id_fila = $(this).attr("id");
        //alert(id_fila);
        //$('#edit_modal_ex_ob').modal('show'); 
        $.ajax({  
            url:"includes/lab/fetch.php",  
            method:"POST",  
            data:{id_fila:id_fila},  
            dataType:"json",  
            success:function(data){
                 $('#filaLab').modal('show'); 
                 $('#id_tab_lab').val(data.id_lab);  
                 $('#fechaLab').val(data.fecha_lab);  
                 $('#htoLab').val(data.hto_lab);  
                 $('#hbLab').val(data.hb_lab);  
                 $('#plaq').val(data.plaq_lab);  
                 $('#gb').val(data.gb_lab);  
                 $('#tsh').val(data.tsh_lab);  
                 $('#t4l').val(data.t4l_lab);  
                 $('#tpo').val(data.tpo_lab);  
                 $('#tp').val(data.tp_lab);  
                 $('#ttpk').val(data.ttpk_lab);  
                 $('#glu').val(data.glu_lab);
                 $('#ur').val(data.ur_lab);
                 $('#creat').val(data.creat_lab);
                 $('#uric').val(data.uric_lab);
                 $('#ldh').val(data.ldh_lab);
                 $('#got').val(data.got_lab);
                 $('#gpt').val(data.gpt_lab);
                 $('#bd').val(data.bd_lab);
                 $('#bi').val(data.bi_lab);
                 $('#bt').val(data.bt_lab);
                 $('#colesterol').val(data.colesterol_lab);
                 $('#hdl').val(data.hdl_lab);
                 $('#ldl').val(data.ldl_lab);
                 $('#tg').val(data.tg_lab);
                 $('#InsRowLab').val("Editar");
                 //$('#btn_modal_guardar').text("Modificar").addClass("btn-warning").removeClass("btn-info");
            }  
        });
    });
    $(document).on('click', '.delete_data', function(){
       var id_fila = $(this).attr("id");
       swal({
            title: "Seguro desea eliminar la fila?",
            text: "No podrá recuperar lo que haya borrado.",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: "Si, borrar",
            closeOnConfirm: false
        }, function () {
            $.ajax({  
                url:"includes/ExamenOBs/deleteFilaTablaUno.php",  
                method:"POST",  
                data:{id_fila:id_fila},
                success:function(data){
                    swal("Eliminado!", "La fila ha sido eliminada.", "success");
                    listarExObs();
                }  
            });
        });
    });
    $(document).on('click', '.delete_data_tabla2', function(){
       var id_fila = $(this).attr("id");
       swal({
            title: "Seguro desea eliminar la fila?",
            text: "No podrá recuperar lo que haya borrado.",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: "Si, borrar",
            closeOnConfirm: false
        }, function () {
            $.ajax({  
                url:"includes/eco/delete.php",  
                method:"POST",  
                data:{id_fila:id_fila},
                success:function(data){
                    swal("Eliminado!", "La fila ha sido eliminada.", "success");
                    listarEco();
                }  
            });
        });
    });
    $(document).on('click', '.delete_data_tabla3', function(){
       var id_fila = $(this).attr("id");
       swal({
            title: "Seguro desea eliminar la fila?",
            text: "No podrá recuperar lo que haya borrado.",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: "Si, borrar",
            closeOnConfirm: false
        }, function () {
            $.ajax({  
                url:"includes/lab/delete.php",  
                method:"POST",  
                data:{id_fila:id_fila},
                success:function(data){
                    swal("Eliminado!", "La fila ha sido eliminada.", "success");
                    listarLab();
                }  
            });
        });
    });
    $('#fecha_ex_obs').blur(function(){
        $fum = $('#fum_pac_first').val();
        $eg = $("#fecha_ex_obs").val();
        console.log($fum);
        console.log($eg);
        functionSemanas($fum,$eg);
    });
});
var functionSemanas = function(fecha,fecha2){
    var fecha = new Date(fecha);
    var hoy = new Date(fecha2);
    var ed = parseInt((hoy -fecha)/7/24/60/60/1000);
    console.log(ed);
    $eg = $("#eg_ex_obs").val(ed);
}
var funcionFpp = function(Fecha){
	myDate = new Date(Fecha);
	var day = myDate.getDate();
	myDate.setDate(day + 280);
	//si
	var x = myDate;
	dia = x.getDate();
	mes = x.getMonth()+1;
	anio = x.getFullYear();
    
    if(dia<10){
        dia="0"+x.getDate();
    }
    if(mes<10){
        mes='0'+mes;
    }
    $("#result").val(dia+'-'+mes+'-'+anio);
}
var nuevaExObs = function(){
    $('#nuevaFila').on('submit',function(e){
      e.preventDefault();
      var frm = $(this).serialize();
      $.ajax({
        method: "POST",
        url: "lib/process.php",
        data: frm,
        beforeSend:function(){
          $("#loader").css("display","inline");
      },
       complete: function(){
          $("#loader").css("display","none");
          $(".examenObstetrico").modal("hide");
          Command: toastr["success"]("Bien hecho! has realizado la consulta correctamente.")
          toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": false,
              "positionClass": "toast-bottom-right",
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
      }, 
      }).done( function( info ){
        //console.log( info );
        $(".info").fadeIn("slow").html(info);
        $("#loader").css("display","none");
        listarExObs();
        $('#nuevaFila')[0].reset();
      });
    });
}
var nuevaEco = function(){
    $('#nuevaFila2').on('submit',function(e){
      e.preventDefault();
      var frm = $(this).serialize();
      $.ajax({
        method: "POST",
        url: "lib/process.php",
        data: frm,
        beforeSend:function(){
          $("#loader2").css("display","inline");
      },
       complete: function(){
          $("#loader2").css("display","none");
          $("#filaEcografia").modal("hide");
          Command: toastr["success"]("Bien hecho! has realizado la consulta correctamente.")
          toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": false,
              "positionClass": "toast-bottom-right",
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
      }, 
      }).done( function( info ){
        //console.log( info );
        $(".info2").fadeIn("slow").html(info);
        $("#loader2").css("display","none");
        $('#nuevaFila2')[0].reset();
        listarEco();
      });
    });
}
var nuevaLab = function(){
    $('#nuevaFila3').on('submit',function(e){
      e.preventDefault();
      var frm = $(this).serialize();
      $.ajax({
        method: "POST",
        url: "lib/process.php",
        data: frm,
        beforeSend:function(){
          $("#loader3").css("display","inline");
      },
       complete: function(){
          $("#loader3").css("display","none");
          $("#filaLab").modal("hide");
          Command: toastr["success"]("Bien hecho! has realizado la consulta correctamente.")
          toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": false,
              "positionClass": "toast-bottom-right",
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
      }, 
      }).done( function( info ){
        //console.log( info );
        $(".info2").fadeIn("slow").html(info);
        $("#loader3").css("display","none");
        $('#nuevaFila3')[0].reset();
        listarLab();
      });
    });
}
var editaFichaGral = function(){
    $('#frm_ficha_general').on('submit',function(e){
      e.preventDefault();
      var frm = $(this).serialize();
      $.ajax({
        method: "POST",
        url: "lib/process.php",
        data: frm,
        beforeSend:function(){
          //$("#loader").css("display","inline");
      },
       complete: function(){
          //$("#loader").css("display","none");                                                                
      }, 
      }).done( function( info ){
            $(".ok-cambio").fadeIn("slow").html(info);
            listarExObs();
            //console.log( info );
            //$("#loader").css("display","none");
      });
    });
}

// # Listados de tablas
var listarExObs = function(){
    var id_pac = $("#idFicha").val();
    $.post("includes/ExamenObs/ins_tabla_ex_obs.php",{valor_id:id_pac },
      function(msj){
        $(".listado_tabla1").html(msj);
    });
}
var listarEco = function(){
    var id_pac = $("#idFicha").val();
        $.post("includes/ExamenObs/ins_tabla_eco.php",{valor_id:id_pac },
          function(msj){
            $(".listado_tabla2").html(msj);
    });
}
var listarLab = function(){
    var id_pac = $("#idFicha").val();
        $.post("includes/ExamenObs/ins_tabla_lab.php",{valor_id:id_pac },
          function(msj){
            $(".listado_tabla3").html(msj);
    });
}

</script>
</body>
</html>