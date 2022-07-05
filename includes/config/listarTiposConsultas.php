<?php
include "../../conexion.php";
$tipo_consulta = mysqli_query($conexion, "select * from tipo_consultas order by nombre_tipo") or die(mysqli_error($conexion));
?>
<div class="table-responsive">
    <table class="table table-condensed table-bordered table-hover table-sm" id="tabla_osociales">
        <thead>
            <tr class="info">
                <th>#</th>
                <th>Nomre</th>
                <th>Código</th>
                <th style="width:25%"><i class="fa fa-edit"></i> Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($traer2 = mysqli_fetch_array($tipo_consulta)) {
                $id_tipo = $traer2['id_tipo'];
            ?>
                <tr>
                    <td><?php echo $traer2['id_tipo']; ?></td>
                    <td><?php echo $traer2['nombre_tipo']; ?></td>
                    <td><?php echo $traer2['codigo_tipo']; ?></td>
                    <td><input value="Editar" type="button" name="edit" id="<?php echo $id_tipo; ?>" class="btn btn-secondary btn-sm edit_data_consultas" /> - <input value="Eliminar" type="button" name="del" id="<?php echo $id_tipo; ?>" class="btn btn-danger btn-sm delete_data_consultas" /></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>