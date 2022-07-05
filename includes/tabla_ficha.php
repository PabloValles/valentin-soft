<div class="row">
    <div class="col-md-12">
        <form action="" method="POST" class="form-inline" role="form">
            <div class="form-group">
                <input type="hidden" value="<?php echo $id;?>" class="form-control" id="">
            </div>
            <button type="submit" class="btn btn-success waves-effect waves-light">
               <span class="btn-label"><i class="fa fa-plus"></i></span>Agregar ficha</button>
        </form>
        <hr>
        <table class="table table-hover table-bordered">
        <thead>
            <legend>Fichas Obstétricas</legend>
            <tr class="active">
               <th>ID</th>
                <th>FUM</th>
                <th>FPP</th>
                <th>Notas</th>
                <th>Paciente</th>
                <th style="text-align:center;width:220px">#</th>
            </tr>
        </thead>
        <?php
        $consulta_ficha = mysqli_query($conexion,"select * from ficha_obstetrica where id_paciente_ficha='$id' order by fpp_ficha") or die (mysqli_error($conexion));
        while ($llena=mysqli_fetch_array($consulta_ficha)){
        $id_Ficha = $llena['id_ficha'];
        ?>
        <tbody>
            <td><?php echo $llena['id_ficha'];?></td>
            <td><?php echo $llena['fum_ficha'];?></td>
            <td><?php echo $llena['fpp_ficha'];?></td>
            <td><?php echo $llena['notas_ficha'];?></td>
            <td><?php echo $llena['id_paciente_ficha'];?></td>
            <td style="text-align:center;widht:20px"><?php echo "<a class='btn btn-default btn-sm' href='ficha_obstetrica_editar.php?idFicha=$id_Ficha' title='Editar'><i class='glyphicon glyphicon-pencil'></i> Editar</a>";?>&nbsp;<?php echo "<a class='btn btn-danger btn-sm' href='php/delete_ficha_obstetrica.php?idFicha=$id_Ficha' title='Borrar'><i class='glyphicon glyphicon-trash'></i> Eliminar</a>";?></td>
        </tbody>
        <?php } ?>
    </table>
    </div>
</div><br>
<!--table-->
    