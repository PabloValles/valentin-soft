<?php include("header.php");
include "pruebas.php";
?>
<body>

<?php include("navs.php");?>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="btn-group pull-right m-t-15">
                   <a href="consultas.php" class="btn btn-secondary waves-effect waves-light">Volver</a>
                    <button type="button" class="btn btn-danger waves-effect waves-light dropdown-toggle"
                            data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i
                            class="fa fa-cog"></i></span></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Ir a pacientes</a>
                        <a class="dropdown-item" href="#">Consultas</a>
                        <a class="dropdown-item" href="#">Turnos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Configuraciones</a>
                    </div>

                </div>
                <h4 class="page-title" style="color:black">Realizar pago</h4>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-xl-offset-3 col-lg-offset-3 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                
                <div class="card-box" id="search">
                    
                    <form action="" method="POST" role="form">
                        <div class="form-group">
                            <legend id="seleccionar_paciente">Seleccione el paciente</legend>
                        </div>
                        <select name="pac" id="pac" class="form-control select2">
                            <option value=" ">-- Seleccione la paciente--</option>
                            <?php
                                Codigos::selectPacientes($conexion);
                            ?>
                              
                        </select>
                    </form>

                    
                </div>
                
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-xl-offset-3 col-lg-offset-3 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                
                <div class="card-box traePaciente" style="border-radius:0px; border:5px solid #1bb99a; display:none"></div>
                
            </div>
        </div>
        
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
<!-- Toastr js -->
<script src="assets/plugins/toastr/toastr.min.js"></script>
<script src="assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>
<script src="assets/js/consultas.js"></script>

<script>
$(document).ready(function(){
    
    $("#pac").select2();
    
    $("#pac").change(function(){
        
        var parametros = {
            "pac": $('#pac option:selected').val()
        };
        
        $.ajax({
            method: "POST",
            url: "lib/pagos.php",
            data: parametros,
            beforeSend:function(){
              //$("#loader").css("display","inline");
          },
           complete: function(){
              $("#loader").css("display","none");
              $("#seleccionar_paciente").html("Paciente");
              $("#tipo_consulta").select2();
              $("#fechaConsulta").focus();
               
          }, 
          }).done( function( info ){
            console.log( info );
            $(".traePaciente").fadeIn("slow").html(info);
            verificarMotivo();
            nueva_consulta();
          });
        
    });
    
    
});

</script>
</body>
</html>