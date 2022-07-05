<?php 
include "../../conexion.php";
$id = $_POST['valor_id']; //id de la ficha
$consulta2 = mysqli_query($conexion, "select * from tabla_laboratorio where id_ficha_obstetrica='$id' order by fecha_lab ") or die(mysqli_error($conexion));
?>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-condensed" id="table-ex-obstetrico">
        <thead>
            <tr>
                <th class="success" style="text-align:center">ID</th>
                <th class="success" style="text-align:center">Fecha</th>
                <th class="success" style="text-align:center">HTO</th>
                <th class="success" style="text-align:center">HB</th>
                <th class="success" style="text-align:center">Plaq</th>
                <th class="success" style="text-align:center">GB</th>
                <th class="success" style="text-align:center">TSH</th>
                <th class="success" style="text-align:center">T4L</th>
                <th class="success" style="text-align:center">TPO</th>
                <th class="success" style="text-align:center">TP</th>
                <th class="success" style="text-align:center">TTPK</th>
                <th class="success" style="text-align:center">Glu</th>
                <th class="success" style="text-align:center">Ur</th>
                <th class="success" style="text-align:center">Creat</th>
                <th class="success" style="text-align:center">Uric</th>
                <th class="success" style="text-align:center">LDH</th>
                <th class="success" style="text-align:center">GOT</th>
                <th class="success" style="text-align:center">GPT</th>
                <th class="success" style="text-align:center">BD</th>
                <th class="success" style="text-align:center">BI</th>
                <th class="success" style="text-align:center">BT</th>
                <th class="success" style="text-align:center">Colesterol</th>
                <th class="success" style="text-align:center">HDL</th>
                <th class="success" style="text-align:center">LDL</th>
                <th class="success" style="text-align:center">TG</th>
                <th class="success" style="text-align:center">#</th>
                
            </tr>
        </thead>
        <tbody>
            <?php                                    
            while ($traer2 = mysqli_fetch_array($consulta2)){
               $id_ficha_lab = $traer2['id_lab'];
               $fecha1 = $traer2['fecha_lab'];
               $fecha2 = date("d-m-Y",strtotime($fecha1));
            ?> 
            <tr>
                <td><?php echo $id_ficha_lab;?></td>
                <td><?php echo $fecha2;?></td>
                <td><?php echo $traer2['hto_lab'];?></td>
                <td><?php echo $traer2['hb_lab'];?></td>
                <td><?php echo $traer2['plaq_lab'];?></td>
                <td><?php echo $traer2['gb_lab'];?></td>
                <td><?php echo $traer2['tsh_lab'];?></td>
                <td><?php echo $traer2['t4l_lab'];?></td>
                <td><?php echo $traer2['tpo_lab'];?></td>
                <td><?php echo $traer2['tp_lab'];?></td>
                <td><?php echo $traer2['ttpk_lab'];?></td>
                <td><?php echo $traer2['glu_lab'];?></td>
                <td><?php echo $traer2['ur_lab'];?></td>
                <td><?php echo $traer2['creat_lab'];?></td>
                <td><?php echo $traer2['uric_lab'];?></td>
                <td><?php echo $traer2['ldh_lab'];?></td>
                <td><?php echo $traer2['got_lab'];?></td>
                <td><?php echo $traer2['gpt_lab'];?></td>
                <td><?php echo $traer2['bd_lab'];?></td>
                <td><?php echo $traer2['bi_lab'];?></td>
                <td><?php echo $traer2['bt_lab'];?></td>
                <td><?php echo $traer2['colesterol_lab'];?></td>
                <td><?php echo $traer2['hdl_lab'];?></td>
                <td><?php echo $traer2['ldl_lab'];?></td>
                <td><?php echo $traer2['tg_lab'];?></td>
                <td><input value="editar" type="button" name="edit" id="<?php echo $id_ficha_lab;?>" class="btn btn-info btn-sm edit_data_tabla3"/> - <input value="eliminar" type="button" name="del" id="<?php echo $id_ficha_lab;?>" class="btn btn-danger btn-sm delete_data_tabla3"/></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>