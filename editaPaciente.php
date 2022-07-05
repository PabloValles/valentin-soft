<?php include("header.php");
?>

<?php
$id = $_REQUEST['accion'];

//consulta
$sql = "SELECT * from pacientes, antecedentes_personales, antecedentes_ginecoobs where pacientes.id_paciente = '$id' and antecedentes_personales.id_paciente='$id' and antecedentes_ginecoobs.id_paciente='$id'";
$query = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

$llena_paciente = mysqli_fetch_array($query);
$fecha_desde = $llena_paciente['desde_pac'];
$obra_social_paciente = $llena_paciente['obsocial_pac'];
$mes_desde = date('m', strtotime($fecha_desde));
$anio_desde = date('Y', strtotime($fecha_desde));
if ($anio_desde == "1969") {
    $anio_desde = null;
}
$vigencia_desde = $anio_desde . "-" . $mes_desde;

$fecha_hasta = $llena_paciente['hasta_pac'];
$mes_hasta = date('m', strtotime($fecha_hasta));
$anio_hasta = date('Y', strtotime($fecha_hasta));
if ($anio_hasta == "1969") {
    $anio_hasta = null;
}
$vigencia_hasta = $anio_hasta . "-" . $mes_hasta;


?>
<style>
    #myTab {
        font-size: 16px;
    }

    #myTab>.nav-item>.nav-link.active {
        background-color: white;
        color: #29a8b5;
        font-style: italic;
    }

    #myTab>.nav-item>.nav-link {
        color: black;
        background-color: rgba(186, 181, 181, 0.11);
    }

    input#cod:hover,
    input#cod:active {
        background-color: #eceeef !important;
        border: 1px solid #b7b3b3 !important;
    }
</style>
<script src="assets/js/calcularEdad2.js"></script>

