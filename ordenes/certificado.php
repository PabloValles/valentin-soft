<?php
include("../conexion.php");
sleep(1);

$id = $_POST['pac'];

//consulta
$sql = "select * from pacientes where id_paciente='$id'";
$sql2 = "select fum_ficha, fpp_ficha from ficha_obstetrica where id_paciente_ficha = '$id' order by fum_ficha desc LIMIT 1";
$query = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
$query2 = mysqli_query($conexion,$sql2) or die(mysqli_error($conexion));

$llena_paciente=mysqli_fetch_array($query);
$llena_paciente2=mysqli_fetch_array($query2);

$fum = $llena_paciente2['fum_ficha'];
$fum_format = date('d-m-Y',strtotime($fum));

?>
<input type="hidden" id="id_imprimir" value="<?php echo $llena_paciente['id_paciente'];?>">
<hr>
<div class="col-md-12">
    <div class="card">
        <h3 class="card-header">Paciente: <?php echo $llena_paciente['nombre_pac']." ".$llena_paciente['apellido_pac'];?> <span class="pull-right"># <?php echo $llena_paciente['dni_pac'];?></span></h3>
        <div class="card-block">
            <h4 class="card-title">Certificado</h4><br>
            <input type="hidden" name="fum" id="fum" value="<?php echo $fum;?>">
            <input type="hidden" name="hoy" id="hoy" value="<?php echo date('Y-m-d');?>">
            <p style="font-size: 16px;" class="card-text" id="resumen_1"><?php echo "<b>".$llena_paciente['nombre_pac']." ".$llena_paciente['apellido_pac']."</b>";?>
            </p>
            <p style="font-size: 16px;" class="card-text" id="resumen_2">Cursa embarazo de <span id="semanas"></span> semanas de gestación.</p>
            <p style="font-size: 16px;" class="card-text" id="resumen_3"><?php echo "Con FUM: <b>".$fum_format."</b> y FPP: <b>".$llena_paciente2['fpp_ficha']."</b>";?>
            </p>
            
        </div>
    </div>
</div>
