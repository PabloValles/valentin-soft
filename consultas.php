<?php include("header.php");?>
   <!-- DataTables -->
<link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<style>
    .propio{
        background-color: rgba(187, 250, 238, 0.53);
        border-bottom: 1px solid #67c4ff;
    }
    #new:hover{
        color: white;
        border-color: #ccc;
        border:1px solid black !important;
    }
    #info:hover{
        color: white;
        border:1px solid black !important;
    }
    .flotante{
        font-size:15px;
        padding:10px;
        display: none;
        position: fixed;
        bottom: 2%;
        right: 2%;
    }
    .flotante:hover{
        border:1px solid black !important;
        background-color: #ba43bf;
        color: white;
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
                        <a href="nuevaConsulta.php" class="btn btn-secondary waves-effect w-md waves-success m-b-5"><i class="ti-pencil-alt"></i> Consulta Nueva</a>
                        <a href="informes.php?tag=consultas" class="btn btn-secondary waves-effect w-md waves-success m-b-5"><i class="ti-info-alt"></i> Informes</a>
                    </div>
                    <h4 class="page-title">Todas las consultas hasta la fecha: <span style="color:orange"><?php echo date("d-m-Y");?></span></h4>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>Listado de consultas</b></h4>
                        <br>
                        <div class="eliminado"></div>
                        <table id="dt_consultas" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr class="propio">
                                    <th>Apellido</th>
                                    <th>Nombre</th>
                                    <th>O Social</th>
                                    <th>Plan</th>
                                    <th>N° Afil</th>
                                    <th>Fecha</th>
                                    <th>Cód</th>
                                    <th>MC</th>
                                    <th>liq</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>

            <?php include("includes/Consultas/modals_consultas.php");?>
            <a href="nuevaConsulta.php" class="btn btn-secondary waves-effect flotante"><i class="ti-heart"></i> Consulta nueva</a>
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
<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>
<script src="assets/js/consultas.js"></script>
   
<script>
    $(document).ready(function(){
        listar();
        eliminar();
        verificarMotivo();
        $('#btn_edit').click(function(){
            var id = $('#idPacienteConsulta').val();
            window.location.href = "ordenes/orden_consulta.php?id_orden="+id;
        });
    });
    $(window).scroll(function(){
       if ($(this).scrollTop() > 180){
           $(".flotante").show();
       } else{
           $(".flotante").fadeOut();
       }
    });
    var listar = function(){
        var table = $("#dt_consultas").DataTable({
            "destroy":true,
            "ajax":{
                "method":"POST",
                "url": "lib/listar_consultas.php",//y llamas aqui otra vez
            },
            "columns":[
                //{"data":"idConsulta"},
                {"data":"Apellido_Paciente"},
                {"data":"Nombre_Paciente"},
                {"data":"ObraSocial_Paciente"},
                {"data":"plan"},
                {"data":"nro"},
                {"data":"fechaConsulta"},
                {"data":"cod"},
                {"data":"tipoConsulta"},
                {"data":"liq"},
                {"defaultContent":"<button type='button' class='btn btn-info btn-sm ediConsulta' data-toggle='modal' data-target='#modal_editar' title='Eliminar consulta'><i class='fa fa-edit'></i></button>&nbsp<button type='button' class='btn btn-danger btn-sm delConsulta' data-toggle='modal' data-target='#modal_eliminar' title='Eliminar consulta'><i class='fa fa-trash'></i></button>"}
            ],
            "language": idioma_espanol,
            "sDom":"<'row'<'col-md-8 col-lg-8 col-sm-12 col-xs-12'B><'col-md-4 col-lg-4 col-sm-12 col-xs-12 pull-right'f>>'<rt>'<'row'<'col-md-4 col-sm-6'l><'col-md-4'i><'col-md-4 col-sm-6 pull-right'p>>",
            "buttons":[
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o"></i> Exportar a <span style="color:#139f13" >Excel</span>',
                    titleAttr: 'Excel',
                    "className": "btn btn-default-outline",
                    exportOptions:{columns:':visible'},
                    title:'Listado de consultas',
                 }, 
                 {
                    extend:    'pdfHtml5',
                    message: 'Listado de consultas generado.',
                    text:      '<i class="fa fa-file-pdf-o"></i> Exportar a <span style="color:#e80404">PDF</span>',
                    titleAttr: 'PDF',
                    "className": "btn btn-default-outline",
                    download:'open',
                    exportOptions:{columns:':visible'},
                    title:'Listado de consultas',

                 },
                 {
                    extend:'colvis',
                    collectionLayout:'fixed two-column',
                    text: 'Filtrar columnas',
                    titleAttr:'colvis',
                 },
                 {
                    extend:'print',
                    text: 'Imprimir',
                    titleAttr:'imp',
                    message:'Listado de consultas',
                    exportOptions:{columns:':visible'}
                 }
                ],
        });
        id_editar("#dt_consultas tbody", table);
        id_eliminar("#dt_consultas tbody", table);
    }
    var idioma_espanol = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Registros del _START_ al _END_ .Total de registros _TOTAL_ ",
    "sInfoEmpty":      "Registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
    var id_editar = function(tbody, table){
         $(tbody).on("click", "button.ediConsulta", function(){
            var data = table.row( $(this).parents("tr") ).data();
            var id = $("#idConsulta").val( data.idConsulta ),
            idPacienteConsulta = $("#idPacienteConsulta").val( data.idPacienteConsulta ),
            Apellido_Paciente = $("#apellido").val( data.Apellido_Paciente ),
            Nombre_Paciente = $("#nombre").val( data.Nombre_Paciente ),
            dni_pac_consul = $("#dni").val( data.dni_pac_consul ),
            ObraSocial_Paciente = $("#Obra_social").val( data.ObraSocial_Paciente ),
            plan = $("#Plan").val( data.plan ),
            nro = $("#N_obrasocial").val( data.nro ),
            fechaConsulta = $("#fechaConsulta").val( data.fechaConsulta ),
            tipoConsulta = $("#tipo_consulta").val( data.tipoConsulta ),
            cod = $("#cod").val( data.cod ),
            MotivoConsulta = $("#mc").val( data.MotivoConsulta );
            liq = $("#mc").val( data.liq );
            opcion = $("#opcion").val("mod"),
            tag = $("#tag").val("consulta");
        });
    }
    var id_eliminar = function(tbody, table){
        $(tbody).on("click", "button.delConsulta", function(){
            var data = table.row( $(this).parents("tr") ).data();
            var id = $("#frmEliminar #idconsul").val( data.idConsulta );
            console.log(id);
        });
    }
    var eliminar = function(){
    $("#frmEliminar").on("submit", function(e){
      e.preventDefault();
      var frm = $(this).serialize();
      $.ajax({
        method: "POST",
        url: "lib/process.php",
        data: frm,
        beforeSend:function(){
              $("#loader").css("display","inline");
              $("#delete_btn").html("Eliminando...");
          },
      }).done( function( info ){
            //console.log( info );
            $(".eliminado").fadeIn("slow").html(info);
            $("#modal_eliminar").hide();
          });
        });
    }
</script>
</body>
</html>