<?php
include '../conexion.php';

$query = ("SELECT * from pacientes");
$resultado = mysqli_query($conexion,$query);
//$total=mysqli_num_rows($resultado);
?>
<!-- item-->
<div class="dropdown-item noti-title">
    <h5><small><span class="label label-danger pull-xs-right"><?php echo $total;?></span>Notificaciones</small></h5>
</div>
<?php 
    while ($traer2 = mysqli_fetch_array($resultado)){ 
        $fecha_hasta = $traer2['hasta_pac'];
        $today = date('Y-m-d');

        if ($fecha_hasta < $today && $fecha_hasta != "0000-00-00" ) {
            ?>
            <a href="editaPaciente.php?accion=<?php echo $traer2['id_paciente'];?>" class="dropdown-item notify-item">
                <div class="notify-icon bg-danger"><i class="icon-bubble"></i></div>
                <p class="notify-details">
                   CARNET VENCIDO | <br><?php echo $traer2['nombre_pac'].$traer2['apellido_pac']. " - O.S.: ".$traer2['obsocial_pac'];?> 
               <small class="text-muted"><?php echo "Venció: <b style='color:red'>".date('d-m-Y', strtotime($traer2['hasta_pac']));?></b></small>
                </p>
            </a>
            <?php
        }
    } 
?>
<!-- All-->
<a href="javascript:void(0);" class="dropdown-item notify-item notify-all">
    Ver informe de vencimientos
</a>