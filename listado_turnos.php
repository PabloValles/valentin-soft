<?php include("header.php");?>

   <!-- DataTables -->
<link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<body>

    <?php include("navs.php");?>
    <div class="wrapper">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="btn-group m-t-15">
                        <a href="turnos.php" class="btn btn-secondary waves-effect waves-success"><i class="ti-pencil-alt"></i> Módulo turnos</a><br><br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>Listado de turno</b></h4>
                        <br>
                        <div class="eliminado"></div>
                        <table id="dt_consultas" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr class="propio">
                                    <th>id</th>
                                    <th>Paciente</th>
                                    <th>Turno</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
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
   
<script>
    $(document).ready(function(){
        listar();
        //eliminar();
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
                "url": "lib/listar_turnos.php",//y llamas aqui otra vez
            },
            "columns":[
                {"data":"id"},
                {"data":"title"},
                {"data":"startdate"},
                {"defaultContent":"<button type='button' class='btn btn-danger btn-sm delTurno' data-toggle='modal' data-target='#modal_editar' title='Eliminar turno'><i class='fa fa-trash'></i></button>"}
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
        //id_editar("#dt_consultas tbody", table);
        //id_eliminar("#dt_consultas tbody", table);
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
    var id_eliminar = function(tbody, table){
        $(tbody).on("click", "button.delTurno", function(){
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
            console.log( info );
            $(".eliminado").fadeIn("slow").html(info);
            $("#modal_eliminar").hide();
          });
        });
    }
</script>
</body>
</html>