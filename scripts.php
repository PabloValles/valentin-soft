<?php include("header.php"); ?>

<body>

    <?php include("navs.php"); ?>
    <div class="wrapper">
        <div class="container">
            <br><br>
            <div class="row">
                <input type="hidden" name="id_obra_social" value="1">
                <!--ospe-->
                <input type="hidden" name="id_obra_social" value="1">
                <!--cod seleccionado-->
                <div class="col-md-3">
                    <label for="f_consulta">fecha de consulta</label>
                    <input class="form-control" type="date" name="f_consulta" id="f_consulta">
                </div>
                <div class="col-md-3">
                    <label for="f_presentacion">fecha de presentación</label>
                    <input class="form-control" type="date" name="f_presentacion" id="f_presentacion">
                </div>
                <div class="col-md-3">
                    <label for="f_cobro">fecha de cobro</label>
                    <input class="form-control" type="date" name="f_cobro" id="f_cobro">
                </div>
                <div class="col-md-3">
                    <label for="v_consulta">Valor de consulta</label>
                    <input class="form-control" type="number" name="v_consulta" id="v_consulta">
                </div>
                <div class="col-md-6">
                    <select id="id_obrasocial_valores" class="form-control" name="id_obrasocial_valores" style="width: 100% !important">
                        <?php
                        $obraSocial = mysqli_query($conexion, "select * from osociales order by nombre");
                        while ($llena_obraSocial = mysqli_fetch_array($obraSocial)) {
                        ?>
                            <option value="<?php echo $llena_obraSocial['id']; ?>"><?php echo $llena_obraSocial['nombre']; ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <select id="codigo_consulta_valores" class="form-control" name="codigo_consulta_valores" style="width: 100% !important">
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
            <br><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block">
                            <p>
                                1) Calcular fecha de presentación:
                                Algoritmo:
                                <br><br>
                                <h1 id="resultado"></h1>

                                <br>

                                <h1 id="fecha_cobro"></h1>
                            </p>
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
            let f_consulta = $('#f_consulta');
            let f_cobro = $('#f_cobro');
            let v_cobro = $('#v_cobro');

            $('#f_consulta').change(function() {
                var d = $(this).val();
                fecha_presentacion(d);

                var fp = $("#f_presentacion").val();
                fecha_cobro(fp, 30);
            });

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

            $('#codigo_consulta_valores').change(function() {
                valor_consulta();
            });
        });
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
            $('#f_cobro').css("border", "2px solid #bbe165");

        }

        var valor_consulta = function() {
            var id_obrasocial_valores = $("#id_obrasocial_valores").val();
            var codigo_consulta_valores = $("#codigo_consulta_valores").val();
            console.log(id_obrasocial_valores);
            console.log(codigo_consulta_valores);

            if (id_obrasocial_valores != "" && codigo_consulta_valores != "") {
                $.ajax({
                    url: "includes/config/precios_consultas.php",
                    method: "POST",
                    data: {
                        id_obrasocial_valores: id_obrasocial_valores,
                        codigo_consulta_valores: codigo_consulta_valores
                    },
                    success: function(data) {
                        console.log(data);
                        $("#resultado").html(data)
                    }
                });
            } else {
                alert("Error: el codigo no ha sido seleccionado")
            }
        }
    </script>
</body>

</html>