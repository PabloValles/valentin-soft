<?php include("header.php");
include "pruebas.php";
error_reporting(0);
$tag = $_REQUEST['tag'];
?>
<style>
    input[type=date] {
        padding-left: 1%;
    }

    .card:hover {
        box-shadow: 0px 0px 15px #ccc;
        transition-duration: 0.3s;

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
                        <a href="informes.php" class="btn btn-secondary waves-effect w-md waves-success m-b-5"><i class="fa fa-info-circle"></i> Informes</a>
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
            <?php
            if (isset($tag)) {
                switch ($tag) {
                    case "consultas":
            ?>
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-xs-12 col-xl-12 col-sm-12">
                                <a href="informes.php?tag=consultas" type="button" class="btn btn-info waves-effect waves-light" style="display:none" id="again">
                                    <span class="btn-label"><i class="fa fa-mouse-pointer"></i>
                                    </span>Volver a filtrar</a>
                                <div class="card card-block" id="type" style="border-top:4px solid #09afc4">
                                    <blockquote class="card-blockquote">
                                        <h5>Ingrese el rango de fechas y la obra social</h5>
                                        <hr>
                                        <form action="" id="frmFiltros" method="POST" role="form" style="pull-right">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-1 form-control-label" style="text-align:center; color:#000; font-size:15px;">Desde</label>
                                                <input type="date" id="fecha1" name="fecha1" class="form-control col-md-2">
                                                <label for="" class="col-md-1 form-control-label" style="text-align:center;color:black;font-size:15px;">Hasta</label>
                                                <input type="date" id="fecha2" name="fecha2" class="form-control col-md-2">

                                                <label for="" class="col-md-1 form-control-label" style="text-align:right;color:black;font-size:15px;">ObraSocial</label>
                                                <select class="col-sm-2 col-md-2 form-control c-select" id="obra_social" name="obra_social">
                                                    <optgroup label="Obras sociales">
                                                        <option value="all">TODAS</option>
                                                        <?php
                                                        $obraSocial = mysqli_query($conexion, "select * from osociales order by nombre");
                                                        while ($llena_obraSocial = mysqli_fetch_array($obraSocial)) {
                                                        ?>
                                                            <option value="<?php echo $llena_obraSocial['nombre']; ?>"><?php echo $llena_obraSocial['nombre']; ?></option>
                                                        <?php }
                                                        ?>
                                                    </optgroup>
                                                </select>
                                                <button type="submit" class="btn btn-secondary waves-effect waves-light col-md-offset-1 "><span class="btn-label"><i class="fa fa-filter"></i> </span>Aplicar filtros</button>
                                            </div>


                                        </form>
                                    </blockquote>
                                </div>

                            </div>
                        </div>
                        <div class="row" id="listado" style="display:none">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">
                                <br>
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Listado de consultas</b></h4>
                                    <br>
                                    <table id="dt_filtros" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Apellido</th>
                                                <th>Nombre</th>
                                                <th>Obra Social</th>
                                                <th>Plan</th>
                                                <th>N° Afil</th>
                                                <th>Fecha</th>
                                                <th>Cód</th>
                                                <th>Diag</th>
                                                <th>Diag</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                            </div>
                        </div>
                    <?php break;
                    case "fpp":
                    ?>
                        <div class="row">
                            <div class="col-md-8 col-lg-8 col-sm-8 col-xs-12">
                                <div class="card-box" style="border-top:5px solid #09afc4; border-radius:0px">
                                    <h2>Informes de fechas probables de parto</h2>
                                    <hr>
                                    <div class="table-responsive">
                                        <table id="dt_fpp" class="table table-striped table-bordered" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Paciente</th>
                                                    <th>Apellido</th>
                                                    <th>Obra Social</th>
                                                    <th>FUM</th>
                                                    <th>FPP</th>
                                                    <th>FPP</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                                <div class="card-box" style="border-top:5px solid #09afc4; border-radius:0px">
                                    <form id="filtrar_anio_fecha" method="POST">
                                        <input type="hidden" name="opcion" value="filter" id="opcion">
                                        <input type="hidden" name="tag" value="mes_anio_fecha" id="tag">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                                <h5>Filtrar por mes y año <i class="fa fa-filter pull-right"></i></h5>
                                            </div>
                                            <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                                                <select class="form-control" name="meses_filter" id="meses_filter">
                                                    <?php Codigos::selectMeses($conexion); ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                                                <select class="form-control" name="year_filter" id="year_filter">
                                                    <?php
                                                    for ($i = 2010; $i < 2100; $i++) {
                                                        echo "<option value=$i>$i</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div><br><br>
                                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                                <button class="btn btn-secondary btn-sm btn-block" type="submit">Filtrar</button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <form id="filtrar_rango" method="POST">
                                        <input type="hidden" name="opcion" value="filter" id="opcion">
                                        <input type="hidden" name="tag" value="rango" id="tag">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                                <h5>Ingrese el rango de fechas <i class="fa fa-filter pull-right"></i></h5>
                                            </div>
                                            <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                                                <input class="form-control" type="date" name="filtro_fecha1" id="filtro_fecha1">
                                            </div>
                                            <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                                                <input class="form-control" type="date" name="filtro_fecha2" id="filtro_fecha2">
                                            </div><br><br>
                                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                                <button class="btn btn-secondary btn-sm btn-block" type="submit">Filtrar</button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <form id="filtrar_obra_social" method="POST">
                                        <input type="hidden" name="opcion" value="filter" id="opcion">
                                        <input type="hidden" name="tag" value="filtro_obra_social_tag" id="tag">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                                <h5>Filtrar por Obra social <i class="fa fa-filter pull-right"></i></h5>
                                            </div>
                                            <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                                                <select class="form-control" name="select_obra_social_filtro" id="select_obra_social_filtro">
                                                    <?php
                                                    Codigos::selectObraSociales($conexion);
                                                    ?>
                                                </select>
                                            </div><br><br>
                                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                                <button class="btn btn-secondary btn-sm btn-block" type="submit">Filtrar</button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <form id="filtrar_por_paciente" method="POST">
                                        <input type="hidden" name="opcion" value="filter" id="opcion">
                                        <input type="hidden" name="tag" value="filtro_paciente" id="tag">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                                <h5>Filtrar por paciente<i class="fa fa-filter pull-right"></i></h5>
                                            </div>
                                            <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                                                <select class="form-control" name="select_paciente_filtro" id="select_paciente_filtro">
                                                    <?php
                                                    Codigos::selectPacientes($conexion);
                                                    ?>
                                                </select>
                                            </div><br><br>
                                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                                <button class="btn btn-secondary btn-sm btn-block" type="submit">Filtrar</button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <form id="filtrar_todos" method="POST">
                                        <input type="hidden" name="opcion" value="filter" id="opcion">
                                        <input type="hidden" name="tag" value="filtro_all" id="tag">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                                <h5>Ver todas las fpp<i class="fa fa-filter pull-right"></i></h5>
                                            </div>
                                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                                <button class="btn btn-secondary btn-sm btn-block" type="submit">Filtrar</button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    <?php break;
                    case "terminados":
                    ?>
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="card text-xs-center">
                                    <div class="card-block">
                                        <h4 class="card-title">Informes por meses</h4>
                                        <button class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#Meses"><i class="fa fa-filter"></i> Filtrar</button>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="card text-xs-center">
                                    <div class="card-block">
                                        <h4 class="card-title">Informes por obra social</h4>
                                        <button class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#ObraSocial"><i class="fa fa-filter"></i> Filtrar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="card text-xs-center">
                                    <div class="card-block">
                                        <h4 class="card-title">Informe general</h4>
                                        <button class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#myModal" id="terminacion_general"><i class="fa fa-filter"></i> Filtrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row" id="listado_general" style="display:none">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">
                                <br>
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Listado general</b></h4>
                                    <br>
                                    <table id="dt_general" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Obra Social</th>
                                                <th style="border-bottom: 2px solid #05ff05; background-color:rgba(230, 255, 230, 0.38); ">Terminacion</th>
                                                <th>Tipo</th>
                                                <th>FUM</th>
                                                <th>FPP</th>
                                                <th>HTAL</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="row" id="listado_general_osocial" style="display:none">

                        </div>
                        <div class="row" id="listado_anio_meses" style="display:none">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">
                                <br>
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Filtrado por mes y año</b></h4>
                                    <br>
                                    <table id="dt_anio_meses" class="table table-striped table-bordered" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th style="border-bottom: 2px solid #05ff05; background-color:rgba(230, 255, 230, 0.38);">Terminacion</th>
                                                <th>Obra Social</th>
                                                <th>Obra Social</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="row" style="display: none;">
                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                <div class="listado_meses"></div>
                            </div>
                        </div>
                <?php break;
                }
            } else {
                ?>
                <hr><br>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="card text-xs-center">
                            <div class="card-header">
                                INFORMES
                            </div>
                            <div class="card-block">
                                <h4 class="card-title">Informes de consultas</h4>
                                <p class="card-text">Sacar informes de consultas</p>
                                <a href="informes.php?tag=consultas" class="btn btn-info"><i class="fa fa-print"></i> CONSULTAS</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="card text-xs-center">
                            <div class="card-header">
                                INFORMES
                            </div>
                            <div class="card-block">
                                <h4 class="card-title">Informes partos terminados</h4>
                                <p class="card-text">Informes de partos ya terminados</p>
                                <a href="informes.php?tag=terminados" class="btn btn-success"><i class="fa fa-print"></i> TERMINADOS</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="card text-xs-center">
                            <div class="card-header">
                                INFORMES
                            </div>
                            <div class="card-block">
                                <h4 class="card-title">Informes fpp</h4>
                                <p class="card-text">Informes de fechas probables de parto</p>
                                <a href="informes.php?tag=fpp" class="btn btn-danger"><i class="fa fa-print"></i> FPP</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="card text-xs-center">
                            <div class="card-header">
                                INFORMES
                            </div>
                            <div class="card-block">
                                <h4 class="card-title">Informes administración</h4>
                                <p class="card-text">Informes</p>
                                <a href="informes.php?tag=admin" class="btn btn-danger"><i class="fa fa-print"></i> FPC</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

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
    <script src="assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
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
            $('#select_paciente_filtro').select2();
            $('#select_obra_social_filtro').select2();
            $("#frmFiltros").submit(function(e) {
                e.preventDefault();
                var frm = $(this).serialize();
                /*he creado un objeto llamando "parámetros"*/
                var parametros = {
                    "fecha1": $("#fecha1").val(),
                    "fecha2": $("#fecha2").val(),
                    "obra_social": $('#obra_social option:selected').val()
                };
                //console.log( parametros );
                $("#listado").fadeIn();
                $("#listado_anio_meses").css('display', 'none');
                listar(parametros);
            });
            $("#meses_filtro").submit(function(e) {
                e.preventDefault();
                var parametros = {
                    "month": $("#meses").val(),
                    "year": $("#year").val()
                };
                //console.log( parametros );
                $("#listado_anio_meses").fadeIn();
                $('#listado_general').css('display', 'none');
                $('#listado_general_osocial').css('display', 'none');
                $('#Meses').modal('hide');
                listar_mes_anio(parametros);
            });
            $("#select_obra_social").change(function() {
                var parametros = {
                    "obra_social": $('#select_obra_social option:selected').val()
                };
                console.log(parametros);
                $.ajax({
                    method: "POST",
                    url: "includes/informes/nuevo_informe_osocial.php",
                    data: parametros,
                    beforeSend: function() {
                        //$("#loader").css("display","inline");
                        //$("#guardar").html("loading...");
                    },
                    complete: function() {
                        $("#ObraSocial").modal('hide');
                        $("#listado_general_osocial").fadeIn();
                        $("#listado_general").hide();
                        $("#listado_anio_meses").css('display', 'none');
                    },
                }).done(function(info) {
                    console.log(info);
                    $("#listado_general_osocial").fadeIn("slow").html(info);
                });
            });
            $("#terminacion_general").click(function() {

                listar_general();
                $('#listado_general').css('display', 'block');
                $('#listado_general_osocial').css('display', 'none');
                $("#listado_anio_meses").css('display', 'none');
            });
            $("#filtrar_anio_fecha").submit(function(e) {
                e.preventDefault();
                var parametros = {
                    "opcion": $("#opcion").val(),
                    "tag": $("#tag").val(),
                    "mes": $("#meses_filter").val(),
                    "anio": $("#year_filter").val()
                };
                console.log(parametros);
                listar_filtro(parametros);
            });
            $("#filtrar_rango").submit(function(e) {
                e.preventDefault();
                var parametros = {
                    "opcion": $("#opcion").val(),
                    "tag": 'rango',
                    "fecha1": $("#filtro_fecha1").val(),
                    "fecha2": $("#filtro_fecha2").val()
                };
                console.log(parametros);
                listar_filtro(parametros);
            });
            $("#filtrar_obra_social").submit(function(e) {
                e.preventDefault();
                var parametros = {
                    "opcion": $("#opcion").val(),
                    "tag": 'filtro_obra_social_tag',
                    "select_obra_social_filtro": $("#select_obra_social_filtro").val(),
                };
                console.log(parametros);
                listar_filtro(parametros);
            });
            $("#filtrar_por_paciente").submit(function(e) {
                e.preventDefault();
                var parametros = {
                    "opcion": $("#opcion").val(),
                    "tag": 'filtro_paciente',
                    "select_paciente_filtro": $("#select_paciente_filtro").val(),
                };
                console.log(parametros);
                listar_filtro(parametros);
            });
            $("#filtrar_todos").submit(function(e) {
                e.preventDefault();
                var parametros = {
                    "opcion": $("#opcion").val(),
                    "tag": 'filtro_all'
                };
                console.log(parametros);
                listar_filtro(parametros);
            });
        });
        var listar = function(parametros) {
            var table = $("#dt_filtros").DataTable({
                "destroy": true,
                "ajax": {
                    "method": "POST",
                    "url": "includes/Consultas/detalleInforme.php", //y llamas aqui otra vez
                    "data": parametros
                },
                "columns": [{
                        "data": "Apellido_Paciente"
                    },
                    {
                        "data": "Nombre_Paciente"
                    },
                    {
                        "data": "ObraSocial_Paciente"
                    },
                    {
                        "data": "plan"
                    },
                    {
                        "data": "nro"
                    },
                    {
                        "data": "fechaConsulta"
                    },
                    {
                        "data": "cod"
                    },
                    {
                        "data": "tipoConsulta"
                    },
                    {
                        "data": "MotivoConsulta"
                    }
                ],
                "sDom": "<'row'<'col-md-8 col-lg-8 col-sm-12 col-xs-12'B><'col-md-4 col-lg-4 col-sm-12 col-xs-12 pull-right'f>>'<rt>'<'row'<'col-md-4 col-sm-6'l><'col-md-4'i><'col-md-4 col-sm-6 pull-right'p>>",
                "buttons": [{
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel-o"></i> Exportar a <span style="color:#139f13" >Excel</span>',
                        titleAttr: 'Excel',
                        "className": "btn btn-default-outline",
                        exportOptions: {
                            columns: ':visible'
                        },
                        title: 'Listado de consultas',
                    },
                    {
                        extend: 'pdfHtml5',
                        message: 'Listado de consultas generado.',
                        text: '<i class="fa fa-file-pdf-o"></i> Exportar a <span style="color:#e80404">PDF</span>',
                        titleAttr: 'PDF',
                        "className": "btn btn-default-outline",
                        download: 'open',
                        exportOptions: {
                            columns: ':visible'
                        },
                        title: 'Listado de consultas',

                    },
                    {
                        extend: 'colvis',
                        collectionLayout: 'fixed two-column',
                        text: 'Filtrar columnas',
                        titleAttr: 'colvis',
                    },
                    {
                        extend: 'print',
                        text: 'Imprimir',
                        titleAttr: 'imp',
                        message: 'Listado de consultas',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }
                ],
                "columnDefs": [{
                    targets: -1,
                    visible: false
                }]
            });
        }
        var listar_mes_anio = function(parametros) {
            var table = $("#dt_anio_meses").DataTable({
                "destroy": true,
                "ajax": {
                    "method": "POST",
                    "url": "includes/informes/nuevo_informe_fechas.php", //y llamas aqui otra vez
                    "data": parametros
                },
                "columns": [{
                        "data": "nombre_pac"
                    },
                    {
                        "data": "apellido_pac"
                    },
                    {
                        "data": "terminacion"
                    },
                    {
                        "data": "obsocial_pac"
                    },
                    {
                        "data": "terminacion"
                    },
                ],
                "sDom": "<'row'<'col-md-8 col-lg-8 col-sm-12 col-xs-12'B><'col-md-4 col-lg-4 col-sm-12 col-xs-12 pull-right'f>>'<rt>'<'row'<'col-md-4 col-sm-6'l><'col-md-4'i><'col-md-4 col-sm-6 pull-right'p>>",
                "buttons": [{
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel-o"></i> <span style="color:#139f13" >Excel</span>',
                        titleAttr: 'Excel',
                        "className": "btn btn-default-outline",
                        exportOptions: {
                            columns: ':visible'
                        },
                        title: 'Listado de consultas',
                    },
                    {
                        extend: 'print',
                        text: 'Imprimir',
                        titleAttr: 'imp',
                        message: 'Listado de consultas',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }
                ],
                "columnDefs": [{
                    targets: -1,
                    visible: false
                }]
            });
        }
        var listar_general = function() {
            var table = $("#dt_general").DataTable({
                "destroy": true,
                "ajax": {
                    "method": "POST",
                    "url": "includes/informes/nuevo_informe.php"
                },
                "columns": [{
                        "data": "nombre_pac"
                    },
                    {
                        "data": "apellido_pac"
                    },
                    {
                        "data": "obsocial_pac"
                    },
                    {
                        "data": "terminacion"
                    },
                    {
                        "data": "tipo_terminacion"
                    },
                    {
                        "data": "fum_ficha"
                    },
                    {
                        "data": "fpp_ficha"
                    },
                    {
                        "data": "htal_ficha"
                    }

                ],
                "language": idioma_espanol,
                "sDom": "<'row'<'col-md-8 col-lg-8 col-sm-12 col-xs-12'B><'col-md-4 col-lg-4 col-sm-12 col-xs-12 pull-right'f>>'<rt>'<'row'<'col-md-4 col-sm-6'l><'col-md-4'i><'col-md-4 col-sm-6 pull-right'p>>",
                "buttons": [{
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel-o"></i> Exportar a <span style="color:#139f13" >Excel</span>',
                        titleAttr: 'Excel',
                        "className": "btn btn-default-outline",
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fa fa-file-pdf-o"></i> Exportar a <span style="color:#e80404">PDF</span>',
                        titleAttr: 'PDF',
                        "className": "btn btn-default-outline",
                    },
                    {
                        extend: 'colvis',
                        text: 'Filtrar columnas',
                        titleAttr: 'colvis'
                    },
                    {
                        extend: 'copy',
                        text: 'Copiar datos',
                        titleAttr: 'copy'
                    }
                ],
                "lengthMenu": [
                    [50, 100, -1],
                    [50, 100, "Todos"]
                ]
            });
        }
        var idioma_espanol = {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Registros del _START_ al _END_ .Total de registros _TOTAL_ ",
            "sInfoEmpty": "Registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
        var listar_filtro = function(parametros) {
            var table = $("#dt_fpp").DataTable({
                "destroy": true,
                "ajax": {
                    "method": "POST",
                    "url": "includes/informes/nuevo_informe_fpp.php", //y llamas aqui otra vez
                    "data": parametros
                },
                "columns": [{
                        "data": "nombre_pac"
                    },
                    {
                        "data": "apellido_pac"
                    },
                    {
                        "data": "obsocial_pac"
                    },
                    {
                        "data": "fum_ficha"
                    },
                    {
                        "data": "fpp_ok"
                    },
                    {
                        "data": "fpp_ok"
                    }
                ],
                "sDom": "<'row'<'col-md-8 col-lg-8 col-sm-12 col-xs-12'B><'col-md-4 col-lg-4 col-sm-12 col-xs-12 pull-right'f>>'<rt>'<'row'<'col-md-4 col-sm-6'l><'col-md-4'i><'col-md-4 col-sm-6 pull-right'p>>",
                "buttons": [{
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel-o"></i> <span style="color:#139f13" >Excel</span>',
                        titleAttr: 'Excel',
                        "className": "btn btn-default-outline",
                        exportOptions: {
                            columns: ':visible'
                        },
                        title: 'Listado de consultas',
                    },
                    {
                        extend: 'print',
                        text: 'Imprimir',
                        titleAttr: 'imp',
                        message: 'Listado de consultas',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }
                ],
                "columnDefs": [{
                    targets: -1,
                    visible: false,
                    type: 'date-uk'
                }]
            });
        }
    </script>
</body>

</html>