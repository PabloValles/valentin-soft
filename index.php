<?php include("header.php");
// Contadores ----------
$pacientes=mysqli_query($conexion,"select id_paciente from pacientes") or die(mysqli_error($conexion));
$total_pacientes=mysqli_num_rows($pacientes);
# .....................
$consultas=mysqli_query($conexion,"select idConsulta from consultas") or die(mysqli_error($conexion));
$total_consultas=mysqli_num_rows($consultas);
# .....................
$consultas=mysqli_query($conexion,"select idConsulta from consultas") or die(mysqli_error($conexion));
$total_consultas=mysqli_num_rows($consultas);
?>
<style>
    .bor{
        border-radius: 0px;
        border:10px solid rgba(0, 0, 0, 0.14);
    }
</style>

    <body>
        <?php include("navs.php");?>
        
        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                            <button type="button" class="btn btn-secondary dropdown-toggle waves-effect waves-light"
                                    data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i
                                    class="fa fa-cog"></i></span></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="pacientes.php">Ir a pacientes</a>
                                <a class="dropdown-item" href="consultas.php">Consultas</a>
                                <a class="dropdown-item" href="#">Turnos</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="config.php">Configuraciones</a>
                            </div>

                        </div>
                        <h4 class="page-title"><i class="pe-7s-id"></i> Bienvenida doctora</h4>
                    </div>
                </div> <!-- boton settings -->
                
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="card card-inverse card-info text-xs-center" style="box-shadow:0px 4px 10px #b2b2b2">
                            <div class="card-block">
                                <h3 class="card-title">Panel de control </h3>
                                <p class="card-text"><i class="fa fa-arrow-down"></i> Seleccione una pestaña de aquí abajo <i class="fa fa-arrow-down"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-6 col-sm-6 col-xl-3">
                        <div class="card-box tilebox-one">
                            <i class="icon-people pull-xs-right text-muted"></i>
                            <h6 class="text-muted text-uppercase m-b-20">Pacientes</h6>
                            <h2 class="m-b-20" data-plugin="counterup">
                                <?php echo $total_pacientes;?>
                            </h2>
                            <span class="label label-default" style="background-color:#64b0f2"> Click </span> <span class="text-muted">Zona de pacientes</span><br><br>
                            <a class="btn btn-custom btn-block" href="pacientes.php" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Click aquí para ver todos los pacientes">Pacientes</a>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-sm-6 col-xl-3">
                        <div class="card-box tilebox-one">
                            <i class="icon-docs pull-xs-right text-muted"></i>
                            <h6 class="text-muted text-uppercase m-b-20">Consultas</h6>
                            <h2 class="m-b-20"><span data-plugin="counterup"><?php echo $total_consultas;?></span></h2>
                            <span class="label label-info"> Click </span> <span class="text-muted">Zona de consultas</span><br><br>
                            <a class="btn btn-info btn-block" href="consultas.php" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Click aquí para ver todos las consultas">Consultas</a>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-sm-6 col-xl-3">
                        <div class="card-box tilebox-one">
                            <i class="icon-printer pull-xs-right text-muted"></i>
                            <h6 class="text-muted text-uppercase m-b-20">Órdenes</h6>
                            <h2 class="m-b-20"><span data-plugin="counterup">37</span></h2>
                            <span class="label label-pink"> Click </span> <span class="text-muted">Imprimir órdenes</span><br><br>
                            <a class="btn btn-pink btn-block" href="ordenRapida.php">Órdenes</a>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-sm-6 col-xl-3">
                        <div class="card-box tilebox-one">
                            <i class="icon-settings pull-xs-right text-muted"></i>
                            <h6 class="text-muted text-uppercase m-b-20">Configuración</h6>
                            <h2 class="m-b-20" data-plugin="counterup">100</h2>
                            <span class="label label-default" style="background-color:#9261c6;"> Click </span> <span class="text-muted">Configuraciones grales.</span>
                            <br><br>
                            <a class="btn btn-purple btn-block" href="config.php">Config</a>
                        </div>
                    </div>
                </div>
                <hr><br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="border-radius: 0px; border:2px solid #ccc">
                            <div class="card-block">
                                <h3 class="card-title">Imprimir órden rápida</h3>
                                <hr>
                                <form method="post" action="ordenes/another_doc_consulta.php">
                                    <div class="form-group row">
                                        <label for="orden_tipo" class="col-sm-2 form-control-label"><mark>Tipo de órden</mark></label>
                                        <div class="col-sm-10">
                                            <select name="orden_tipo" id="orden_tipo" class="form-control" required="required">
                                                <option value="consulta">1) Orden de consulta</option>
                                                <option value="pap">2) Orden de pap y colpo</option>
                                                <option value="internacion">3) Orden de internación</option>
                                                <option value="recetario">4) Recetario</option>
                                                <option value="blanco">5) Órden en "blanco"</option>
                                                <option value="COD_110284">6) Mod. colocacion de sist. intrauterino - cod: 11.02.84</option>
                                                <option value="COD_110285">7) Mod. recolocacion de sist. intrauterino - cod: 11.02.85</option>
                                                <option value="COD_110286">8) Mod. colocación de implante subdérmico etonogestrel - cod: 11.02.86</option>
                                                <option value="COD_110287">9) Mod. extracción de implante subdérmico etonogestrel - cod: 11.02.87</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="another_doc" class="col-sm-2 form-control-label"><mark>Seleccione el doctor</mark></label>
                                        <div class="col-sm-10">
                                            <select name="another_doc" id="another_doc" class="form-control" required="required">
                                                <option value="1">DRA. MARISA CRESPO</option>
                                                <option value="2">DR. &nbsp;&nbsp;JAIR FERNANDEZ CARAM</option>
                                                <option value="3">DR. &nbsp;&nbsp;JOSE ROSSI</option>
                                                <option value="4">DRA. FABIANA VALLES</option>
                                                <option value="5">DRA. GABRIELA CASTELLER</option>
                                                <option value="6">DR. NICOLAS YACOMO</option>
                                                <option value="7">DRA. MARTA INES MARIANETTI</option>
                                                <option value="8">DRA. PAULA GONZALEZ</option>
                                                <option value="9">DRA. CALDERON ALICIA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="paciente_select">
                                        <label for="another_doc" class="col-sm-2 form-control-label"><mark>Seleccione el paciente</mark></label>
                                        <div class="col-sm-10">
                                            <select name="pac" id="pac" class="form-control select2" style="width:auto">
                                                <option value="0">PACIENTE PARA COMPLETAR DATOS </option>
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
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Imprimir</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <br><br>
               <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                2016 © Dra. Fabiana Valles.
                                <span class="pull-right"><i class="fa fa-heart" style="color:red"></i> Design by Pablo Valles</span>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->
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
        <!-- Counter Up  -->
        <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>
        <script src="assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

   
<script>
$(document).ready(function(){
    $("#pac").select2();

    $("#btn-consulta").click(function(event) {
        /* Act on the event */
        var doc = $("#another_doc").val();
        var pac = $("#pac").val();

        if (doc != "") {
            //alert(doc);
            $(location).attr('href',"ordenes/another_doc_consulta.php?id="+pac+"&doc="+doc);
        }else{
            alert("Escriba el nombre del doctor.");
            $("#another_doc").focus();
        }
    });

    $("#orden_tipo").change(function() {
        var valor = $("#orden_tipo").val();
        if (valor == "blanco") {
            $("#paciente_select").hide('slow');
        }else{
            $("#paciente_select").show('slow');
        }
    });
});      
        
</script>
    </body>
</html>