<?php include("header.php");
?>

<?php
$id_examen = $_REQUEST['accion'];

#|====================================== Examen fisico =========================|
$sql = "select * from examen_fisico where id_examen_fisico ='$id_examen'";
    $query = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
    $llena_exFisico=mysqli_fetch_array($query);
        $paciente=$llena_exFisico['idPaciente_ex_fisico'];
#|====================================== Paciente ==============================|
$sql = "select apellido_pac,nombre_pac from pacientes where id_paciente ='$paciente'";
    $query = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
    $llena_pac=mysqli_fetch_array($query);
        $apellido_pac=$llena_pac['apellido_pac'];
        $nombre_pac=$llena_pac['nombre_pac'];
#|==============================================================================|
?>
<?php include("navs.php");?>

    <div class="wrapper">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                    <div class="btn-group pull-right m-t-15">
                        <button type="button" class="btn btn-secondary dropdown-toggle waves-effect waves-light"
                                data-toggle="dropdown" aria-expanded="false">Volver <span class="m-l-5"></span></button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="editaPaciente.php?accion=<?php echo $paciente;?>">Volver al paciente seleccionado</a>
                            <a class="dropdown-item" href="pacientes.php">Volver a pacientes</a>
                        </div>

                    </div>
                    <h4 class="page-title"><span style="color:#143a73">Paciente:</span> <?php echo $apellido_pac." ".$nombre_pac;?></h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">

                    <div class="card" style="border:2px solid #143a73; border-radius:0px;">
                        <p class="card-header">
                            # <?php echo $llena_exFisico['id_examen_fisico'];?> - Examen físico <a style="color:black" class="pull-right hidden-lg hidden-md" href="editaPaciente.php?accion=<?php echo $paciente;?>" title="Volver al paciente seleccionado"><i class="fa fa-undo"></i> Volver al pacietne</a>
                        </p>
                        <div class="card-block">
                            <form method="POST" id="frm_ex_fis_mod">
                               <div class="mensaje"></div>
                                <input type="hidden" value="<?php echo $paciente;?>" id="id_paciente_gral" name="id_paciente_gral">
                                <input type="hidden" value="<?php echo $llena_exFisico['id_examen_fisico'];?>" id="id_examen" name="id_examen">
                                <input type="hidden" name="opcion" value="modificar">
                                <div class="row">
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="form-group">
                                            <label><strong class="text-forms-pacientes">Fecha: </strong></label>
                                            <input class="form-control" type="date" value="<?php echo $llena_exFisico['fecha_ex_fisico_pac'];?>" name="fecha_ex_fisico_pac">
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-xs-12 col-sm-8">
                                        <div class="form-group">
                                            <label><strong class="text-forms-pacientes">MC: </strong></label>
                                            <input class="form-control" type="tex" name="mc_pac" value="<?php echo $llena_exFisico['mc_pac'];?>">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row"><br>
                                    <div class="col-md-12 col-xs-12 col-sm-12">
                                        <div class="form-group">
                                            <label><strong class="text-forms-pacientes">Examen Físico: </strong></label>
                                            <input class="form-control" type="tex" name="ex_fisico_pac" value="<?php echo $llena_exFisico['ex_fisico_pac'];?>">
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs m-b-10" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="colposcopia-tab" data-toggle="tab" href="#colposcopia" role="tab" aria-controls="colposcopia" aria-expanded="true">Colposcopia</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pap-tab" data-toggle="tab" href="#pap" role="tab" aria-controls="pap">Pap</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="ginecologica-tab" data-toggle="tab" href="#ginecologica" role="tab" aria-controls="Ginecologica">Ginecologica</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="mamaria-tab" data-toggle="tab" href="#mamaria" role="tab" aria-controls="mamaria">mamaria</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="mamografia-tab" data-toggle="tab" href="#mamografia" role="tab" aria-controls="mamografia">mamografia</a>
                                </li>
                            </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div role="tabpanel" class="tab-pane fade in active" id="colposcopia" aria-labelledby="colposcopia-tab">
                                        <textarea name="colpos" id="input" class="form-control" rows="15"><?php echo $llena_exFisico['colpos_pac'];?></textarea>
                                    </div>
                                    <div class="tab-pane fade" id="pap" role="tabpanel" aria-labelledby="pap-tab">
                                        <textarea name="pap" id="input" class="form-control" rows="15"><?php echo $llena_exFisico['pap_pac'];?></textarea>
                                    </div>
                                    <div class="tab-pane fade" id="ginecologica" role="tabpanel" aria-labelledby="ginecologica-tab">
                                        <textarea name="ginecologica" id="input" class="form-control" rows="15"><?php echo $llena_exFisico['eco_ginec_pac'];?></textarea>
                                    </div>
                                    <div class="tab-pane fade" id="mamaria" role="tabpanel" aria-labelledby="mamaria-tab">
                                        <textarea name="mamaria" id="input" class="form-control" rows="15"><?php echo $llena_exFisico['eco_mam_pac'];?></textarea>
                                    </div>
                                    <div class="tab-pane fade" id="mamografia" role="tabpanel" aria-labelledby="mamografia-tab">
                                        <textarea name="mamografia" id="input" class="form-control" rows="15"><?php echo $llena_exFisico['mamograf_pac'];?></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="active"><strong class="text-forms-pacientes">Otros: </strong></label>
                                            <textarea class="form-control" rows="12" name="otros_ex_fis_pac" placeholder=""><?php echo $llena_exFisico['otros_ex_fis_pac'];?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="active"><strong class="text-forms-pacientes">Notas: </strong></label>
                                        <textarea class="form-control" rows="12" name="notas_ex_fis_pac" placeholder=""><?php echo $llena_exFisico['notas_ex_fis_pac'];?></textarea>
                                    </div>
                                </div>
                                </div><br>
                                <div class="row">
                                    <button type="submit" name="modificar" class="btn btn-danger btn-lg waves-effect waves-light" style="display:scroll;position:fixed;right:0%;bottom:5%">GUARDAR <br> CAMBIOS</button>
                                    <div class="col-md-9">
                                        <span id="loader" style="display:none" class="loader"><img src="assets/images/ajax-loader.gif" alt="">&nbsp;</span>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Footer -->
            <footer class="footer text-right">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            2016 © Dra. Fabiana Valles.
                        </div>
                    </div>
                </div>
            </footer>
            
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
    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

   
<script>
$(document).ready(function(){
    editarExamenFisico();

});
var editarExamenFisico = function(){
    $('#frm_ex_fis_mod').on('submit',function(e){
        e.preventDefault();
        var frm = $(this).serialize();
        $.ajax({
            method: "POST",
            url: "includes/ExamenFisico/edita_examen.php",
            data: frm,
            beforeSend:function(){
              $("#loader").css("display","inline");
              //$("#guardar").html("loading...");
          },
           complete: function(){
              $("#loader").css("display","none");
          }, 
          }).done(function( info ){
            console.log( info );
            $(".mensaje").fadeIn("slow").html(info);
            //$("#error").css("display","none");
            $("#loader").css("display","none");
          });
    });
}
</script>
    </body>
</html>