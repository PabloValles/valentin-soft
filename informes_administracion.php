<?php include("header.php");
include "pruebas.php";
error_reporting(0);
?>

<style>
    body {
        padding-bottom: 400px;
    }

    input[type=date] {
        padding-left: 2.5% !important;
    }
</style>
<!-- DataTables -->
<link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<body>

    <?php include("navs.php"); ?>
    <div class="wrapper">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="btn-group pull-right m-t-15">
                        <button type="button" class="btn btn-secondary dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Seleccione el reporte a imprimir <span class="m-l-5"><i class="fa fa-print"></i></span></button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="informes.php?tag=consultas">Reporte de consultas</a>
                            <a class="dropdown-item" href="informes.php?tag=fpp">Reporte de fpp</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php">Panel de control</a>
                        </div>

                    </div>
                    <h4 class="page-title">Sector de informes</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            <h4><i class="fa fa-print" aria-hidden="true"></i> Informe de cobros</h4>
                        </div>
                        <div class="card-body card-block">
                            <form action="informes_adm_resultados.php" method="post" id="frm_adm_1">
                                <input type="hidden" name="opcion" value="_informe1">
                                <div class="form-group row" style="align-items: center">
                                    <label for="fecha_adm_1" class="col-md-3">Desde</label>
                                    <input type="date" class="form-control col-md-9" name="fecha_adm_1" id="fecha_adm_1">
                                </div>
                                <div class="form-group row" style="align-items: center">
                                    <label for="fecha_2_adm_1" class="col-md-3">Hasta</label>
                                    <input type="date" class="form-control col-md-9" name="fecha_2_adm_1" id="fecha_2_adm_1">
                                </div>
                                <div class="form-group">
                                    <label for="tipo_adm_1">Tipo de Informe</label>
                                    <select class="form-control" name="tipo_adm_1" id="tipo_adm_1">
                                        <option value="1">1) Valor a cobrar</option>
                                        <option value="2">2) Valor según Obra social</option>
                                        <option value="3">3) Valor según Liquidación</option>
                                        <option value="4">4) Listado general</option>
                                        <option value="5">5) Listado según Obra social</option>
                                        <option value="6">6) Listado según Liquidación</option>
                                    </select>
                                </div>
                                <div class="form-group" id="obraSocial_display">
                                    <label for="os_adm_1">Obra social</label><br>
                                    <select class="form-control" name="os_adm_1" id="os_adm_1" style="width: 100% !important">
                                        <option value="0">Seleccione</option>
                                        <?php echo Codigos::selectObraSociales($conexion); ?>
                                    </select>
                                </div>
                                <div class="form-group" id="liq_display">
                                    <label for="liq_adm_1">Liquidación</label><br>
                                    <select class="form-control" name="liq_adm_1" id="liq_adm_1" style="width: 100% !important">
                                        <?php echo Codigos::selectLiquidacion($conexion); ?>
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <input type="submit" value="Filtrar" class="btn btn-dark btn-block btn-lg">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            <h4><i class="fa fa-print" aria-hidden="true"></i> Valores a cobrar mensual</h4>
                        </div>
                        <div class="card-body card-block">
                            <form action="" method="post" id="frm_adm_2">
                                <div class="form-group row" style="align-items: center">
                                    <label for="fecha_adm_2" class="col-md-3">Mes</label>
                                    <select id="fecha_adm_2" class="form-control col-md-9" name="fecha_adm_2">
                                        <option value="1">Enero</option>
                                        <option value="2">Febrero</option>
                                        <option value="3">Marzo</option>
                                        <option value="4">Abril</option>
                                        <option value="5">Mayo</option>
                                        <option value="6">Junio</option>
                                        <option value="7">Julio</option>
                                        <option value="8">Agosto</option>
                                        <option value="9">Septiembre</option>
                                        <option value="10">Octubre</option>
                                        <option value="11">Noviembre</option>
                                        <option value="12">Diciembre</option>
                                    </select>
                                </div>
                                <div class="form-group row" style="align-items: center">
                                    <label for="fecha_2_adm_2" class="col-md-3">Año</label>
                                    <select id="fecha_2_adm_2" class="form-control col-md-9" name="fecha_2_adm_2">
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tipo_adm_2">Tipo de Informe</label>
                                    <select class="form-control" name="tipo_adm_2" id="tipo_adm_2">
                                        <option value="1">1) Valor a cobrar</option>
                                        <option value="2">2) Valor según Obra social</option>
                                        <option value="3">3) Valor según Liquidación</option>
                                    </select>
                                </div>
                                <div class="form-group" id="obraSocial_display2">
                                    <label for="os_adm_2">Obra social</label><br>
                                    <select class="form-control" name="os_adm_2" id="os_adm_2" style="width: 100% !important">
                                        <?php echo Codigos::selectObraSociales($conexion); ?>
                                    </select>
                                </div>
                                <div class="form-group" id="liq_display2">
                                    <label for="liq_adm_2">Liquidación</label><br>
                                    <select class="form-control" name="liq_adm_2" id="liq_adm_2" style="width: 100% !important">
                                        <?php echo Codigos::selectLiquidacion($conexion); ?>
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <input type="submit" value="Filtrar" class="btn btn-dark btn-block btn-lg">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header bg-danger" style="text-align: center">
                            <h4><i class="fa fa-print" aria-hidden="true"></i> PARTICULARES</h4>
                        </div>
                        <div class="card-body card-block">
                            <form action="" method="post" id="frm_adm_3">
                                <div class="form-group row">
                                    <label for="fecha_adm_3" class="col-md-3">Mes</label>
                                    <select id="fecha_adm_3" class="form-control col-md-9" name="fecha_adm_2">
                                        <option value="1">Enero</option>
                                        <option value="2">Febrero</option>
                                        <option value="3">Marzo</option>
                                        <option value="4">Abril</option>
                                        <option value="5">Mayo</option>
                                        <option value="6">Junio</option>
                                        <option value="7">Julio</option>
                                        <option value="8">Agosto</option>
                                        <option value="9">Septiembre</option>
                                        <option value="10">Octubre</option>
                                        <option value="11">Noviembre</option>
                                        <option value="12">Diciembre</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="fecha_2_adm_3" class="col-md-3">Año</label>
                                    <select id="fecha_2_adm_3" class="form-control col-md-9" name="fecha_2_adm_3">
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <input type="submit" value="Filtrar" class="btn btn-dark btn-block btn-lg">
                                </div>
                            </form>
                        </div>
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
    <!-- Required datatable js -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables/jszip.min.js"></script>
    <script src="assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>


    <!-- Toastr js -->
    <script src="assets/plugins/toastr/toastr.min.js"></script>
    <script src="assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>


    <script>
        $(document).ready(function() {
            $("#obraSocial_display").hide();
            $("#liq_display").hide();
            $("#obraSocial_display2").hide();
            $("#liq_display2").hide();

            $("#frm_adm_1").submit(function(e) {
                var fecha_adm_1 = $("#fecha_adm_1").val();
                var fecha_adm_2 = $("#fecha_2_adm_1").val();

                if (fecha_adm_1 == "" || fecha_adm_2 == "") {
                    e.preventDefault();
                    alert("Fechas vacías");
                }

            });


            $('#tipo_adm_1').select2();
            $('#os_adm_1').select2();
            $('#liq_adm_1').select2();
            $('#tipo_adm_2').select2();
            $('#os_adm_2').select2();
            $('#liq_adm_2').select2();

            $('#tipo_adm_1').change(function() {
                var tipo = $('#tipo_adm_1').val();
                traer_os(tipo);
                traer_liq(tipo);
            })
            $('#tipo_adm_2').change(function() {
                var tipo = $('#tipo_adm_2').val();
                traer_os2(tipo);
                traer_liq2(tipo);
            })


        });

        var traer_os = function(type) {
            if (type != "") {
                if (type == 2 || type == 5) {
                    $("#obraSocial_display").show('slow');
                } else {
                    $("#obraSocial_display").hide('slow');
                }

            }
        }
        var traer_liq = function(type) {
            if (type != "") {
                if (type == 3 || type == 6) {
                    $("#liq_display").show('slow');
                } else {
                    $("#liq_display").hide('slow');
                }

            }
        }
        var traer_os2 = function(type) {
            if (type != "") {
                if (type == 2 || type == 5) {
                    $("#obraSocial_display2").show('slow');
                } else {
                    $("#obraSocial_display2").hide('slow');
                }

            }
        }
        var traer_liq2 = function(type) {
            if (type != "") {
                if (type == 3 || type == 6) {
                    $("#liq_display2").show('slow');
                } else {
                    $("#liq_display2").hide('slow');
                }

            }
        }
    </script>
</body>

</html>