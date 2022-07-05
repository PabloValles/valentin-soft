<?php 
include "../../conexion.php";
$id = $_POST['valor_id']; //id de la ficha
$consulta2 = mysqli_query($conexion, "select * from tabla_ecografias where id_ficha_obstetrica='$id' order by fecha_eco ") or die(mysqli_error($conexion));
?>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-condensed" id="table-ex-obstetrico">
        <thead>
            <tr>
            <!-- 1) --><th class="warning">Fecha</th>
            <!-- 2) --><th class="warning">EG</th>
            <!-- 3) --><th class="warning">DBP</th>
            <!-- 4) --><th class="warning">PA</th>
            <!-- 5) --><th class="warning">LF</th>
            <!-- 6) --><th class="warning">Plac</th>
            <!-- 7) --><th class="warning">Grado</th>
            <!-- 8) --><th class="warning">LA</th>
            <!-- 9) --><th class="warning">PEF</th>
            <!-- 10) --><th class="warning">P</th>
            <!-- 11) --><th class="warning">IPAUD</th>
            <!-- 12) --><th class="warning">IPAUI</th>
            <!-- 13) --><th class="warning" style="text-align:center;width:15%">#</th>
            </tr>
        </thead>
        <tbody>
            <?php                                    
            while ($traer2 = mysqli_fetch_array($consulta2)){
               $id_ficha_eco = $traer2['id_eco'];
               $fecha1 = $traer2['fecha_eco'];
               $fecha2 = date("d-m-Y",strtotime($fecha1));
            ?> 
            <tr>
                <td><?php echo $fecha2;?></td>
                <td><?php echo $traer2['eg_eco'];?></td>
                <td><?php echo $traer2['dbp_eco'];?></td>
                <td><?php echo $traer2['pa_eco'];?></td>
                <td><?php echo $traer2['lf_eco'];?></td>
                <td><?php echo $traer2['plac_eco'];?></td>
                <td><?php echo $traer2['grado_eco'];?></td>
                <td><?php echo $traer2['la_eco'];?></td>
                <td><?php echo $traer2['pef_eco'];?></td>
                <td><?php echo $traer2['p_eco'];?></td>
                <td><?php echo $traer2['ipaud_eco'];?></td>
                <td><?php echo $traer2['ipaui_eco'];?></td>
                <td><input value="editar" type="button" name="edit" id="<?php echo $id_ficha_eco;?>" class="btn btn-info btn-sm edit_data_tabla2"/> - <input value="eliminar" type="button" name="del" id="<?php echo $id_ficha_eco;?>" class="btn btn-danger btn-sm delete_data_tabla2"/></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>