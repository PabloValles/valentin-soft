<?php
include_once 'conexion.php';

$id_paciente_consulta = $_POST['id_paciente_consulta'];
$apellido_paciente = $_POST['apellido_paciente'];
$nombre_paciente = $_POST['nombre_paciente'];
$dni_paciente = $_POST['dni_paciente'];
$obsocial_pac = $_POST['obsocial_pac'];
$plan_osocial_pac = $_POST['plan_osocial_pac'];
$nro_osocial_pac = $_POST['nro_osocial_pac'];
$fechaConsulta = $_POST['fechaConsulta'];
$tipo_consulta = $_POST['tipo_consulta'];
$liq = $_POST['liq'];
$cod = $_POST['cod'];
$f_presentacion = $_POST['f_presentacion'];
$f_cobro = $_POST['f_cobro'];
$v_consulta = $_POST['v_consulta'];


$reg = "INSERT INTO consultas(idPacienteConsulta,Apellido_Paciente,Nombre_Paciente,dni_pac_consul,ObraSocial_Paciente,plan,nro,fechaConsulta,tipoConsulta,cod,MotivoConsulta,liq,fecha_presentacion,fecha_cobro,valor_consulta,pagado) VALUES ('$id_paciente_consulta','$apellido_paciente','$nombre_paciente','$dni_paciente','$obsocial_pac','$plan_osocial_pac','$nro_osocial_pac','$fechaConsulta','$tipo_consulta','$cod','Consulta','$liq','$f_presentacion','$f_cobro','$v_consulta',0)";
$query = mysqli_query($conexion, $reg) or die(mysqli_error($conexion));

if ($query) {
    $verify_tipo = "select nombre_tipo from tipo_consultas where nombre_tipo='$tipo_consulta'";
    $do_verify = mysqli_query($conexion, $verify_tipo) or die(mysqli_error($conexion));
    if (mysqli_num_rows($do_verify) < 1) {
        $add_tipo = "INSERT into tipo_consultas(nombre_tipo,codigo_tipo) VALUES ('$tipo_consulta', '$cod')";
        $registrar_tipo = mysqli_query($conexion, $add_tipo) or die(mysqli_error($conexion));
    }

?>
    <br>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Bien hecho!</strong> Consulta agregada correctamente...
    </div>

<?php
} else {
    die("error");
}
