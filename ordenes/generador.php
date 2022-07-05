<?php
include("../conexion.php");
sleep(1);

$id = $_POST['pac'];

//consulta
$sql = "select * from pacientes, antecedentes_personales, antecedentes_ginecoobs where pacientes.id_paciente = '$id' and antecedentes_personales.id_paciente='$id' and antecedentes_ginecoobs.id_paciente='$id'";
$query = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));

$llena_paciente=mysqli_fetch_array($query);

?>
<input type="hidden" id="id_imprimir" value="<?php echo $llena_paciente['id_paciente'];?>">
<hr>
<div class="col-md-12">
    <div class="card">
        <h3 class="card-header" id="resumen_1">Paciente: <?php echo $llena_paciente['nombre_pac']." ".$llena_paciente['apellido_pac'];?> <span class="pull-right"># <?php echo $llena_paciente['dni_pac'];?></span></h3>
        <div class="card-block">
            <h4 class="card-title">Detalles del paciente</h4><br>
            <p class="card-text" id="resumen_2"><b>Obra social: </b><?php echo $llena_paciente['obsocial_pac'];?></p>
            <p class="card-text" id="resumen_3"><b>Número: </b><?php echo $llena_paciente['nro_obsocial_pac'];?></p>
            <p class="card-text" id="resumen_4"><b>Plan: </b><?php echo $llena_paciente['plan_obsocial_pac'];?></p>
        </div>
    </div>
</div>
