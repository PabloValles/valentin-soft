<?php include("header.php");?>    
<style>
    body{
        background-image: url(assets/images/gallery/fonde7.jpg);
        background-repeat: repeat-y;
        background-position: fixed;
    }
    #search{
        background-color: rgba(255, 255, 255, 0.06);
        box-shadow: 2px 2px 9px rgba(0, 0, 0, 0.1);
        color: white;
        border-radius: 0px !important; 
        border:12px solid rgba(0, 0, 0, 0.17) !important;
    }
    #search:hover{
        background-color: rgba(255, 255, 255, 0.11);
    }
    .form-control.select2{
        background-color: rgba(255, 255, 255, 0.13) !important;
    }
</style>

<body>

        <?php include("navs.php");?>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                           <a href="index.php" class="btn btn-secondary waves-effect waves-light">Volver</a>
                            <button type="button" class="btn btn-danger waves-effect waves-light dropdown-toggle"
                                    data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i
                                    class="fa fa-cog"></i></span></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="pacientes.php">Ir a pacientes</a>
                                <a class="dropdown-item" href="consultas.php">Consultas</a>
                                <a class="dropdown-item" href="generadorOrden.php">Generador de órden</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="config.php">Configuraciones</a>
                            </div>

                        </div>
                        <h4 class="page-title" style="color:white">Imprimir órden</h4>
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
                                <?php
                                $pac = "select * from pacientes order by apellido_pac";
                                $query = mysqli_query($conexion,$pac) or die(mysqli_error($conexion));
                                
                                    while($llena_paciente=mysqli_fetch_array($query)){
                                        ?>
                                        <option value="<?php echo $llena_paciente['id_paciente'];?>"><?php echo $llena_paciente['apellido_pac']." ".$llena_paciente['nombre_pac']." / DNI: ".$llena_paciente['dni_pac'];?></option>
                                        <?php
                                    }
                                ?>
                                      
                                </select>
                            </form>

                            
                        </div>
                        
                    </div>
                </div>
                
                <br>
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                        
                        <div class="traePaciente" style="border-radius:0px; display:none"></div>
                        
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
            url: "lib/nuevaOrden.php",
            data: parametros,
            beforeSend:function(){
              //$("#loader").css("display","inline");
          },
           complete: function(){
              $("#loader").css("display","none");
              $("#seleccionar_paciente").html("Paciente");
               
          }, 
          }).done( function( info ){
            console.log( info );
            $(".traePaciente").fadeIn("slow").html(info);
          });
        
        
    });
    
    
    
});
var nueva_consulta = function(){
    $("#frm_creaConsulta").on("submit", function(e){
      e.preventDefault();
      var frm = $(this).serialize();
      $.ajax({
        method: "POST",
        url: "lib/process.php",
        data: frm,
        beforeSend:function(){
              $("#loader").css("display","inline");
              $("#guarda").html("Guardando...");
          },
      }).done( function( info ){
            console.log( info );
            $(".msj").fadeIn("slow").html(info);
            $("#loader").css("display","none");
            $("#guarda").html("Crear consulta");
            $("#fechaConsulta").val(" ");
            $("#cod").val(" - ");
            $("#tipo_consulta").val(" ");
      });
    });
}
</script>
</body>
</html>