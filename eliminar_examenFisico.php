<?php include("header.php");
?>

<?php
$id_examen = $_REQUEST['del'];

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

                    <div class="card" style="border:1px solid #ce0b0b; border-radius:0px;">
                        <h3 class="card-header" style="color:#ce0b0b">
                           ¿Seguro desea eliminar el examen físico
                            # <?php echo $llena_exFisico['id_examen_fisico'];?> ? 
                            <a style="color:black" class="pull-right hidden-lg hidden-md" href="editaPaciente.php?accion=<?php echo $paciente;?>" title="Volver al paciente seleccionado"><i class="fa fa-undo"></i></a>
                        </h3>
                        <div class="card-block">
                            <form method="POST" id="frm_ex_fis_del">
                              <input type="hidden" value="eliminar" name="opcion">
                               <div class="mensaje"></div><span id="loader" style="display:none" class="loader"><img src="assets/images/ajax-loader.gif" alt="">&nbsp;</span>
                                <input type="hidden" value="<?php echo $id_examen;?>" name="id_examen">
                                <input type="hidden" value="<?php echo $paciente;?>" name="id_pac">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="text-align:center">
                                        <button class="btn btn-danger btn-lg" type="submit" name="del">Si, deseo eliminar</button>
                                        <a class="btn btn-info btn-lg" href="editaPaciente.php?accion=<?php echo $paciente;?>">No, volver al paciente</a>
                                        
                                    </div>
                                </div>
                            </form><br><br>
                            <hr>
                            <p>Aviso! <br>
                            <small><i class="fa fa-bullhorn"></i> Una vez eliminado, usted no podrá recuperarlo nuevamente...</small></p>
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
    deleteExamen();
});
var deleteExamen = function(){
    $('#frm_ex_fis_del').on('submit',function(e){
        e.preventDefault();
        var frm = $(this).serialize();
        $.ajax({
            method: "POST",
            url: "includes/ExamenFisico/elimina_examen.php",
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