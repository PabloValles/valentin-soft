<?php

include("../../conexion.php");
$obra_social=$_POST['obra_social'];
//$busca1=$_POST['year'];

//si obra social no esta que busque todas
$query = "select nombre_pac, apellido_pac, obsocial_pac, fum_ficha, fpp_ficha, terminacion,htal_ficha, tipo_terminacion from pacientes as p INNER JOIN ficha_obstetrica as f ON p.id_paciente=f.id_paciente_ficha where terminacion!=0 and obsocial_pac='$obra_social' order by terminacion";
$resultado = mysqli_query($conexion,$query);

$total=mysqli_query($conexion,"select obsocial_pac, terminacion from pacientes as p INNER JOIN ficha_obstetrica as f ON p.id_paciente=f.id_paciente_ficha where terminacion!=0 and obsocial_pac='$obra_social' order by terminacion") or die(mysqli_error($conexion));
$total_pacientes=mysqli_num_rows($total);

?>

<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">
	<br>
	<div class="card-box">
		<div class="table-responsive">
			<h3>Partos terminados</h3>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Nombre</th>
                        <th>Apellido</th>
                        <th>Obra Social</th>
                        <th>Tipo</th>
                        <th>FUM</th>
                        <th>FPP</th>
                        <th>Terminacion</th>
                        <th>Htal</th>
					</tr>
				</thead>
				<tbody>
				<?php                                    
				while ($recorre = mysqli_fetch_array($resultado)){
					$fum = date('d-m-Y', strtotime($recorre['fum_ficha']));
					$terminacion = date('d-m-Y', strtotime($recorre['terminacion']));
					
				?>
					<tr>
						<td><i class="fa fa-arrow-right" style="color: lime;"></i></td>
						<td><?php echo $recorre['nombre_pac'];?></td>
						<td><?php echo $recorre['apellido_pac'];?></td>
						<td><?php echo $recorre['obsocial_pac'];?></td>
						<td><?php echo $recorre['tipo_terminacion'];?></td>
						<td><?php echo $fum;?></td>
						<td><?php echo $recorre['fpp_ficha'];?></td>
						<td style="color:white; background-color: #0cc20c; font-size: 15px; text-align: center;"><?php echo $terminacion;?></td>
						<td><?php echo $recorre['htal_ficha'];?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<br>
<div id="PorMeses" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Filtrado fechas de terminación por Meses</h4>
            </div>
            <div class="modal-body" >
            	<div class="table-responsive">
					<h3>Partos terminados</h3>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Mes</th>
		                        <th>Terminacion</th>
							</tr>
						</thead>
						<tbody>
						<?php                                    
						while ($recorre2 = mysqli_fetch_array($total)){
							$terminacion = date('d-m-Y', strtotime($recorre2['terminacion']));
							$terminacion_varchar = date('F', strtotime($recorre2['terminacion']));
							$terminacion_year = date('Y', strtotime($recorre2['terminacion']));
							switch ($terminacion_varchar) {
								case 'January':
									$terminacion_varchar="Enero";
									break;
								case 'February':
									$terminacion_varchar="Febrero";
									break;
								case 'March':
									$terminacion_varchar="Marzo";
									break;
								case 'April':
									$terminacion_varchar="Abril";
									break;
								case 'May':
									$terminacion_varchar="Mayo";
									break;
								case 'June':
									$terminacion_varchar="Junio";
									break;
								case 'July':
									$terminacion_varchar="Julio";
									break;
								case 'August':
									$terminacion_varchar="Agosto";
									break;
								case 'September':
									$terminacion_varchar="Septiembre";
									break;
								case 'October':
									$terminacion_varchar="Octubre";
									break;
								case 'November':
									$terminacion_varchar="Noviembre";
									break;
								case 'December':
									$terminacion_varchar="Diciembre";
									break;
								default:
									$terminacion_varchar="Error";
									break; //swich meses a español
							}
						?>
							<tr>
								<td><i class="fa fa-arrow-right" style="color: lime;"></i></td>
								<td><?php echo $terminacion_varchar." - ".$terminacion_year;?></td>
								<td style="color:white; background-color: #0cc20c; font-size: 15px; text-align: center;"><?php echo $terminacion;?></td>
							</tr>

						<?php } ?>
						</tbody>
					</table>
				</div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="col-md-4 col-xs-12 col-sm-4 col-lg-4">
	<div class="card-box" style="border-left: 5px solid #54ea1d; border-radius: 0px;">
		<?php echo "Obra social: <hr><h1>".$obra_social."</h1>";?>
	</div>
</div>
<div class="col-md-4 col-xs-12 col-sm-4 col-lg-4">
	<div class="card-box" style="border-left: 5px solid #54ea1d; border-radius: 0px;">
		<?php echo "Partos terminados: <hr><h1>$total_pacientes</h1>";?>
	</div>
</div>
<div class="col-md-4 col-xs-12 col-sm-4 col-lg-4">
	<div class="card-box" style="border-left: 5px solid #54ea1d; border-radius: 0px;">
		Ver informe Mensual <hr>
		<button class="btn btn-success btn-lg waves-effect waves-light" data-toggle="modal" data-target="#PorMeses"><i class="fa fa-eye"></i> VER</button>
	</div>
</div>


<?php


mysqli_free_result($resultado);
mysqli_close($conexion);