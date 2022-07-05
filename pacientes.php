<?php include("header.php");?>
<!-- DataTables -->
<link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<script src="assets/js/calcularEdad2.js"></script>
<body>
    <?php include("navs.php");?>

    <div class="wrapper">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="btn-group pull-right m-t-15">
                        <button class="btn btn-secondary waves-effect" data-toggle="modal" data-target=".bs-nuevo-modal-lg"><i class="fa fa-plus"></i> Nuevo paciente</button>
                        <button type="button" class="btn btn-custom pull-right dropdown-toggle waves-effect waves-light"
                                data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i
                                class="fa fa-cog"></i></span></button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Informes de pacientes</a>
                            <a class="dropdown-item" href="#">Informes de obras sociales</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php">Volver la menu principal</a>
                        </div>

                    </div>
                    <h4 class="page-title">Bienvenida doctora</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>Listado de pacientes</b></h4>
                        <br>
                        <table id="dt_pacientes" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Apellido</th>
                                    <th>Nombre</th>
                                    <th>Nacimiento</th>
                                    <th>Edad</th>
                                    <th>DNI</th>
                                    <th>Obra Social</th>
                                    <th>Teléfono</th>
                                    <th style="text-align:center">#</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

            <?php include("includes/Pacientes/modal_nuevo.php");?>
            <?php include("includes/Pacientes/modal_eliminar.php");?>

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

<script>
    $(document).ready(function(){
        
        $("title").html("Listado de pacientes");
        //Command: toastr["info"]("Sector pacientes.", "Bienvenida doctora !");
        listar();
        nuevo_paciente();
        eliminar();
        
        $("#dividendo1").blur(function(){
           obtenerSumaa();
        });
        $("#dividendo2").blur(function(){
           obtenerSumaa();
        });
    });
    var listar = function(){
        var table = $("#dt_pacientes").DataTable({
            "destroy":true,
            "ajax":{
                "method":"POST",
                "url": "lib/listar_pacientes.php"
            },
            "columns":[
                {"data":"id_paciente"},
                {"data":"apellido_pac"},
                {"data":"nombre_pac"},
                {"data":"fecha_nacimiento"},
                {"data":"edad_pac"},
                {"data":"dni_pac"},
                {"data":"obsocial_pac"},
                {"data":"tel_paciente"},
                {"defaultContent":"<button type='button' class='btn btn-info btn-sm editarPaciente' title='Editar paciente' ><i class='fa fa-pencil'></i></button>&nbsp<button type='button' class='btn btn-danger btn-sm eliminarPaciente' data-toggle='modal' data-target='#modal_eliminar' title='Eliminar paciente'><i class='fa fa-trash'></i></button>"}
            ],
            "language": idioma_espanol,
            "sDom":"<'row'<'col-md-8 col-lg-8 col-sm-12 col-xs-12'B><'col-md-4 col-lg-4 col-sm-12 col-xs-12 pull-right'f>>'<rt>'<'row'<'col-md-4 col-sm-6'l><'col-md-4'i><'col-md-4 col-sm-6 pull-right'p>>",
            "buttons":[
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o"></i> Exportar a <span style="color:#139f13" >Excel</span>',
                    titleAttr: 'Excel',
                    "className": "btn btn-default-outline",
                 }, 
                 {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf-o"></i> Exportar a <span style="color:#e80404">PDF</span>',
                    titleAttr: 'PDF',
                    "className": "btn btn-default-outline",
                 },
                 {
                     extend:'colvis',
                     text: 'Filtrar columnas',
                     titleAttr:'colvis'
                 },
                 {
                     extend:'copy',
                     text: 'Copiar datos',
                     titleAttr:'copy'
                 }
                ],
              "lengthMenu": [[50, 100, -1], [50, 100, "Todos"]]
        });
        //table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        id_eliminar("#dt_pacientes tbody", table);
        id_editar("#dt_pacientes tbody", table);
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
    var nuevo_paciente = function(){
     $('#paciente_muevo').on('submit',function(e){
      e.preventDefault();

      var ape = $("#apellido_paciente").val();
      var name = $("#nombre_paciente").val();
      var fecha_nac = $("#nacimiento_pac").val();
      var dni = $("#dni_paciente").val();

      if(ape==="" || name==="" || fecha_nac==="" || dni===""){
          $("#apellido_paciente").parent().addClass("has-error");
          $("#nombre_paciente").parent().addClass("has-error");
          $("#nacimiento_pac").parent().addClass("has-error");
          $("#dni_paciente").parent().addClass("has-error");
          $("#error").css("display","block");

      }else{
          $("#apellido_paciente").parent().addClass("has-success");
          $("#nombre_paciente").parent().addClass("has-success");
          $("#nacimiento_pac").parent().addClass("has-success");
          $("#dni_paciente").parent().addClass("has-success");
          $("#error").css("display","none");
          var frm = $(this).serialize();
          $.ajax({
            method: "POST",
            url: "lib/process.php",
            data: frm,
            beforeSend:function(){
              $("#loader").css("display","inline");
              $("#guardar").html("loading...");
          },
           complete: function(){
              $("#loader").css("display","none");
               $("#guardar").html("Guardar");
               $("#error").css("display","none");
          }, 
          }).done( function( info ){
            console.log( info );
            $(".mensaje").fadeIn("slow").html(info);
            $("#error").css("display","none");
            $("#loader").css("display","none");
          });
      }
    });
    }
    var id_eliminar = function(tbody, table){
        $(tbody).on("click", "button.eliminarPaciente", function(){
            var data = table.row( $(this).parents("tr") ).data();
            var id = $("#frmEliminar #id").val( data.id_paciente );
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
            $("#ocu").fadeOut("slow");
            $("#loader").css("display","none");
            $("#delete_btn").html("Se ha eliminado");
          });
        });
    }
    var id_editar = function(tbody, table){
        $(tbody).on("click", "button.editarPaciente", function(){
            var data = table.row( $(this).parents("tr") ).data();
            var id2 = data.id_paciente;
            window.location.href="editaPaciente.php?accion="+id2;
            console.log(id);
        });
    }
    var obtenerSumaa = function(){
        var result = $("#resultado").val();
        var dividendo1 = $("#dividendo1").val();
        var dividendo2 = $("#dividendo2").val();

        result = parseFloat(dividendo1 / Math.pow(parseFloat(dividendo2),2)).toFixed(2);
        $("#resultado").val(result);
    }
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-bottom-left",
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
</script>
</body>
</html>