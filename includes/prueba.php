<?php var_dump($_SERVER["DOCUMENT_ROOT"]); ?>
<?php include($_SERVER["DOCUMENT_ROOT"]."/Valentin/header.php");?>

<body>

        <?php include($_SERVER["DOCUMENT_ROOT"]."/Valentin/navs.php");?>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                            <button type="button" class="btn btn-custom dropdown-toggle waves-effect waves-light"
                                    data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i
                                    class="fa fa-cog"></i></span></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Ir a pacientes</a>
                                <a class="dropdown-item" href="#">Consultas</a>
                                <a class="dropdown-item" href="#">Turnos</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Configuraciones</a>
                            </div>

                        </div>
                        <h4 class="page-title">Bienvenida doctora</h4>
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

<!-- Counter Up  -->
<script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
<script src="assets/plugins/counterup/jquery.counterup.min.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

<script>
$(document).ready(function(){
});      
</script>
</body>
</html>