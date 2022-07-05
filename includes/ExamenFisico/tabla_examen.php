                           
<?php 
include "../../conexion.php";
$id = $_POST['valor_id'];
$consulta2 = mysqli_query($conexion, "select * from examen_fisico where idPaciente_ex_fisico='$id' order by fecha_ex_fisico_pac ") or die(mysqli_error($conexion));

?>
<!-- /.modal -->
<div class="table-responsive">
<div class="info"></div>
<table class="table table-bordered">
<legend>Fichas de examen físico 
    <span class="pull-right"><button class="btn btn-primary waves-effect waves-light" type="button" data-toggle="modal" data-target=".bs-example-modal-lg">Examen fisico nuevo</button></span>
</legend>

<hr>
<thead>
    <tr>
        <th>ID</th>
        <th>Fecha</th>
        <th>Motivo de consulta</th>
        <th>Examen físico</th>
        <th style="width:120px;">#</th>
    </tr>
</thead>

<tbody>

<?php                                    
while ($traer2 = mysqli_fetch_array($consulta2)){
   $nuevoid = $traer2['id_examen_fisico'];
   $fecha_ex_fisico_pac = $traer2['fecha_ex_fisico_pac'];
   $fecha_ex_fisico_pac_esp = date("d-m-Y",strtotime($fecha_ex_fisico_pac));
?> 
    <tr>
        <td><?php echo $nuevoid;?></td>
        <td><?php echo $fecha_ex_fisico_pac_esp;?></td>
        <td><?php echo $traer2['mc_pac'];?></td>
        <td><?php echo $traer2['ex_fisico_pac'];?></td>
        <td style="text-align:center"><?php echo "<a class='btn btn-info btn-sm' href='editar_examenFisico.php?accion=$nuevoid' title='Editar'><i class='fa fa-pencil'></i></a>". " " ."<a class='btn btn-danger btn-sm' href='eliminar_examenFisico.php?del=$nuevoid' title='Eliminar'><i class='fa fa-trash'></i></a>";?></td>
    </tr>
<?php } ?>
</tbody>
</table>
</div>


