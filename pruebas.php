<?php
class Codigos
{

    public static function selectPacientes($conexion)
    {
        $pac = "select * from pacientes order by apellido_pac";
        $query = mysqli_query($conexion, $pac) or die(mysqli_error($conexion));
        while ($llena_paciente = mysqli_fetch_array($query)) {
?>
            <option value="<?php echo $llena_paciente['id_paciente']; ?>"><?php echo $llena_paciente['apellido_pac'] . " " . $llena_paciente['nombre_pac'] . " / DNI: " . $llena_paciente['dni_pac']; ?></option>
        <?php
        }
    }
    public static function selectObraSociales($conexion)
    {
        $pac = "select * from osociales order by nombre";
        $query = mysqli_query($conexion, $pac) or die(mysqli_error($conexion));
        while ($osocial = mysqli_fetch_array($query)) {
        ?>
            <option value="<?php echo $osocial['nombre']; ?>"><?php echo $osocial['nombre']; ?></option>
            <?php
        }
    }

    public static function selectLiquidacion($conexion)
    {
        $pac = "SELECT DISTINCT lugar_presentacion from osociales order by lugar_presentacion";
        $query = mysqli_query($conexion, $pac) or die(mysqli_error($conexion));
        while ($osocial = mysqli_fetch_array($query)) {
            if ($osocial['lugar_presentacion'] == "") {
            ?>
                <option value="0">SIN LIQUIDACION</option>
            <?php
            } else {
            ?>
                <option value="<?php echo $osocial['lugar_presentacion']; ?>"><?php echo $osocial['lugar_presentacion']; ?></option>
            <?php
            }

            ?>

        <?php
        }
    }
    public static function selectMeses($conexion)
    {
        ?>
        <option value="1" class="form-control">Enero</option>
        <option value="2" class="form-control">Febrero</option>
        <option value="3" class="form-control">Marzo</option>
        <option value="4" class="form-control">Abril</option>
        <option value="5" class="form-control">Mayo</option>
        <option value="6" class="form-control">Junio</option>
        <option value="7" class="form-control">Julio</option>
        <option value="8" class="form-control">Agosto</option>
        <option value="9" class="form-control">Septiembre</option>
        <option value="10" class="form-control">Octubre</option>
        <option value="11" class="form-control">Noviembre</option>
        <option value="12" class="form-control">Diciembre</option>
        <?php
    }

    public static function selectTipoConsulta($conexion)
    {
        $tipo = "select * from tipos_consultas order by nombre";
        $query = mysqli_query($conexion, $tipo) or die(mysqli_error($conexion));
        while ($tipo = mysqli_fetch_array($query)) {
        ?>
            <select name="tipo_consulta" class="form-control" id="tipo_consulta" style="height:34px;">
                <option value="<?php echo $tipo['nombre_tipo']; ?>"><?php echo $tipo['nombre_tipo']; ?></option>
            </select>
<?php
        }
    }
}
