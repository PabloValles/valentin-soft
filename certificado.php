<?php include("header.php");?>
<link rel="stylesheet" type="text/css" href="assets/plugins/jquery.steps/demo/css/jquery.steps.css" />
<style>
    .form-control:focus{
        background-color: white;
        border-color: #04be93 !important;
    }
    .form-control:hover{
        border-color: #04be93 !important;
    }
</style>
    <body>
        <?php include("navs.php");?>
        <div class="wrapper">
            <div class="container">
               <br>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <h4 class="header-title m-t-0">Certificado de embarazo</h4>
                                    <p class="text-muted font-13 m-b-30">
                                        Módulo para imprimir el certificado de embarazo
                                    </p>

                                    <form id="wizard-vertical">

                                        <h3>Paciente</h3>
                                        <section>
                                            <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="userName1">Seleccione el paciente *</label>
                                                <div class="col-lg-10">
                                                    <select name="userName" id="userName1" class="form-control select2">
                                                        <option value=" ">-- Seleccione la paciente--</option>
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
                                            <span id="loader">
                                                <img src="assets/images/anim-loader.gif" alt="">
                                            </span>
                                            <div class="form-group clearfix" id="details_pac"></div>
                                        </section>
                                                                                
                                        <h3>Imprimir</h3>
                                        <section>
                                            <div class="form-group clearfix">
                                                <div class="col-lg-12">
                                                    <h4>Certificado generado: <i class="fa fa-eye pull-right"></i></h4>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group clearfix">

                                                <label class="col-lg-2 control-label" for="name1"> Imprimir *</label>
                                                <div class="col-lg-10">
                                                    <a href="#" class="btn btn-success btn-lg" id="imprimirOrden">  IMPRIMIR CERTIFICADO
                                                    </a>
                                                </div>
                                            </div>
                                        </section>

                                    </form>
                                    <!-- End #wizard-vertical -->

                                </div>

                            </div>
                            
                        </div>
                    </div><!-- end col-->

                </div>
                <!-- end row -->

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
        <!--Form Wizard-->
        <script src="assets/plugins/jquery.steps/build/jquery.steps.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="assets/plugins/toastr/toastr.min.js"></script>
        <script src="assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
        
        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        
        <script>
        $(document).ready(function(){
            $('#imprimirOrden').click(function(){
                var id_para_imprimir = $('#id_imprimir').val();
                var imp_1 = $("#resumen_1").text();
                var imp_2 = $("#resumen_2").text();
                var imp_3 = $("#resumen_3").text();
                window.location.href = "ordenes/orden_certificado.php?id="+id_para_imprimir+"&imp_1="+imp_1+"&imp_2="+imp_2+"&imp_3="+imp_3;
            });
            $("#loader").hide();
            $('#userName1').select2();
            $("#userName1").change(function(){
                var parametros = {
                    "pac": $('#userName1 option:selected').val()
                };
                $.ajax({
                    method: "POST",
                    url: "ordenes/certificado.php",
                    data: parametros,
                    beforeSend:function(){
                      //$("#loader").css("display","inline");
                        $("#loader").show();
                        $("#details_pac").hide();
                  },
                   complete: function(){
                      $("#loader").css("display","none");
                  }, 
                  }).done( function( info ){
                    $("#details_pac").fadeIn("slow").html(info);
                    $fum = $('#fum').val();
                    $fecha_hoy = $("#hoy").val();

                    var fecha = new Date($fum);
                    var hoy = new Date($fecha_hoy);

                    console.log(fecha);
                    console.log(hoy);

                    var ed = parseInt((hoy - fecha)/7/24/60/60/1000);
                    console.log(ed);
                    $('#semanas').html(ed);
                  });
            });
                
                
                
        });
        </script>
        <script>
            !function($) {
            "use strict";

            var FormWizard = function() {};
                //creates vertical form
                FormWizard.prototype.createVertical = function($form_container) {
                    $form_container.steps({
                        headerTag: "h3",
                        bodyTag: "section",
                        transitionEffect: "fade",
                        stepsOrientation: "vertical"
                    });
                    return $form_container;
                },

                FormWizard.prototype.init = function() {

                    //vertical form
                    this.createVertical($("#wizard-vertical"));
                },
                //init
                $.FormWizard = new FormWizard, $.FormWizard.Constructor = FormWizard
            }(window.jQuery),

            //initializing 
            function($) {
                "use strict";
                $.FormWizard.init()
            }(window.jQuery);

            var functionSemanas = function(fecha,fecha2){
                //var fecha = new Date(fecha);
                //y = new Date(fecha2);
                var ed = parseInt((fecha - fecha2)/7/24/60/60/1000);
                console.log(ed);
                $eg = $("#semanas").val(ed);
            }
        </script>

    </body>
</html>