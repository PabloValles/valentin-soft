
<style>
.form-control.disabled:hover{
    background-color: #eceeef !important;
    border-color:#ccc !important;
}
.select {
  cursor: pointer; 
  height: 42px;
  font-size: 19px
}
.select:focus{
    background-color: rgba(27, 185, 154, 0.05);
}
</style>
<?php
include("../conexion.php");


$id = $_POST['pac'];

//consulta
$sql = "select * from pacientes, antecedentes_personales, antecedentes_ginecoobs where pacientes.id_paciente = '$id' and antecedentes_personales.id_paciente='$id' and antecedentes_ginecoobs.id_paciente='$id'";
$fichas = "select * from ficha_obstetrica where id_paciente_ficha = '$id' and terminacion != 0 and (estado_pago = 2 or estado_pago = 3) order by terminacion";

$query = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
$query2 = mysqli_query($conexion,$fichas) or die(mysqli_error($conexion));

$llena_paciente=mysqli_fetch_array($query);

?>
<form action="confirmacion_pago.php" method="POST" role="form" id="frm_pago">
    <input type="hidden" name="opcion" id="opcion" value="nuevo">
    <input type="hidden" name="tag" id="tag" value="pago">
    <input type="hidden" name="id_paciente" id="id_paciente" value="<?php echo $id;?>">
	<legend>Seleccione la <span style="color: #1bb99a">CIRUGÍA</span> que quiere pagar: </legend>
    <div class="msj"></div>
    <hr>
    <div class="row" style="text-align: center;">
        <div class="col-md-12" >
            <br>
            <h4><?php echo $llena_paciente['apellido_pac']." ".$llena_paciente['nombre_pac'];?> <i class="fa fa-user pull-right"></i></h4>
            <br>
            <select name="idFicha" id="idFicha" class="form-control select" required="required">
                <?php 
                while ($llena_ficha = mysqli_fetch_array($query2)) {
                    $terminacion = date('d-m-Y', strtotime($llena_ficha['terminacion']));
                    if ($llena_ficha['estado_pago'] == 2) {
                        $estado_pago = "Pendiente";
                    }else{
                        $estado_pago = "Pago parcial";
                    }
                    ?>
                    <option id="option" value="<?php echo $llena_ficha['id_ficha'];?>">
                        <?php echo $llena_ficha['id_ficha']. " - Terminación: ".$terminacion."  &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; ESTADO: ".$estado_pago;?>
                    </option>
                    <?php
                }
                ?>
            </select>
            <br><br>
        </div>
    </div>
    <hr>
	<button type="submit" name="guardar" id="guarda" class="btn btn-success waves-effect">Realizar pago</button>
	<a href="#" class="btn btn-secondary">Ver pagos</a>
</form>
