
<style>
.form-control.disabled:hover{
    background-color: #eceeef !important;
    border-color:#ccc !important;
}
</style>
<?php
include("../conexion.php");


$id = $_POST['pac'];

//consulta
$sql = "select * from pacientes, antecedentes_personales, antecedentes_ginecoobs where pacientes.id_paciente = '$id' and antecedentes_personales.id_paciente='$id' and antecedentes_ginecoobs.id_paciente='$id'";
$query = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));

$llena_paciente=mysqli_fetch_array($query);

?>
<form action="" method="POST" role="form" id="frm_creaConsulta">
    <input type="hidden" name="opcion" id="opcion" value="nuevo">
    <input type="hidden" name="tag" id="tag" value="consulta">
    <input type="hidden" name="id_paciente_consulta" id="id_paciente_consulta" value="<?php echo $id;?>">
    <div class="msj"></div>
    <input type="hidden" class="form-control disabled" name="apellido" id="apellido" value="<?php echo $llena_paciente['apellido_pac'];?>">
    <input type="hidden" class="form-control disabled" name="nombre" id="nombre" value="<?php echo $llena_paciente['nombre_pac'];?>">
    <input type="hidden" class="form-control disabled" name="dni" id="dni" value="<?php echo $llena_paciente['dni_pac'];?>">
    <input type="hidden" class="form-control disabled" name="tel_paciente" id="tel_paciente" value="<?php echo $llena_paciente['tel_paciente'];?>">
    <input type="hidden" class="form-control disabled" name="Obra_social" id="Obra_social" value="<?php echo $llena_paciente['obsocial_pac'];?>">
    <input type="hidden" class="form-control" name="Plan" id="Plan" value="<?php echo $llena_paciente['plan_obsocial_pac'];?>">
    <input type="hidden" class="form-control" name="N_obrasocial" id="N_obrasocial" value="<?php echo $llena_paciente['nro_obsocial_pac'];?>">

    <div class="row card-box" style="box-shadow: 0px 0px 0px; border-radius: 0px; border-bottom:2px solid rgb(27, 185, 154);" >
        <div class="col-md-8">
            <div>
                <strong  style="color: rgb(27, 185, 154)">Paciente:</strong> <?php echo $llena_paciente['apellido_pac']." ".$llena_paciente['nombre_pac'];?><br>
                <strong  style="color: rgb(27, 185, 154)">Dni:</strong> <?php echo $llena_paciente['dni_pac'];?> <br>
                <strong  style="color: rgb(27, 185, 154)">Teléfono:</strong> <?php echo $llena_paciente['tel_paciente'];?> 
            </div>
        </div>
        <div class="col-md-4">
            <div>
                <strong  style="color: rgb(27, 185, 154)">Obra social:</strong> <?php echo $llena_paciente['obsocial_pac'];?><br>
                <strong  style="color: rgb(27, 185, 154)">Plan:</strong> <?php echo $llena_paciente['plan_obsocial_pac'];?> <br>
                <strong  style="color: rgb(27, 185, 154)">N° Ob. Social:</strong> <?php echo $llena_paciente['nro_obsocial_pac'];?> 
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 col-xl-3">
            <div class="form-group">
               <label for="fechaConsulta">Fecha</label>
               <input type="date" class="form-control" name="fechaConsulta" id="fechaConsulta">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-xl-4">
            <div class="form-group">
               <label for="tipo_consulta">Tipo de consulta <span class="label label-danger" id="no_existe">¿No está?</span><span class="label label-success" id="buscar_nuevo">Buscar de nuevo</span></label>
               <span id="quitar">
                <select name="tipo_consulta" class="form-control" id="tipo_consulta" style="height:34px;"><?php
                    $tipo = "select * from tipo_consultas order by nombre_tipo";
                    $query = mysqli_query($conexion,$tipo) or die(mysqli_error($conexion));
                    while($tipo=mysqli_fetch_array($query)){
                        ?><option value="<?php echo $tipo['nombre_tipo'];?>"><?php echo $tipo['nombre_tipo'];?></option>
                        <?php
                    }?>
                </select></span>
                <input type="text" name="tipo_consulta_escrito" id="tipo_consulta2" class="form-control" autocomplete="off">
                <small id="help_manual"><span style="color:red">*</span> Recuerde que se guardará para un próximo uso</small>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-xl-4">
            <div class="form-group">
               <label for="cod">Código</label>
               <input type="text" class="form-control" name="cod" id="cod">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-sm-4 col-xs-12">
            <label for="mc">Liquidación</label>
            <select class="form-control" name="liq" id="liq">
               <option value="0">Seleccione :</option>
               <option value="Ninguna">Ninguna</option>
               <option value="Apresal">Apresal</option>
               <option value="Clinica_Santa_Rosa">Clinica Santa Rosa</option>
            </select>
        </div>
        <div class="col-xl-8 col-lg-8 col-sm-8 col-xs-12">
            <label for="mc">Motivo de consulta</label>
            <textarea name="mc" id="input" class="form-control" rows="3"></textarea>
        </div>
    </div>
    <hr>
	<button type="submit" id="guarda" class="btn btn-success waves-effect">Crear consulta</button>
	<a href="consultas.php" class="btn btn-secondary">Volver a consultas</a>
	<span id="loader"><img src="assets/images/heart2.gif" alt=""></span>
</form>

<hr>

<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Información:</strong>
    Si su <b><u>tipo de consulta</u></b> no se encuentra cargado. <br>
    Click en "No está" y anótelo a mano. "Recuerde que automáticamente lo va a estar cargando al tipo de consulta. (Es decir, va aparecer el <u>tipo</u> en la próxima consulta)".
</div>

<script>
    
$(document).ready(function() {
    $("#tipo_consulta").change(function() {
        comprobar_codigo();
    });
    $("#tipo_consulta2").hide();
    $("#help_manual").hide();
    $("#buscar_nuevo").hide();
    //$("#tipo_consulta2").val("");
    
    $('#no_existe').click(function() {
        $('#buscar_nuevo').show("");
        $('#no_existe').hide("slow");
        $("#quitar").hide();
        $("#tipo_consulta").val("");
        $("#tipo_consulta2").show();
        $("#help_manual").show();
        $("#tipo_consulta2").focus();
        $("#cod").val("");
    });
    $('#buscar_nuevo').click(function() {
        $('#buscar_nuevo').hide("slow");
        $('#no_existe').show("slow");
        $("#quitar").show();
        $("#tipo_consulta2").val("");
        $("#tipo_consulta2").hide();
        $("#help_manual").hide();
        $("#cod").val("");
    });


});
var comprobar_codigo = function(){
    var parametros = {
        "opcion":"tipoConsulta",
        "tag":"cod",
        "tipo": $('#tipo_consulta option:selected').val()
    };
    
    $.ajax({
        method: "POST",
        url: "lib/process.php",
        data: parametros,
        beforeSend:function(){
          //$("#loader").css("display","inline");
      },
       complete: function(){
           
      }, 
      }).done( function( info ){
        console.log( info );
        $("#cod").val(info);
      });
}
</script>
