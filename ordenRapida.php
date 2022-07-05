<?php include("header.php");?>
   <!-- DataTables -->
<link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<style>
body{
    background-color: #45509F;
}
#nice{
    background-color: rgba(0, 0, 0, 0.17);
    color: white;
    border: 4px solid rgba(0, 0, 0, 0.29);
    border-radius: 0px;
}
#nice:hover{
    background-color: rgba(0, 0, 0, 0.12);
    cursor: pointer;
}
#pac{
    background-color: rgba(0, 0, 0, 0.08) !important;
    border: 2px solid black !important;
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
                        <h4 class="page-title" style="color:white"><i class="fa fa-print"></i> Imprimir órden</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-xl-4">
                        <div class="card-box" id="nice">
                            <form action="" method="POST" role="form">
                                <div class="form-group">
                                    <legend id="seleccionar_paciente">Seleccione el paciente</legend>
                                
                                <select name="pac" id="pac" class="form-control select2" style="width:auto">
                                <option value="">-- Seleccione --</option>
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
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-xl-8">
                        <div class="traePaciente" style="display:none" ></div>
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

<!-- Required datatable js -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
<!-- Responsive examples -->
<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

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
            url: "lib/nuevaOrden2.php",
            data: parametros,
            beforeSend:function(){
              //$("#loader").css("display","inline");
          },
           complete: function(){
              $("#loader").css("display","none");
              $("#seleccionar_paciente").html("Paciente");
               
          }, 
          }).done( function( info ){
            //console.log( info );
            $(".traePaciente").fadeIn("slow").html(info);
            $("#dt_principales").DataTable();
            $("#dt_analiticas").DataTable();
            $("#dt_emb").DataTable();
            $("#dt_gin").DataTable();
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
          },
      }).done( function( info ){
            console.log( info );
            $(".msj").fadeIn("slow").html(info);
            $("#loader").css("display","none");
      });
    });
}
</script>
</body>
</html>