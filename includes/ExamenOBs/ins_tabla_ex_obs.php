<?php 
include "../../conexion.php";
$id = $_POST['valor_id']; //id de la ficha
$consulta2 = mysqli_query($conexion, "select * from tabla_examen_obstetrico where id_ficha_obss='$id' order by fecha_ex_obss ") or die(mysqli_error($conexion));
?>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-condensed" id="table-ex-obstetrico">
        <thead>
            <tr>
            <!-- 1) --><th class="info">Fecha</th>
            <!-- 2) --><th class="info">EG</th>
            <!-- 3) --><th class="info">PA</th>
            <!-- 4) --><th class="info">AU</th>
            <!-- 5) --><th class="info">TA</th>
            <!-- 6) --><th class="info">LCF</th>
            <!-- 7) --><th class="info">Edema</th>
            <!-- 8) --><th class="info">Datos</th>
            <!-- 9) --><th class="info" style="width:15%">#</th>
            </tr>
        </thead>
        <tbody>
            <?php                                    
            while ($traer2 = mysqli_fetch_array($consulta2)){
               $nuevoid_ficha = $traer2['id_examen_obs'];
               $fecha1 = $traer2['fecha_ex_obss'];
               $fecha2 = date("d-m-Y",strtotime($fecha1));
            ?> 
            <tr>
                <td><?php echo $fecha2;?></td>
                <td><?php echo $traer2['eg_ex_obss'];?></td>
                <td><?php echo $traer2['pa_ex_obss'];?></td>
                <td><?php echo $traer2['au_ex_obss'];?></td>
                <td><?php echo $traer2['ta_ex_obss'];?></td>
                <td><?php echo $traer2['lcf_ex_obss'];?></td>
                <td><?php echo $traer2['edema_ex_obss'];?></td>
                <td><?php echo $traer2['datos_ex_obss'];?></td>
                <td><input value="editar" type="button" name="edit" id="<?php echo $nuevoid_ficha;?>" class="btn btn-info btn-sm edit_data"/> - <input value="eliminar" type="button" name="del" id="<?php echo $nuevoid_ficha;?>" class="btn btn-danger btn-sm delete_data"/></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>