<body>

    <?php include("navs.php"); ?>
    <header id="topnav" class="mostrar" style="display:none;">
        <div class="topbar-main" style="background-color:rgba(255, 255, 255, 1);border-bottom:2px solid #ccc;">
            <div class="container">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.php" class="logo" style="font-size:16px;color:black !important;">
                        <i class="zmdi zmdi-assignment-account icon-c-logo"></i>
                        <span>Paciente: <?php echo $llena_paciente['apellido_pac'] . " " . $llena_paciente['nombre_pac']; ?></span>
                    </a>
                </div>
                <!-- End Logo container-->


                <div class="menu-extras">

                </div> <!-- end menu-extras -->
                <div class="clearfix"></div>

            </div> <!-- end container -->
        </div>
        <!-- end topbar-main -->

    </header>


    <div class="wrapper">
        <div class="container">
            <?php
            include("includes/ExamenFisico/modal_nuevo.php");

            ?>
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="btn-group pull-right m-t-15">
                        <button type="button" class="btn btn-success dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Volver <span class="m-l-5"><i class="fa fa-undo"></i></span></button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="pacientes.php">Volver a pacientes</a>
                        </div>

                    </div>
                    <h4 class="page-title"><i class="fa fa-user"></i> PACIENTE - DNI: <span style="background-color:yellow"><?php echo $llena_paciente['apellido_pac'] . " " . $llena_paciente['nombre_pac'] . " - " . $llena_paciente['dni_pac']; ?></span></h4>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">

                    <div class="card">
                        <h3 class="card-header">Datos del paciente</h3>
                        <div class="card-block">

                            <ul class="nav nav-tabs m-b-20" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="datos_personales-tab" data-toggle="tab" href="#datos_personales" role="tab" aria-controls="home" aria-expanded="true">Datos Personales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Antecedentes_p-tab" data-toggle="tab" href="#Antecedentes_p" role="tab" aria-controls="profAntecedentes_pile">Antecedentes Personales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Antecedentes_g-tab" data-toggle="tab" href="#Antecedentes_g" role="tab" aria-controls="Antecedentes_g">Antec. Gineco-obstétricos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="examen_fisico-tab" data-toggle="tab" href="#examen_fisico" role="tab" aria-controls="examen_fisico">Examen físico</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="ficha-tab" data-toggle="tab" href="#ficha" role="tab" aria-controls="ficha">Ficha obstétrica</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="ficha-notas" data-toggle="tab" href="#notas" role="tab" aria-controls="ficha">Notas</a>
                                </li>
                            </ul>

                            <form action="" method="post" id="editarPaciente">

                                <div class="tab-content" id="myTabContent">
                                    <?php
                                    include("includes/Pacientes/tabs.php"); ?>
                                    <div class="tab-pane fade" id="examen_fisico" role="tabpanel" aria-labelledby="dropdown2-tab">
                                        <input type="hidden" value="<?php echo $id; ?>" id="id_paciente_gral" name="id_paciente_gral">
                                        <div class="listado_fichas"></div>
                                    </div>
                                    <div class="tab-pane fade" id="ficha" role="tabpanel" aria-labelledby="dropdown2-tab">
                                        <div class="listado_fichas_obs"></div>
                                    </div>
                                    <div class="tab-pane fade" id="notas" role="tabpanel" aria-labelledby="dropdown2-tab">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                                <textarea class="form-control has success" name="notas_adicionales_paciente" style="width: 100%; font-size: 13px" rows="15"><?php echo $llena_paciente['notas']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="modificar" class="btn btn-success btn-lg waves-effect waves-light" style="display:scroll;position:fixed;right:0%;bottom:5%">
                                    GUARDAR <br> CAMBIOS
                                </button>
                            </form>
                            <div class="mensaje"></div>
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

    <!-- Modal-Effect -->
    <script src="assets/plugins/custombox/js/custombox.min.js"></script>
    <script src="assets/plugins/custombox/js/legacy.min.js"></script>

    <!-- Toastr js -->
    <script src="assets/plugins/toastr/toastr.min.js"></script>
    <script src="assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

    <!-- Sweet Alert js -->
    <script src="assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
    <script src="assets/js/moment.min.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>
    <script src="assets/js/consultas.js"></script>


    <script>
        $(document).ready(function() {
            editarPaciente();
            examen_Fisico();
            ficha_obs();
            tabla_consultas();
            examen_fisico_nuevo();
            $("#dividendo1").blur(function() {
                obtenerSumaa();
            });
            $("#dividendo2").blur(function() {
                obtenerSumaa();
            });
            $("#tipo_consulta").select2();
            $("#help_manual").hide();
            //$("#buscar_nuevo").hide();
            //$("#tipo_consulta2").val("");

            $('#no_existe').click(function() {
                /* $('#buscar_nuevo').show("");
                $('#no_existe').hide("slow");
                $("#quitar").hide();
                $("#tipo_consulta").val("");
                $("#tipo_consulta2").show();
                $("#help_manual").show();
                $("#tipo_consulta2").focus();
                $("#cod").val(""); */
                location.href = "config.php";
            });

            $('#fechaConsulta').change(function() {
                var fc = $(this).val();
                //var fp = $("#f_presentacion").val();
                var dias_cobro = $("#d_cobro").val();
                var dc = parseInt(dias_cobro);

                if (dc != 0 && dc != "") {
                    console.log(dc)
                    fecha_presentacion(fc);
                    var fp_ok = $("#f_presentacion").val();
                    fecha_cobro(fp_ok, dc);
                } else if (dc == 0) {
                    $("#f_presentacion").val(fc);
                    $("#f_cobro").val(fc);
                } else {
                    $("#f_presentacion").val(fc);
                    $("#f_cobro").val(fc);
                }


            });

            //FUNCION PARA ENMASCARAR LOS INPUTS
            /* $("#obsocial_pac").change(function() {
                var obra_social_seleccionada = $("#obsocial_pac");

                if(obra_social_seleccionada=="OSPE" || obra_social_seleccionada=="ospe"){
                    console.log("OSPE")
                }
            }); */
        });
        $(document).on('click', '.delete_mini_consulta', function() {
            var id_mini = $(this).attr("id");
            swal({
                title: "Seguro desea eliminar la consulta?",
                text: "No podrá recuperar lo que haya borrado.",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn-danger',
                confirmButtonText: "Si, borrar",
                closeOnConfirm: false
            }, function() {
                $.ajax({
                    url: "includes/Consultas/eliminar_consulta.php",
                    method: "POST",
                    data: {
                        id_mini: id_mini
                    },
                    success: function(data) {
                        swal("Eliminado!", "La consulta ha sido eliminada. Aguarde 1 segundo por favor", "success");
                        //window.location.href = "editaPaciente.php?accion="+id_paciente_general;
                        //setTimeout(bye(), 10000);
                        tabla_consultas();
                    }
                });
            });
        });
        $(document).on('click', '.borrar_ficha_obs', function() {
            var id_fila = $(this).attr("id");
            swal({
                title: "Seguro desea eliminar la fila?",
                text: "No podrá recuperar lo que haya borrado.",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn-danger',
                confirmButtonText: "Si, borrar",
                closeOnConfirm: false
            }, function() {
                $.ajax({
                    url: "includes/ExamenOBs/delete_ficha_general.php",
                    method: "POST",
                    data: {
                        id_fila: id_fila
                    },
                    success: function(data) {
                        swal("Eliminado!", "La fila ha sido eliminada. Aguarde 1 segundo por favor", "success");
                        //window.location.href = "editaPaciente.php?accion="+id_paciente_general;
                        setTimeout(bye(), 10000);
                    }
                });
            });
        });
        $(window).scroll(function() {
            if ($(this).scrollTop() > 1) {
                $(".esconder").hide();
                $(".mostrar").show();
            } else {
                $(".esconder").fadeIn();
                $(".mostrar").hide();
            }
        });
        var obtenerSumaa = function() {
            var result = $("#resultado").val();
            var dividendo1 = $("#dividendo1").val();
            var dividendo2 = $("#dividendo2").val();

            result = parseFloat(dividendo1 / Math.pow(parseFloat(dividendo2), 2)).toFixed(2);
            $("#resultado").val(result);
        }
        var examen_Fisico = function() {
            var id_para_Examen = $("#id_paciente_gral").val();
            $.post("includes/ExamenFisico/tabla_examen.php", {
                    valor_id: id_para_Examen
                },
                function(msj) {
                    $(".listado_fichas").html(msj);
                });
        }
        var ficha_obs = function() {
            var id_pac = $("#id_paciente_gral").val();
            $.post("includes/ExamenObs/tabla_ficha.php", {
                    valor_id: id_pac
                },
                function(msj) {
                    $(".listado_fichas_obs").html(msj);
                });
        }
        var tabla_consultas = function() {
            var id_pac = $("#id_paciente_gral").val();
            $.post("includes/Consultas/tabla_ficha.php", {
                    valor_id: id_pac
                },
                function(msj) {
                    $(".listado_consultas").html(msj);
                });
        }
        var examen_fisico_nuevo = function() {
            $('#frm_ex_fis_new').on('submit', function(e) {
                e.preventDefault();
                var frm = $(this).serialize();
                $.ajax({
                    method: "POST",
                    url: "lib/process.php",
                    data: frm,
                    beforeSend: function() {
                        $("#loader").css("display", "inline");
                    },
                    complete: function() {
                        $("#loader").css("display", "none");
                        $(".bs-example-modal-lg").modal("hide");
                        Command: toastr["success"]("Bien hecho! has creado una nueva ficha.")
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
                }).done(function(info) {
                    console.log(info);
                    $(".info").fadeIn("slow").html(info);
                    $("#loader").css("display", "none");
                    examen_Fisico();
                    $('#frm_ex_fis_new')[0].reset();
                });
            });
        }
        var editarPaciente = function() {
            $('#editarPaciente').on('submit', function(e) {
                e.preventDefault();
                var frm = $(this).serialize();
                $.ajax({
                    method: "POST",
                    url: "lib/editarPaciente.php",
                    data: frm,
                    beforeSend: function() {
                        $("#loader").css("display", "inline");
                        //$("#guardar").html("loading...");
                    },
                    complete: function() {
                        $("#loader").css("display", "none");
                    },
                }).done(function(info) {
                    console.log(info);
                    $(".mensaje").fadeIn("slow").html(info);
                    //$("#error").css("display","none");
                    $("#loader").css("display", "none");
                });
            });
        }
        var bye = function() {
            var id_paciente_general = $("#id_paciente_gral").val();
            window.location.href = "editaPaciente.php?accion=" + id_paciente_general;
        }
        var delete_mini_consulta = function() {
            $(".delete_mini_consulta").click(function() {
                var id_mini = $(this).attr("id");
                alert(id_mini);
            });
        }
        $("#tipo_consulta").change(function() {
            comprobar_codigo();
        });
        var comprobar_codigo = function() {
            var parametros = {
                "opcion": "tipoConsulta",
                "tag": "cod",
                "tipo": $('#tipo_consulta option:selected').val()
            };

            $.ajax({
                method: "POST",
                url: "lib/process.php",
                data: parametros,
                beforeSend: function() {
                    //$("#loader").css("display","inline");
                    $("#cod").css("border", "none");
                    $("#cod").css("color", "#c60707");
                    $("#cod").val("Aguarde...");
                },
                complete: function() {

                },
            }).done(function(cod) {
                console.log(cod);
                $("#cod").val(cod);
                $("#cod").css("border", "2px solid #bbe165");
                $("#cod").css("color", "#000");
                valor_consulta(cod)
                $("#v_consulta").hide();
            });
        }
        $("#btn_insertar_consulta").click(function() {
            $("#loader-consultas").show('slow');
            var id_paciente_consulta = $("#id_para_consulta").val();
            var apellido_paciente = $("#apellido_paciente").val();
            var nombre_paciente = $("#nombre_paciente").val();
            var dni_paciente = $("#dni_paciente").val();
            var obsocial_pac = $("#obsocial_pac").val();
            var plan_osocial_pac = $("#plan_osocial_pac").val();
            var nro_osocial_pac = $("#nro_osocial_pac").val();
            var fechaConsulta = $("#fechaConsulta").val();
            var tipo_consulta = $("#tipo_consulta").val();
            var liq = $("#liquidacion").val();
            var cod = $("#cod").val();

            var f_presentacion = $("#f_presentacion").val();
            var f_cobro = $("#f_cobro").val();
            var d_cobro = $("#d_cobro").val();
            var v_consulta = $("#v_consulta").val();
            var parametros = {
                "id_paciente_consulta": id_paciente_consulta,
                "apellido_paciente": apellido_paciente,
                "nombre_paciente": nombre_paciente,
                "dni_paciente": dni_paciente,
                "obsocial_pac": obsocial_pac,
                "plan_osocial_pac": plan_osocial_pac,
                "nro_osocial_pac": nro_osocial_pac,
                "fechaConsulta": fechaConsulta,
                "tipo_consulta": tipo_consulta,
                "liq": liq,
                "cod": cod,
                "f_presentacion": f_presentacion,
                "f_cobro": f_cobro,
                "v_consulta": v_consulta
            }

            if (fechaConsulta != "") {
                if (tipo_consulta != "" && cod != "") {
                    if (v_consulta != "") {
                        $.ajax({
                            data: parametros, //datos que se envian a traves de ajax
                            url: 'insertar_miniconsulta.php', //archivo que recibe la peticion
                            type: 'post', //método de envio
                            beforeSend: function() {
                                //$("#loader-consultas").show('slow');
                            },
                            success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                                console.log(response);
                                $(".response").html(response);
                                tabla_consultas();
                                $("#fechaConsulta").val("");
                                $("#tipo_consulta").val("");
                                $("#cod").val("");
                                $("#f_presentacion").val("");
                                $("#f_cobro").val("");
                                $("#v_consulta").val("");
                                $("#loader-consultas").hide('slow');
                            }
                        });
                    }
                }
            } else {
                alert("No has seleccionado correctamente la fecha de consulta.");
            }



        });


        var fecha_presentacion = function(Fecha) {
            myDate = new Date(Fecha);
            var day = myDate.getDate();
            myDate.setDate(day + 30);
            //si
            var x = myDate;
            dia = x.getDate();
            mes = x.getMonth() + 1;
            anio = x.getFullYear();

            if (dia < 10) {
                dia = "0" + x.getDate();
            }
            if (mes < 10) {
                mes = '0' + mes;
            }
            /*$("#resultado").html(dia + '-' + mes + '-' + anio);*/
            $('#f_presentacion').val(anio + '-' + mes + '-' + dia);
            $('#f_presentacion').css("border", "2px solid #bbe165");
        }

        var fecha_cobro = function(Fecha, dias_cobro) {
            myDate = new Date(Fecha);
            var day = myDate.getDate();
            myDate.setDate(day + dias_cobro);
            //si
            var x = myDate;
            dia = x.getDate();
            mes = x.getMonth() + 1;
            anio = x.getFullYear();

            if (dia < 10) {
                dia = "0" + x.getDate();
            }
            if (mes < 10) {
                mes = '0' + mes;
            }
            //$("#fecha_cobro").html(dia + '-' + mes + '-' + anio);
            $('#f_cobro').val(anio + '-' + mes + '-' + dia);
            console.log(anio + '-' + mes + '-' + dia);
            $('#f_cobro').css("border", "2px solid #bbe165");

        }

        var valor_consulta = function(cod) {
            var id_obrasocial_valores = $("#id_os").val();
            if (id_obrasocial_valores != "" && cod != "") {
                $.ajax({
                    url: "includes/config/precios_consultas.php",
                    method: "POST",
                    data: {
                        id_obrasocial_valores: id_obrasocial_valores,
                        codigo_consulta_valores: cod
                    },
                    beforeSend: function() {
                        $("#aguarde").show("slow");
                    },
                    success: function(data) {
                        console.log("El valor de la consulta es de: " + data);
                        $("#aguarde").hide("slow");
                        if (data != "" && data != 0) {
                            var valor_c = parseInt(data);
                            $("#v_consulta").show("slow");
                            $("#v_consulta").val(valor_c);
                        } else if (data == 0) {
                            $("#v_consulta").show();
                            $("#v_consulta").val("");
                            $("#small_help").show("slow");
                        } else {
                            console.log("error importante !!!");
                        }
                    }
                });
            } else {
                alert("Error: el codigo no ha sido seleccionado")
            }
        }
    </script>
</body>

</html>