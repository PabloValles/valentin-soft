<?php
include "../../conexion.php";
$consulta2 = mysqli_query($conexion, "select * from osociales order by nombre") or die(mysqli_error($conexion));
?>
<div class="table-responsive">
    <table class="table table-condensed table-bordered table-hover table-sm" id="tabla_osociales">
        <thead>
            <tr class="info">
                <th>id</th>
                <th>Nomre</th>
                <th>Lugar p/presentar</th>
                <th>Dias p/cobrar</th>
                <th>Estado</th>
                <th style="width:25%"><i class="fa fa-edit"></i> Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($traer2 = mysqli_fetch_array($consulta2)) {
                $id_obraSocial = $traer2['id'];
                $estado = $traer2['estado'];
            ?>
                <tr>
                    <td><?php echo $id_obraSocial; ?></td>
                    <td><?php echo $traer2['nombre']; ?></td>
                    <td><?php echo $traer2['lugar_presentacion']; ?></td>
                    <td><?php echo $traer2['dias_cobro']; ?></td>
                    <td><?php
                        if ($estado != 1) {
                            echo "<span class='label label-danger'>Inactiva</span>";
                        } else {
                            echo "<span class='label label-success'>Activa</span>";
                        }
                        ?></td>
                    <td><input value="Editar" type="button" name="edit" id="<?php echo $id_obraSocial; ?>" class="btn btn-secondary btn-sm edit_data" /> - <input value="Eliminar" type="button" name="del" id="<?php echo $id_obraSocial; ?>" class="btn btn-danger btn-sm delete_data" /></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>