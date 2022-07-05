<?php
include "../../conexion.php";

$sql = "select * from valores_cobro_consultas INNER JOIN osociales ON valores_cobro_consultas.id_obraSocial=osociales.id order by osociales.nombre";
$tipo_consulta = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
?>
<div class="text-center" style="text-align: center">
    <h2>Listado de valores</h2>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover table-sm" id="tabla_osociales">
        <thead>
            <tr class="info">
                <th>Obra Social</th>
                <th>Código de consulta</th>
                <th>Valor</th>
                <th style="width:25%"><i class="fa fa-edit"></i> Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($traer2 = mysqli_fetch_array($tipo_consulta)) {
                $id_osocial_valor = $traer2['id_obraSocial'];
                $id_index = $traer2['id_valores'];
            ?>
                <tr>
                    <td><?php echo $traer2['nombre']; ?></td>
                    <td><?php echo $traer2['codigo_consulta']; ?></td>
                    <td>$ <?php echo $traer2['valor_consulta']; ?></td>
                    <td><input value="Editar" type="button" name="edit" id="<?php echo $id_index; ?>" class="btn btn-secondary btn-sm edit_data_valores" /> - <input value="Eliminar" type="button" name="del" id="<?= $id_index; ?>" class="btn btn-danger btn-sm delete_data_valores" /></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>