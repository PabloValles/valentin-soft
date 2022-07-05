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
                                    <h4 class="header-title m-t-0">Creador de órdenes</h4>
                                    <p class="text-muted font-13 m-b-30">
                                        Módulo para crear órdenes personalizadas.
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
                                        
                                        <h3>Solicito</h3>
                                        <section>
                                            <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label" for="name1"> Solicito *</label>
                                                <div class="col-lg-10">
                                                    <textarea name="solicito" id="solicito" class="form-control" rows="8" required="required"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group clearfix">

                                                <label class="col-lg-2 control-label" for="name1"> Diagnóstico *</label>
                                                <div class="col-lg-10">
                                                    <input id="diag" name="diag" type="text" class="required form-control">
                                                </div>
                                            </div>
                                            
                                        </section>
                                        
                                        <h3>Imprimir</h3>
                                        <section>
                                            <div class="form-group clearfix">
                                                <div class="col-lg-12">
                                                    <h4>Resumen de la órden: <i class="fa fa-eye pull-right"></i></h4>
                                                    <hr>
                                                    <p class="resumen_ok_1"></p>
                                                    <p class="resumen_ok_2"></p>
                                                    <p class="resumen_ok_3"></p>
                                                    <p class="resumen_ok_4"></p>
                                                    <br>
                                                    <p class="resumen_ok_5"></p>
                                                    <p class="resumen_ok_6"></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group clearfix">

                                                <label class="col-lg-2 control-label" for="name1"> Imprimir *</label>
                                                <div class="col-lg-10">
                                                    <a href="#" class="btn btn-success btn-lg" id="imprimirOrden">
                                                        <i class="fa fa-print fa-3x"></i> 
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
            $("#diag").blur(function(){
                resumen();
            })
            $('#imprimirOrden').click(function(){
                var id_para_imprimir = $('#id_imprimir').val();
                var imp_1 = $(".resumen_ok_5").text();
                var imp_2 = $(".resumen_ok_6").text();
                window.location.href = "ordenes/orden_generada.php?id="+id_para_imprimir+"&imp_1="+imp_1+"&imp_2="+imp_2;
            });
            $("#loader").hide();
            $('#userName1').select2();
            $("#userName1").change(function(){
                var parametros = {
                    "pac": $('#userName1 option:selected').val()
                };
                $.ajax({
                    method: "POST",
                    url: "ordenes/generador.php",
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
                    console.log( info );
                    $("#details_pac").fadeIn("slow").html(info);
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
            
            var resumen = function(){
                
                var nombre = $('#resumen_1').text();
                var os = $('#resumen_2').text();
                var nro = $('#resumen_3').text();
                var plan = $('#resumen_4').text();
                var solicito = $('#solicito').val();
                var diag = $('#diag').val();
                
                $(".resumen_ok_1").html(nombre);
                $(".resumen_ok_2").html(os);
                $(".resumen_ok_3").html(nro);
                $(".resumen_ok_4").html(plan);
                $(".resumen_ok_5").html(solicito);
                $(".resumen_ok_6").html("Diag: "+diag);
                
            }
        </script>

    </body>
</html>