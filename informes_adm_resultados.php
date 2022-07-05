<?php include("header.php");
//error_reporting(0);
?>

<style>
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
                        <a href="informes_administracion.php" class="btn btn-secondary"><i class="fa fa-undo"></i> Volver a informes</a>

                    </div>
                    <h4 class="page-title">Resultados de informes</h4>
                </div>
            </div>

            <div class="row">
                <?php
                if (isset($_POST)) {
                    $opt = $_REQUEST['opcion'];
                    if ($opt == "_informe1") {
                        $fecha1 = mysqli_real_escape_string($conexion, $_POST['fecha_adm_1']);
                        $fecha2 = mysqli_real_escape_string($conexion, $_POST['fecha_2_adm_1']);
                        $tipo_informe = mysqli_real_escape_string($conexion, $_POST['tipo_adm_1']);
                        $obra_social = mysqli_real_escape_string($conexion, $_POST['os_adm_1']);
                        $liquidacion = mysqli_real_escape_string($conexion, $_POST['liq_adm_1']);
                        $total = 0;
                        $total_particular = 0;
                ?> <input type="hidden" value="<?= $opt; ?>" id="opt">
                        <input type="hidden" value="<?= $tipo_informe; ?>" id="tipo_informe">
                        <input type="hidden" value="<?= $fecha1; ?>" id="filtro_fecha1">
                        <input type="hidden" value="<?= $fecha2; ?>" id="filtro_fecha2">
                        <input type="hidden" value="<?= $obra_social; ?>" id="obra_social">
                        <input type="hidden" value="<?= $liquidacion; ?>" id="liquidacion">
                        <?php

                        if ($tipo_informe == 1) {
                            $sql = "SELECT * from consultas where liq != 'particular' and fecha_cobro between '$fecha1' and '$fecha2' order by ObraSocial_Paciente, fecha_cobro asc";
                            $do = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));


                            $sql2 = "SELECT * from consultas where liq = 'PARTICULAR' and fecha_cobro between '$fecha1' and '$fecha2'";
                            $do2 = mysqli_query($conexion, $sql2) or die(mysqli_error($conexion));
                            while ($traer2 = mysqli_fetch_array($do2)) {
                                $total_particular = $total_particular + $traer2['valor_consulta'];
                            } ?>
                            <div class="col-md-8">
                                <div class="card card-info">
                                    <div class="card-header bg-info text-white" style="text-align: center">
                                        <h2>Valores a cobrar - obras sociales</h2>
                                    </div>
                                    <div class="card-block" style="background-color: #fff">

                                        <h5><?= "<b>Desde: </b>" . date('d-m-Y', strtotime($fecha1)) . " <span class='pull-right'><b>al</b> " . date('d-m-Y', strtotime($fecha2)) . "</span>"; ?></h5>
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Fecha de <b>cobro</b></th>
                                                    <th>Paciente</th>
                                                    <th>Obra Social</th>
                                                    <th>Valor de la consulta</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($traer = mysqli_fetch_array($do)) {
                                                    //date('d-m-Y', strtotime($traer['fechaConsulta']));
                                                    $total = $total + $traer['valor_consulta'];
                                                    echo "<tr>
                                                    <td>" . date('d-m-Y', strtotime($traer['fecha_cobro'])) . "</td>
                                                    <td>" . $traer['Apellido_Paciente'] . " " . $traer['Nombre_Paciente'] . "</td>
                                                    <td>" . $traer['ObraSocial_Paciente'] . "</td>
                                                    <td class='text-info'><b>$" . $traer['valor_consulta'] . "</b></td>
                                                </tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="card card-info">
                                    <div class="card-header">Total <b>Obras Sociales</b></div>
                                    <div class="card-body card-block text-white">
                                        <?php

                                        echo "<h1>TOTAL: $" . $total . "<h1>";
                                        ?>
                                    </div>
                                </div>

                                <div class="card card-success">
                                    <div class="card-header">Total <b>Particulares</b></div>
                                    <div class="card-body card-block text-white">
                                        <?php

                                        echo "<h1>TOTAL: $" . $total_particular . "<h1>";
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } elseif ($tipo_informe == 2) {
                            $sql_fechas = "SELECT * from consultas where ObraSocial_Paciente='$obra_social' and fecha_cobro between '$fecha1' and '$fecha2'";
                            $do = mysqli_query($conexion, $sql_fechas) or die(mysqli_error($conexion)); ?>
                            <div class="col-md-8">
                                <div class="card card-info">
                                    <div class="card-header bg-info text-white" style="text-align: center">
                                        <h2>Obra social: <?= $obra_social; ?></h2>
                                    </div>
                                    <div class="card-block" style="background-color: #fff">

                                        <h5><?= "<b>Desde: </b>" . date('d-m-Y', strtotime($fecha1)) . " <span class='pull-right'><b>al</b> " . date('d-m-Y', strtotime($fecha2)) . "</span>"; ?></h5>
                                        <hr>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Fecha de <b>cobro</b></th>
                                                    <th>Paciente</th>
                                                    <th>Obra social</th>
                                                    <th>Valor de la consulta</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($traer = mysqli_fetch_array($do)) {
                                                    //date('d-m-Y', strtotime($traer['fechaConsulta']));
                                                    $total = $total + $traer['valor_consulta'];
                                                    echo "<tr>
                                                            <td class='bg-info'><b>" . date('d-m-Y', strtotime($traer['fecha_cobro'])) . "</b></td>
                                                            <td>" . $traer['Apellido_Paciente'] . " " . $traer['Nombre_Paciente'] . "</td>
                                                            <td>" . $traer['ObraSocial_Paciente'] . "</td>
                                                            <td>$ " . $traer['valor_consulta'] . "</td>
                                                        </tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-info">
                                    <div class="card-header">Total: <b><?= $obra_social; ?></b></div>
                                    <div class="card-body card-block text-white">
                                        <?= "<h1>TOTAL: $" . $total . "<h1>"; ?>
                                    </div>
                                </div>

                            </div>
                        <?php
                        } elseif ($tipo_informe == 3) {
                            $sql_fechas = "SELECT * from consultas where liq='$liquidacion' and fecha_cobro between '$fecha1' and '$fecha2'";
                            $do = mysqli_query($conexion, $sql_fechas) or die(mysqli_error($conexion)); ?>
                            <div class="col-md-8">
                                <div class="card card-info">
                                    <div class="card-header bg-info text-white" style="text-align: center">
                                        <h2>Liquidación: <?= $liquidacion; ?></h2>
                                    </div>
                                    <div class="card-block" style="background-color: #fff">

                                        <h5><?= "<b>Desde: </b>" . date('d-m-Y', strtotime($fecha1)) . " <span class='pull-right'><b>al</b> " . date('d-m-Y', strtotime($fecha2)) . "</span>"; ?></h5>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Fecha de consulta</th>
                                                    <th>Paciente</th>
                                                    <th>Obra social</th>
                                                    <th>Liquidación</th>
                                                    <th>Valor de la consulta</th>
                                                    <th>Fecha de cobro</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($traer = mysqli_fetch_array($do)) {
                                                    //date('d-m-Y', strtotime($traer['fechaConsulta']));
                                                    $total = $total + $traer['valor_consulta'];
                                                    echo "<tr>
                                                            <td>" . date('d-m-Y', strtotime($traer['fechaConsulta'])) . "</td>
                                                            <td>" . $traer['Apellido_Paciente'] . " " . $traer['Nombre_Paciente'] . "</td>
                                                            <td>" . $traer['ObraSocial_Paciente'] . "</td>
                                                            <td>" . $traer['liq'] . "</td>
                                                            <td>" . $traer['valor_consulta'] . "</td>
                                                            <td>" . date('d-m-Y', strtotime($traer['fecha_cobro'])) . "</td>
                                                        </tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-info">
                                    <div class="card-header">Total liquidación: <b><?= $liquidacion; ?></b></div>
                                    <div class="card-body card-block text-white">
                                        <?= "<h1>TOTAL: $" . $total . "<h1>"; ?>
                                    </div>
                                </div>

                            </div>
                        <?php
                        } elseif ($tipo_informe == 4) {
                        ?>
                            <div class="col-md-12">
                                <div class="card card-info">
                                    <div class="card-header bg-info text-white" style="text-align: center">
                                        <h2>Informe general</h2>
                                    </div>
                                    <div class="card-block" style="background-color: #fff">
                                        <h5><?= "<b>Desde: </b>" . date('d-m-Y', strtotime($fecha1)) . " <span class='pull-right'><b>al</b> " . date('d-m-Y', strtotime($fecha2)) . "</span>"; ?></h5>
                                        <hr>
                                        <table class="table table-bordered" id="dt_informe_4">
                                            <thead>
                                                <tr>
                                                    <th>Fecha de COBRO</th>
                                                    <th>Paciente</th>
                                                    <th>Obra social</th>
                                                    <th>Liquidación</th>
                                                    <th>Valor de la consulta</th>
                                                    <th>Fecha de cobro</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } elseif ($tipo_informe == 5) {
                        ?>
                            <div class="col-md-12">
                                <div class="card card-info">
                                    <div class="card-header bg-info text-white" style="text-align: center">
                                        <h2>OBRA SOCIAL: <?= $obra_social; ?></h2>
                                    </div>
                                    <div class="card-block" style="background-color: #fff">
                                        <h5><?= "<b>Desde: </b>" . date('d-m-Y', strtotime($fecha1)) . " <span class='pull-right'><b>al</b> " . date('d-m-Y', strtotime($fecha2)) . "</span>"; ?></h5>
                                        <hr>
                                        <table class="table table-bordered" id="dt_informe_5">
                                            <thead>
                                                <tr>
                                                    <th>Fecha de COBRO</th>
                                                    <th>Paciente</th>
                                                    <th>Obra social</th>
                                                    <th>Liquidación</th>
                                                    <th>Valor de la consulta</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } elseif ($tipo_informe == 6) {
                        ?>
                            <div class="col-md-12">
                                <div class="card card-info">
                                    <div class="card-header bg-info text-white" style="text-align: center">
                                        <h2>LIQUIDACIÓN: <?= $liquidacion; ?></h2>
                                    </div>
                                    <div class="card-block" style="background-color: #fff">
                                        <h5><?= "<b>Desde: </b>" . date('d-m-Y', strtotime($fecha1)) . " <span class='pull-right'><b>al</b> " . date('d-m-Y', strtotime($fecha2)) . "</span>"; ?></h5>
                                        <hr>
                                        <table class="table table-bordered" id="dt_informe_6">
                                            <thead>
                                                <tr>
                                                    <th>Fecha de COBRO</th>
                                                    <th>Paciente</th>
                                                    <th>Obra social</th>
                                                    <th>Liquidación</th>
                                                    <th>Valor de la consulta</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    } elseif ($opt == "_informe2") {
                    } elseif ($opt == "_informe3") {
                    } else {
                        echo "informe no enviado";
                    }
                } else {
                    echo "nada para mostrar";
                }
                ?>
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
            dataTables_functions();
        });

        var dataTables_functions = function() {
            let opt = $("#opt").val();
            let tipo_informe = $("#tipo_informe").val();
            let filtro_fecha1 = $("#filtro_fecha1").val();
            let filtro_fecha2 = $("#filtro_fecha2").val();
            let obra_social = $("#obra_social").val();
            let liquidacion = $("#liquidacion").val();

            if (opt == '_informe1' && tipo_informe != "") {
                if (tipo_informe == 1 || tipo_informe == 2 || tipo_informe == 3) {
                    console.log('No hacer nada');

                } else if (tipo_informe == 4) {

                    var parametros = {
                        "tipo_informe": tipo_informe,
                        "fecha1": filtro_fecha1,
                        "fecha2": filtro_fecha2
                    };
                    console.log(parametros);
                    listar_filtro_4(parametros);

                } else if (tipo_informe == 5) {
                    var parametros = {
                        "tipo_informe": tipo_informe,
                        "fecha1": filtro_fecha1,
                        "fecha2": filtro_fecha2,
                        "obra_social": obra_social
                    };
                    console.log(parametros);
                    listar_filtro_5(parametros);
                } else if (tipo_informe == 6) {
                    var parametros = {
                        "tipo_informe": tipo_informe,
                        "fecha1": filtro_fecha1,
                        "fecha2": filtro_fecha2,
                        "liq": liquidacion
                    };
                    console.log(parametros);
                    listar_filtro_6(parametros);
                }
            }
        }

        var listar_filtro_4 = function(parametros) {
            var table = $("#dt_informe_4").DataTable({
                "destroy": true,
                "ajax": {
                    "method": "POST",
                    "url": "includes/Consultas/informe_consulta.php", //y llamas aqui otra vez
                    "data": parametros
                },
                "columns": [{
                        "data": "fecha_cobro"
                    },
                    {
                        "data": "Apellido_Paciente"
                    },
                    {
                        "data": "ObraSocial_Paciente"
                    },
                    {
                        "data": "liq"
                    },
                    {
                        "data": "valor_consulta"
                    },
                    {
                        "data": "fecha_cobro"
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

        var listar_filtro_5 = function(parametros) {
            var table = $("#dt_informe_5").DataTable({
                "destroy": true,
                "ajax": {
                    "method": "POST",
                    "url": "includes/Consultas/informe_consulta.php", //y llamas aqui otra vez
                    "data": parametros
                },
                "columns": [{
                        "data": "fecha_cobro"
                    },
                    {
                        "data": "Apellido_Paciente"
                    },
                    {
                        "data": "ObraSocial_Paciente"
                    },
                    {
                        "data": "liq"
                    },
                    {
                        "data": "valor_consulta"
                    },
                    {
                        "data": "fecha_cobro"
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

        var listar_filtro_6 = function(parametros) {
            var table = $("#dt_informe_6").DataTable({
                "destroy": true,
                "ajax": {
                    "method": "POST",
                    "url": "includes/Consultas/informe_consulta.php", //y llamas aqui otra vez
                    "data": parametros
                },
                "columns": [{
                        "data": "fecha_cobro"
                    },
                    {
                        "data": "Apellido_Paciente"
                    },
                    {
                        "data": "ObraSocial_Paciente"
                    },
                    {
                        "data": "liq"
                    },
                    {
                        "data": "valor_consulta"
                    },
                    {
                        "data": "fecha_cobro"
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
    </script>
</body>

</html>