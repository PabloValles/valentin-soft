                           
<?php 
include "../../conexion.php";
$id = $_POST['valor_id'];
$consulta2 = mysqli_query($conexion, "select * from ficha_obstetrica where id_paciente_ficha='$id' order by fum_ficha ") or die(mysqli_error($conexion));
?>
<div class="table-responsive">
<table class="table table-bordered table-condensed">
<legend>Fichas de examen físico 
    <span class="pull-right"><a class="btn btn-primary waves-effect waves-light" href="includes/ExamenOBs/generarFicha.php?id=<?php echo $id;?>" id="new_ficha_obs">Crear ficha nueva</a></span>
</legend>

<hr>
<thead>
    <tr>
        <th>FUM</th>
        <th>FPP</th>
        <th>Terminacion</th>
        <th>Tipo</th>
        <th>NOTAS</th>
        <th style="width:120px;">#</th>
    </tr>
</thead>

<tbody>

<?php                                    
while ($traer2 = mysqli_fetch_array($consulta2)){
   $nuevoid_ficha = $traer2['id_ficha'];
   $fecha_fum = date('d-m-Y', strtotime($traer2['fum_ficha']));
   $terminacion = $traer2['terminacion'];
?> 
    <tr> 
        <td style="width:12%"><?php echo $fecha_fum;?></td>
        <td style="width:12%"><?php echo $traer2['fpp_ficha'];?></td>
        <?php 
            if ($terminacion != 0) {
                echo "<td style='background-color:#e0ffd4; width:16%'><label style='font-size:14px' class='label label-success'>".date('d-m-Y',strtotime($traer2['terminacion']))."</label> <i class='fa fa-check fa-2x pull-right' style='color:green'></i></td>";
            }else{
                echo "<td style='background-color:#ffe8e8; color:#d90000; width:16%'><h5>Aún no tiene</h5></td>";
            }
        ?>
        <td style="width:16%"><?php echo $traer2['tipo_terminacion'];?></td>
        <td><?php echo $traer2['notas_ficha'];?></td>
        <td style="text-align:center"><?php echo "<a class='btn btn-info btn-sm' href='new_ficha_obs.php?id=$nuevoid_ficha' title='Editar'><i class='fa fa-pencil'></i></a>";?>
            <a class='btn btn-danger btn-sm borrar_ficha_obs' href='#' id="<?php echo $nuevoid_ficha;?>" title='Eliminar'><i class='fa fa-trash'></i></a>
        </td>
    </tr>
<?php } ?>
</tbody>
</table>
</div>
