<?php
include "../../conexion.php";
$id = $_POST['valor_id'];
$consulta2 = mysqli_query($conexion, "select * from consultas where idPacienteConsulta='$id' order by fechaConsulta ") or die(mysqli_error($conexion));
?>
<br>
<div class="table-responsive">
	<table class="table table-hover table-sm table-bordered" style="box-shadow: 13px 3px 10px #eee">
		<thead>
			<tr>
				<th colspan="5" style="text-align: center; background-color: gray; color: white">Listado de consultas</th>
			</tr>
			<tr>
				<th>Fecha Cons</th>
				<th>F. Presentación</th>
				<th>Tipo de consulta</th>
				<th>Valor de la consulta</th>
				<th style="text-align: center;" width="150px">Eliminar consulta</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($traer = mysqli_fetch_array($consulta2)) {
			?>
				<tr>
					<td><?php echo date('d-m-Y', strtotime($traer['fechaConsulta'])); ?></td>
					<td><?php echo date('d-m-Y', strtotime($traer['fecha_presentacion'])); ?></td>
					<td><?php echo $traer['tipoConsulta']; ?></td>
					<td>$<?php echo $traer['valor_consulta']; ?></td>
					<td style="text-align: center;"><button type="button" class="btn btn-danger btn-sm delete_mini_consulta" id="<?php echo $traer['idConsulta']; ?>"> <i class="fa fa-trash"></i> Eliminar</button></td>

				</tr>

			<?php } ?>
		</tbody>
	</table>
</div>