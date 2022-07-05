<?php include("../conexion.php");
$id = $_REQUEST['id_orden'];

//consulta
$sql = "select * from pacientes where id_paciente='$id'";
$query = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
$llena_paciente=mysqli_fetch_array($query);

$paciente ="Paciente: ".$llena_paciente['nombre_pac']." ".$llena_paciente['apellido_pac'];
$paciente_obs = "Obra Social: ".$llena_paciente['obsocial_pac'];
$paciente_nro_obs = "Numero de obra Social: ".$llena_paciente['nro_obsocial_pac'];
$paciente_plan_obs = "Plan: ".$llena_paciente['plan_obsocial_pac'];
$diag = "Solicito:";
$tem = "Fugiat qui ad lorem proident, nescius multosss laboris, tempor malis varias ita 
multos non commodo iis elit admodum, si legam proident in cillum iituendarum ita admodum, ab mandaremus 
qui offendit. Si sunt tempor consectetur. Fore sed ut velit senserit, quorum 
incurreret comprehenderit. ";

require('pdf/fpdf.php');
include "config.php";
$pdf_orden->AddPage();
$pdf_orden->SetFont('Times','',12);
$pdf_orden->cell(0,0,"",1);
$pdf_orden->ln(10);
$pdf_orden->cell(10,10,$paciente);
$pdf_orden->ln(10);
$pdf_orden->cell(10,10,$paciente_obs);
$pdf_orden->ln(10);
$pdf_orden->cell(10,10,$paciente_nro_obs);
$pdf_orden->ln(10);
$pdf_orden->cell(10,10,$paciente_plan_obs);
$pdf_orden->ln(20);
$pdf_orden->SetFont('Times','B',13);
$pdf_orden->cell(0,5,$diag);
$pdf_orden->ln(8);
$pdf_orden->SetFont('Times','',12);
$pdf_orden->SetLeftMargin(20);
$pdf_orden->MultiCell(0,5,$tem);
$pdf_orden->ln(3);
$pdf_orden->SetLeftMargin(10);
$pdf_orden->Output('Orden.pdf','I');

