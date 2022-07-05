<?php include("header.php"); ?>
<style>
    input#nombre {
        text-transform: uppercase;
    }

    #myTab {
        font-size: 16px;
        font-weight: bold;
    }

    #myTab>.nav-item>.nav-link.active {
        background-color: #c60707 !important;
        color: #fff;
        border-bottom-color: #c60707 !important;
    }

    #myTab>.nav-item>.nav-link {
        color: #6b6b6b;
        background-color: rgba(186, 181, 181, 0.11);
    }

    div.resultado_valor {
        background-color: #bbe165;
        color: #000;
        padding: 12px !important;
        display: none;
        border: 2px solid green;
        margin-bottom: 5px;

    }

    div.resultado_valor:hover {
        cursor: pointer;
    }

    #frm_valores_cobro_edit {
        padding: 5px 5px;
        padding-top: 10px;
        background-image: linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%);
    }

    #frm_valores_cobro_edit input,
    select {
        background-color: #fff !important;
    }
</style>

<body>

    <?php include("navs.php"); ?>
    <div class="wrapper">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="btn-group pull-right m-t-15">

                        <button type="button" class="btn btn-danger dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php">Panel de control</a>
                            <a class="dropdown-item" href="pacientes.php">Pacientes</a>
                            <a class="dropdown-item" href="consultas.php">Consultas</a>
                            <a class="dropdown-item" href="ordenRapida.php">Órdenes</a>
                        </div>&nbsp;&nbsp;
                        <a href="config.php" class="btn btn-info"><i class="fa fa-refresh"></i> Recargar página</a>

                    </div>
                    <h4 class="page-title"><i class="fa fa-cog"></i> MODULO DE CONFIGURACIÓN</h4>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block" style="border:1px solid #c60707">

                            <ul class="nav nav-tabs m-b-20 nav-fill" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="os_tab" data-toggle="tab" href="#os" role="tab" aria-controls="home" aria-expanded="true">OBRAS SOCIALES</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="cons_tab" data-toggle="tab" href="#cons" role="tab" aria-controls="profAntecedentes_pile">TIPOS DE CONSULTAS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="db_tab" data-toggle="tab" href="#db" role="tab" aria-controls="profAntecedentes_pile">BASES DE DATOS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="valores_cobro_tab" data-toggle="tab" href="#valores_cobro" role="tab" aria-controls="profAntecedentes_pile">VALORES COBRO</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade in active" id="os" role="tabpanel" aria-labelledby="dropdown1-tab">
                                    <div class="row">
                                        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                                            <div class="card-box">

                                                <h4 class="header-title m-t-0 m-b-30">Listado de obras sociales <i class="fa fa-list pull-right"></i></h4>

                                                <div class="detalles"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                            <div class="card-box add_card" style="border-top:2px solid #02bf02">
                                                <h4 id="titulo_frm">Agregar nueva <i class="fa fa-plus pull-right"></i></h4>
                                                <hr>
                                                <form class="form-horizontal" role="form" id="frm_osocial">
                                                    <input type="hidden" id="opcion" name="opcion" value="obraSocial">
                                                    <input type="hidden" id="tag" name="tag" value="obraSocial-tag">
                                                    <input type="hidden" id="id" name="id">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="control-label">Nombre</label>
                                                        <input type="text" class="form-control" name="nombre" id="nombre" autocomplete="off">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="control-label">Lugar de presentacion</label>
                                                        <select name="lugar_presentacion" id="lugar_presentacion" class="form-control" required="required">
                                                            <option value="APRESAL">APRESAL</option>
                                                            <option value="CLINICA SANTA ROSA">CLINICA SANTA ROSA</option>
                                                            <option value="OSPE">OSPE</option>
                                                            <option value="OSDE">OSDE</option>
                                                            <option value="SANCOR">SANCOR</option>
                                                            <option value="AGUA Y ENERGIA">AGUA Y ENERGIA</option>
                                                            <option value="INTEGRAL">INTEGRAL</option>
                                                            <option value="MEDIFE">MEDIFE</option>
                                                            <option value="MEDIMAS">MEDIMAS</option>
                                                            <option value="SANCOR SALUD">SANCOR SALUD</option>
                                                            <option value="PARTICULAR">PARTICULAR (osep)</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dias_cobro" class="control-label">Dias para el cobro</label>
                                                        <input type="number" class="form-control" name="dias_cobro" id="dias_cobro" autocomplete="off">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="control-label">Estado</label>
                                                        <select name="estado" id="estado" class="form-control" required="required">
                                                            <option value="1">Activa</option>
                                                            <option value="0">Inactiva</option>
                                                        </select>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group m-b-0">
                                                        <button type="submit" id="btn-save" class="btn btn-secondary waves-effect waves-light">Agregar</button> <span id="loader" style="display:none" class="loader pull-right"><img src="assets/images/ajax-loader.gif" alt="">&nbsp;</span>
                                                    </div>
                                                    <div class="info"></div>
                                                </form>
                                            </div>
                                            <div class="card-box edit_card" style="border-top:2px solid orange; display:none">
                                                <h4 id="titulo_frm_edit">Modificar la obra social<i class="fa fa-edit pull-right"></i></h4>
                                                <hr>
                                                <form class="form-horizontal" role="form" id="frm_osocial_edit">
                                                    <input type="hidden" id="opcion" name="opcion" value="obraSocial">
                                                    <input type="hidden" id="tag" name="tag" value="obraSocial-tag">
                                                    <input type="hidden" id="id_edit" name="id">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="control-label">Nombre</label>
                                                        <input type="text" class="form-control" name="nombre" id="nombre_edit" autocomplete="off">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="control-label">Lugar de presentacion</label>
                                                        <select name="lugar_presentacion" id="lugar_presentacion_edit" class="form-control" required="required">
                                                            <option value="APRESAL">APRESAL</option>
                                                            <option value="CLINICA SANTA ROSA">CLINICA SANTA ROSA</option>
                                                            <option value="OSPE">OSPE</option>
                                                            <option value="OSDE">OSDE</option>
                                                            <option value="SANCOR">SANCOR</option>
                                                            <option value="AGUA Y ENERGIA">AGUA Y ENERGIA</option>
                                                            <option value="INTEGRAL">INTEGRAL</option>
                                                            <option value="MEDIFE">MEDIFE</option>
                                                            <option value="MEDIMAS">MEDIMAS</option>
                                                            <option value="SANCOR SALUD">SANCOR SALUD</option>
                                                            <option value="PARTICULAR">PARTICULAR (osep)</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dias_cobro" class="control-label">Dias para el cobro</label>
                                                        <input type="number" class="form-control" name="dias_cobro" id="dias_cobro_edit" autocomplete="off">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="control-label">Estado</label>
                                                        <select name="estado" id="estado_edit" class="form-control" required="required">
                                                            <option value="1">Activa</option>
                                                            <option value="0">Inactiva</option>
                                                        </select>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group m-b-0">
                                                        <button type="submit" id="btn-save" class="btn btn-secondary waves-effect waves-light"><i class="fa fa-edit"></i> Editar</button> | <button type="button" id="nueva" style="display:none" class="btn btn-info"><i class="fa fa-plus"></i> Cargar nueva </button><span id="loader" style="display:none" class="loader pull-right"><img src="assets/images/ajax-loader.gif" alt="">&nbsp;</span>
                                                    </div>
                                                    <div class="info"></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="cons" role="tabpanel" aria-labelledby="dropdown2-tab">
                                    <div class="row">
                                        <div class="col-md-4 p-x-2">
                                            <form role="form" data-parsley-validate="" novalidate="" id="frm_tipo_new" style="border:2px solid #4ebbc4" class="p-x-2 p-y-2">
                                                <div class="info_tipo"></div>
                                                <input type="hidden" id="opcion" name="opcion" value="tipoConsulta">
                                                <input type="hidden" id="tag" name="tag" value="tipoConsulta-tag">
                                                <input type="hidden" id="id_tipo" name="id_tipo">
                                                <h2>Insertar nuevo tipo</h2>
                                                <br>
                                                <div class="form-group row">
                                                    <label for="nombre_tipo" class="col-sm-3 form-control-label">Tipo de Consulta <span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="nombre_tipo" id="nombre_tipo" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="codigo" class="col-sm-3 form-control-label">Código <span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" name="codigo_tipo" id="codigo">
                                                        <small>* Solo números</small>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-9 col-sm-offset-3">
                                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                                            Confirmar
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <form role="form" data-parsley-validate="" novalidate="" id="frm_tipo_edit" style="border:2px solid #f1b53d" class="p-x-2 p-y-2">
                                                <div class="info_tipo_edit"></div>
                                                <input type="hidden" id="opcion" name="opcion" value="tipoConsulta">
                                                <input type="hidden" id="tag" name="tag" value="tipoConsulta-tag">
                                                <input type="hidden" id="id_tipo_edit" name="id_tipo">
                                                <h2 class="text-center text-warning">Editar tipo</h2>
                                                <br>
                                                <div class="form-group row">
                                                    <label for="nombre_tipo" class="col-sm-3 form-control-label">Tipo de Consulta <span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="nombre_tipo" id="nombre_tipo_edit">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="codigo" class="col-sm-3 form-control-label">Código <span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="codigo_tipo" id="codigo_edit">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-9 col-sm-offset-3">
                                                        <button type="submit" class="btn btn-dark waves-effect waves-light">
                                                            Confirmar
                                                        </button>
                                                        <button class="btn btn-danger" type="button" id="cancel_edit_tipo"> Cancelar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                                            <div class="card-box">

                                                <h4 class="header-title m-t-0 m-b-30">Tipos de consultas <i class="fa fa-list pull-right"></i></h4>

                                                <div class="detalles_tipos_consultas"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="db" role="tabpanel" aria-labelledby="dropdown3-tab">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="card-box">
                                                <a class="btn btn-success btn-block btn-lg" href="db_respaldo.php" target="_blank" role="button">Backup Base de datos</a>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="card-box">
                                                <div class="alert alert-danger">
                                                    <strong>Cuidado!</strong> Este botón restaura la última copia de la base de datos -
                                                </div>
                                                <form action="db_restore.php" target="_blank" method="POST" role="form">

                                                    <div class="form-group">
                                                        <label class="sr-only" for="">Nombre del archivo</label>
                                                        <input type="text" class="form-control" id="backup_db" name="backup_db">
                                                        <small>Copie aquí el nombre de su backup: <br>
                                                            Ejemplo: myphp-backup-valentin2-20190406_160348.sql</small>
                                                    </div>
                                                    <button type="submit" class="btn btn-warning btn-block">Restaurar Base de datos</button>
                                                </form>

                                                <!--<a class="btn btn-info btn-block btn-lg" href="db_restore.php" target="_blank" role="button">Restaurar Base de datos</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="valores_cobro" role="tabpanel" aria-labelledby="dropdown4-tab">
                                    <span id="loader_editar_valor" style="display:none" class="loader"><img src="assets/images/ajax-loader.gif" alt="">&nbsp;</span>
                                    <div class="resultado_valor"></div>
                                    <form action="" method="post" id="frm_valores_cobro">
                                        <input type="hidden" name="opcion" value="valores">
                                        <input type="hidden" name="tag" value="valores-tag">
                                        <input type="hidden" name="id_valores" id="id_valores">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="id_obrasocial_valores">Obra Social</label><br>
                                                    <select id="id_obrasocial_valores" class="form-control" name="id_obrasocial_valores" style="width: 100% !important">
                                                        <option disabled>Seleccione</option>
                                                        <?php
                                                        $obraSocial = mysqli_query($conexion, "select * from osociales order by nombre");
                                                        while ($llena_obraSocial = mysqli_fetch_array($obraSocial)) {
                                                        ?>
                                                            <option value="<?php echo $llena_obraSocial['id']; ?>"><?php echo $llena_obraSocial['nombre']; ?></option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="codigo_consulta_valores">Código de consulta</label><br>
                                                    <select id="codigo_consulta_valores" class="form-control" name="codigo_consulta_valores" style="width: 100% !important">
                                                        <option disabled>Seleccione</option>
                                                        <?php
                                                        $cod_tipo_valores = mysqli_query($conexion, "select distinct codigo_tipo from tipo_consultas order by codigo_tipo");
                                                        while ($select_valores_codigo_cons = mysqli_fetch_array($cod_tipo_valores)) {
                                                        ?>
                                                            <option value="<?php echo $select_valores_codigo_cons['codigo_tipo']; ?>"><?php echo $select_valores_codigo_cons['codigo_tipo']; ?></option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Valor</label>
                                                    <input type="number" class="form-control" name="valor_consulta" id="valor_consulta">
                                                    <small id="helpId" class="form-text text-muted">* Solo numeros</small>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="">Cargar</label>
                                                    <button class="btn btn-success" type="submit">Cargar</button>
                                                    <span id="loader" style="display:none" class="loader pull-right"><img src="assets/images/ajax-loader.gif" alt="">&nbsp;</span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <br>
                                    <form action="" method="post" id="frm_valores_cobro_edit">
                                        <input type="hidden" name="opcion" value="valores">
                                        <input type="hidden" name="tag" value="valores-tag">
                                        <input type="hidden" name="id_valores" id="id_valores_edit">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="id_obrasocial_valores_edit">Obra Social</label><br>
                                                    <select id="id_obrasocial_valores_edit" class="form-control" name="id_obrasocial_valores" style="width: 100% !important">
                                                        <?php
                                                        $obraSocial = mysqli_query($conexion, "select * from osociales order by nombre");
                                                        while ($llena_obraSocial = mysqli_fetch_array($obraSocial)) {
                                                        ?>
                                                            <option value="<?php echo $llena_obraSocial['id']; ?>"><?php echo $llena_obraSocial['nombre']; ?></option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="codigo_consulta_valores_edit">Código de consulta</label><br>
                                                    <select id="codigo_consulta_valores_edit" class="form-control" name="codigo_consulta_valores" style="width: 100% !important">
                                                        <option disabled>Seleccione</option>
                                                        <?php
                                                        $cod_tipo_valores = mysqli_query($conexion, "select distinct codigo_tipo from tipo_consultas order by codigo_tipo");
                                                        while ($select_valores_codigo_cons = mysqli_fetch_array($cod_tipo_valores)) {
                                                        ?>
                                                            <option value="<?php echo $select_valores_codigo_cons['codigo_tipo']; ?>"><?php echo $select_valores_codigo_cons['codigo_tipo']; ?></option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="valor_consulta_edit">Valor</label>
                                                    <input type="number" class="form-control" name="valor_consulta" id="valor_consulta_edit">
                                                    <small id="helpId" class="form-text text-muted">* Solo numeros</small>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="">Modificar</label>
                                                    <button class="btn btn-warning" type="submit">Modificar</button>
                                                    <span id="loader" style="display:none" class="loader pull-right"><img src="assets/images/ajax-loader.gif" alt="">&nbsp;</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-danger btn-sm" type="button" id="cancel_valor">Cancelar</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="listado_valores"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <br>
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

    <script src="assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

    <!-- Toastr js -->
    <script src="assets/plugins/toastr/toastr.min.js"></script>
    <!-- Sweet Alert js -->
    <script src="assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

    <script>
        $(document).ready(function() {
            $(".topbar-main").css("background-color", "#c60707");
            listarOsociales();
            listarTiposConsultas();
            listarValores();
            nuevaObraSocial();
            nuevoTipoConsulta();
            nuevoValor();
            editar();
            editar_tipo();
            editar_valor_consulta();

            $("#id_obrasocial_valores").select2();
            $("#codigo_consulta_valores").select2();
            $(".resultado_valor").click(function() {
                $(".resultado_valor").hide("slow");
            });
            $('#frm_tipo_edit').hide();
            $('#frm_valores_cobro_edit').hide();

            $(document).on('click', '.delete_data', function() {
                var id_fila = $(this).attr("id");
                //alert(id_fila);
                swal({
                    title: "Seguro desea eliminar la obra social?",
                    text: "No podrá recuperar lo que haya borrado.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: "Si, borrar",
                    closeOnConfirm: false
                }, function() {
                    $.ajax({
                        url: "includes/config/deleteOsocial.php",
                        method: "POST",
                        data: {
                            id_fila: id_fila
                        },
                        success: function(data) {
                            swal("Eliminado!", "La fila ha sido eliminada.", "success");
                            listarOsociales();
                            console.log(data);
                        }
                    });
                });
            });
            $(document).on('click', '.edit_data', function() {
                var id_fila = $(this).attr("id");
                $.ajax({
                    url: "includes/config/fetch.php",
                    method: "POST",
                    data: {
                        id_fila: id_fila
                    },
                    dataType: "json",
                    success: function(data) {
                        $('.edit_card').show('slow');
                        $('.add_card').hide('slow');
                        $('#nueva').show('slow');
                        $('#id_edit').val(data.id);
                        $('#nombre_edit').val(data.nombre);
                        $('#estado_edit').val(data.estado);
                        $('#lugar_presentacion_edit').val(data.lugar_presentacion);
                        $('#dias_cobro_edit').val(data.dias_cobro);
                    }
                });
            });
            $(document).on('click', '.delete_data_consultas', function() {
                var id_fila = $(this).attr("id");
                //alert(id_fila);
                console.log(id_fila);
                swal({
                    title: "Seguro desea eliminar el tipo de consulta?",
                    text: "No podrá recuperar lo que haya borrado.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: "Si, borrar",
                    closeOnConfirm: false
                }, function() {
                    $.ajax({
                        url: "includes/config/deleteTipo.php",
                        method: "POST",
                        data: {
                            id_fila: id_fila
                        },
                        success: function(data) {
                            swal("Eliminado!", "La fila ha sido eliminada.", "success");
                            listarTiposConsultas();
                            console.log(data);
                            $('#frm_tipo_edit').hide('slow');
                            $('#frm_tipo_new').show('slow');
                            $('#frm_tipo_new')[0].reset();
                            $('#frm_tipo_edit')[0].reset();
                        }
                    });
                });
            });
            $(document).on('click', '.edit_data_consultas', function() {

                var id_fila = $(this).attr("id");
                $.ajax({
                    url: "includes/config/fetch_tipos.php",
                    method: "POST",
                    data: {
                        id_fila: id_fila
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#frm_tipo_edit').show('fast');
                        $('#frm_tipo_new').hide('fast');
                        $('#id_tipo_edit').val(data.id_tipo);
                        $('#nombre_tipo_edit').val(data.nombre_tipo);
                        $('#codigo_edit').val(data.codigo_tipo);
                    }
                });
            });
            $(document).on('click', '#nueva', function() {
                $('#frm_osocial')[0].reset();
                $('.edit_card').hide('slow');
                $('.add_card').show('slow');
            });
            $(document).on('click', '#cancel_edit_tipo', function() {
                $('#frm_tipo_edit').hide('slow');
                $('#frm_tipo_new').show('slow');
                $('#frm_tipo_new')[0].reset();
                $('#frm_tipo_edit')[0].reset();
            });
            $(document).on('click', '#cancel_valor', function() {
                $('#frm_valores_cobro_edit').hide('slow');
                $('#frm_valores_cobro').show('slow');
                $('#frm_valores_cobro')[0].reset();
                $('#frm_valores_cobro_edit')[0].reset();
            });
            $(document).on('click', '.delete_data_valores', function() {
                var id_fila = $(this).attr("id");
                //alert(id_fila);
                console.log(id_fila);
                swal({
                    title: "Seguro desea eliminar el tipo de consulta?",
                    text: "No podrá recuperar lo que haya borrado.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: "Si, borrar",
                    closeOnConfirm: false
                }, function() {
                    $.ajax({
                        url: "includes/config/deleteValor.php",
                        method: "POST",
                        data: {
                            id_fila: id_fila
                        },
                        success: function(data) {
                            swal("Eliminado!", "La fila ha sido eliminada.", "success");
                            listarValores();
                            console.log(data);
                        }
                    });
                });
            });
            $(document).on('click', '.edit_data_valores', function() {
                var id_fila = $(this).attr("id");
                $("#loader_editar_valor").show();
                $('#frm_valores_cobro').hide('slow');
                $.ajax({
                    url: "includes/config/fetch_valores.php",
                    method: "POST",
                    data: {
                        id_fila: id_fila
                    },
                    dataType: "json",
                    success: function(data) {
                        $("#loader_editar_valor").hide('slow');
                        $('#frm_valores_cobro_edit').show('slow');

                        $('#id_valores_edit').val(data.id_valores);
                        //$('#id_obrasocial_valores_edit').attr("id", data.id_obraSocial);
                        $('#id_obrasocial_valores_edit').val(data.id_obraSocial);
                        $('#codigo_consulta_valores_edit').val(data.codigo_consulta);
                        $('#valor_consulta_edit').val(data.valor_consulta);
                    }
                });
            });

        });
        var listarOsociales = function() {
            $.post("includes/config/listarOsociales.php", {
                    obraSocial: "listar"
                },
                function(msj) {
                    $(".detalles").html(msj);
                });
        }
        var listarTiposConsultas = function() {
            $.post("includes/config/listarTiposConsultas.php", {
                    tipoConsulta: "listar"
                },
                function(msj) {
                    $(".detalles_tipos_consultas").html(msj);
                });
        }
        var listarValores = function() {
            $.post("includes/config/listarValores.php", {
                    tipoConsulta: "listar"
                },
                function(msj) {
                    $(".listado_valores").html(msj);
                });
        }
        var nuevaObraSocial = function() {
            $('#frm_osocial').on('submit', function(e) {
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
                        Command: toastr["success"]("Bien hecho! has realizado la consulta correctamente.")
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
                    //console.log( info );
                    $(".info").fadeIn("slow").html(info);
                    $("#loader").css("display", "none");
                    listarOsociales();
                    $('#frm_osocial')[0].reset();
                    //$('#titulo_frm').text("Agregar nueva");
                    //$('#btn-save').removeClass("btn-warning");
                    //$('#btn-save').addClass("btn-secondary");
                    //$('#nueva').fadeOut("slow");
                });
            });
        }
        var nuevoTipoConsulta = function() {
            $('#frm_tipo_new').on('submit', function(e) {
                e.preventDefault();
                var frm = $(this).serialize();
                $.ajax({
                    method: "POST",
                    url: "lib/process.php",
                    data: frm,
                    beforeSend: function() {},
                    complete: function() {
                        Command: toastr["success"]("Bien hecho! has realizado la consulta correctamente.")
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
                    //console.log( info );
                    $(".info_tipo").fadeIn("slow").html(info);
                    $("#loader").css("display", "none");
                    listarTiposConsultas();
                    $('#frm_tipo_new')[0].reset();
                });
            });
        }
        var nuevoValor = function() {
            $('#frm_valores_cobro').on('submit', function(e) {
                e.preventDefault();
                var frm = $(this).serialize();
                $.ajax({
                    method: "POST",
                    url: "lib/process.php",
                    data: frm,
                    beforeSend: function() {
                        $(".resultado_valor").fadeIn("slow")
                        $(".resultado_valor").html("Aguarde unos instantes...")
                        $("#loader").css("display", "inline");
                    },
                    complete: function() {
                        Command: toastr["success"]("Bien hecho! has realizado la consulta correctamente.")
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
                    //console.log( info );
                    $(".resultado_valor").fadeIn("slow").html(info);
                    listarValores();
                    $('#frm_valores_cobro')[0].reset();
                    $("#loader").hide();
                });
            });
        }
        var editar = function() {
            $('#frm_osocial_edit').on('submit', function(e) {
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
                        Command: toastr["success"]("Bien hecho! has realizado la consulta correctamente.")
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
                    //console.log( info );
                    $(".info").fadeIn("slow").html(info);
                    $("#loader").css("display", "none");
                    listarOsociales();
                    $('#frm_osocial_edit')[0].reset();
                    $('.edit_card').hide('slow');
                    $('.add_card').show('slow');
                });
            });
        }
        var editar_tipo = function() {
            $('#frm_tipo_edit').on('submit', function(e) {
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
                        Command: toastr["success"]("Bien hecho! has realizado la consulta correctamente.")
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
                    $(".info_tipo_edit").fadeIn("slow").html(info);
                    listarTiposConsultas();
                    $('#frm_tipo_edit')[0].reset();
                    $('#frm_tipo_edit').hide('slow');
                    $('#frm_tipo_new').show('slow');
                });
            });
        }
        var editar_valor_consulta = function() {
            $('#frm_valores_cobro_edit').on('submit', function(e) {
                e.preventDefault();
                var frm = $(this).serialize();
                $.ajax({
                    method: "POST",
                    url: "lib/process.php",
                    data: frm,
                    beforeSend: function() {
                        $("#loader_editar_valor").css("display", "inline");
                    },
                    complete: function() {
                        $("#loader_editar_valor").css("display", "none");
                        Command: toastr["success"]("Bien hecho! has realizado la consulta correctamente.")
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
                    $(".resultado_valor").fadeIn("slow").html(info);
                    listarValores();
                    $('#frm_valores_cobro_edit')[0].reset();
                    $('#frm_valores_cobro_edit').hide('slow');
                    $('#frm_valores_cobro').show('slow');
                });
            });
        }
    </script>
</body>

</html>