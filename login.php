<?php include("header.php");?>
<style>

    body{
        background-color: #ededed;
        background-image: url(assets/images/gallery/bg1.jpg);
        background-size: 1500px;
        background-position: center;
        background-repeat: no-repeat;
    }
    #oks{
        margin-top: 3%;
    }
    #v{
        font-size: 40px;
        font-style:italic;
        color: limegreen;
        
    }
    #log{
        
        padding-top: 45px;
        padding-bottom: 60px;
        padding-left: 30px;
        padding-right: 30px;
        background-color: rgba(255, 255, 255, 0.4);
        border-radius: 0px;
        box-shadow: 0px 4px 26px #ccc;        
        
    }
    #log:hover{
         background-color: rgba(255, 255, 255, 0.05);
    }
    legend{
        padding: 10px;
        text-align: center;
        font-family:'Rancho', cursive;
        font-size: 30px;
    }
    .form-control{
        
        border-radius: 5px;
        padding: 10px;
        background-color: rgba(255, 255, 255, 0.05);
        font-size: 16px;
        color: black;
        
    }
    small{
        font-size: 16px !important;
        color: #a5a1a1;
        font-family: Arial black;
    }
    .form-control:focus,
    .form-control:hover{
        
        background-color: rgba(204, 204, 204, 0.24) !important;
        border:1px solid gray !important;        
    }
</style>
<body>
<div class="container">

    <div class="row" id="oks">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-lg-4 col-lg-offset-4 col-xs-12">
            
            <legend><span id="v">V</span>alentin 2.0 <br><small>Sistema de gestión médico</small></legend>
            
            <br>
            
            <div class="card-box" id="log">
                <h3 style="text-align:center">Bloqueo del sistema</h3>
                <hr><br>
                <form id="desbloquear">
                    <div class="form-group">
                        <input type="password" class="form-control" id="pass" placeholder="Password">
                    </div>
                    
                    <hr>
                    <button type="submit" class="btn btn-lg btn-danger waves-effect waves-light btn-block"> Desbloquear </button>
                </form>
                
            </div>
        </div>
    </div>    
    
</div>
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
<!-- Sweet Alert js -->
<script src="assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>
<script>
$(document).ready(function(){
    
    $('#desbloquear').submit(function(e){
        e.preventDefault();
        var pass = $('#pass').val();
        
        if(pass != "2012martina" || pass ==""){
            swal({
                title: "Error la contraseña es inválida",
                text: "Reintente nuevamente...",
                type: "error",
                showCancelButton: false,
                confirmButtonClass: 'btn-danger waves-effect waves-light',
                confirmButtonText: 'Reintentar!'
            });            
        }else{
            swal({
                title: "Contraseña correcta",
                text: "Aguarde dos segundos, por favor",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: 'btn-success waves-effect waves-light',
                confirmButtonText: 'Excelente!'
            });
            window.setTimeout(function(){
                location.href = "index.php";
            },2000);
        }
    });
});
</script>
</body>
</html>