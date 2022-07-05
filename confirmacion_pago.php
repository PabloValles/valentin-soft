<?php

if (isset($_POST['guardar'])) {
    ?>
    <?php include("header.php");
include "pruebas.php";
?>
<body>

<?php include("navs.php");?>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title" style="color:black">CONFIRMACIÓN DE PAGO</h4>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-12 col-xs-12 col-lg-12">
                
                <div class="card-box" style="border-left: 2px dashed rgb(198, 7, 7); border-radius: 0px">
                    
                    <?php

                    $id_ficha = $_POST['idFicha'];

                    $traer = "select * from pacientes as p INNER JOIN ficha_obstetrica as f ON p.id_paciente=f.id_paciente_ficha where id_ficha=$id_ficha";
                    $query = mysqli_query($conexion, $traer) or die(mysqli_error($conexion));
                    $llena_ficha = mysqli_fetch_array($query);


                    ?>
                    <h4>Usted está apunto de pagar la operación con ID: <?php echo $id_ficha;?> <i class="ion-card pull-right"></i></h4>
                    <hr>
                    <form action="" method="POST" role="form">
                        <div class="row">
                            <div class="col-md-6">
                                Paciente: <?php echo $llena_ficha['nombre_pac']." ".$llena_ficha['apellido_pac'];?><br>
                                <?php echo "DNI: ".$llena_ficha['dni_pac'];?><br>
                                <?php echo "Edad: ".$llena_ficha['edad_pac'];?>
                            </div>
                            <div class="col-md-6">
                                <b>ID cirugía: </b><?php echo $llena_ficha['id_ficha'];?><br>
                                <b>Terminación: </b><?php echo $llena_ficha['terminacion'];?><br>
                                <b>Tipo de Terminación: </b><?php echo $llena_ficha['tipo_terminacion'];?><br>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fecha_presentacion">Fecha de presentación</label>
                                    <input type="date" name="fecha_presentacion" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fecha_pago">Fecha de pago</label>
                                    <input type="date" name="fecha_pago" id="fecha_pago" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="importe">Importe en $</label>
                                    <input type="text" name="importe" id="importe" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="importe">Estado</label>
                                    <select name="estado" id="estado" class="form-control">
                                        <option value="Pago total">Pago total</option>
                                        <option value="Pago parcial">Pago parcial</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Observaciones</label>
                            <textarea name="" id="input" class="form-control" rows="3" required="required"></textarea>
                        </div>
                    
                        
                    
                        <button type="submit" class="btn btn-danger btn-block">Confirmar pago</button>
                    </form>

                </div>
                
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-xl-12">
                
                <div class="card-box traePaciente" style="border-radius:0px; border-top:5px solid #1bb99a; display:none"></div>
                
            </div>
        </div>
        
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
    <!-- Toastr js -->
    <script src="assets/plugins/toastr/toastr.min.js"></script>
    <script src="assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>
<script src="assets/js/consultas.js"></script>

<script>
$(document).ready(function(){
    $(".topbar-main").css("background-color","#c60707");

    
    
});

</script>
</body>
</html>
<?php
}else{
    echo "error";
}