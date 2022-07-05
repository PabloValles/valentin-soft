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
$dni = "DNI: ".$llena_paciente['dni_pac'];
$edad = "Edad: ".$llena_paciente['edad_pac'];
$dir = utf8_decode("Dirección: ".$llena_paciente['direc_pac']);
$diag = "Solicito:";
$tem = "Item: ";
$it_1 = "o	Hemograma";
$it_2 = "o	Recuento de plaquetas";
$it_3 = utf8_decode("o	Fibrinógeno");
$it_4 = "o	Glucemia";
$it_5 = "o	Uremia";
$it_6 = "o	Uricemia";
$it_7 = "o	Creatininemia";
$it_8 = "o	T.P.";
$it_9 = "o	TTPK";
$it_10 = "o	GOT";
$it_11 = "o	GPT";
$it_12 = "o	FAL";
$it_13 = "o	LDH";
$it_14 = "o	BILIRRUBINA (D-I-T)";
$it_15 = "o	Orina Completa";
$it_16 = "o	Colesterol total";
$it_17 = "o	LDL";
$it_18 = "o	HDL";
$it_19 = "o	Trigliceridos";
$it_20 = "o	TSH";
$it_21 = "o	T4 LIBRE";

require('../pdf/fpdf.php');
class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial','B',9);
        $this->Cell(0,2,'DRA. FABIANA VALLES',0,0,'C');
        $this->ln(4);
        $this->Cell(0,2,'MAT. 7997 ',0,0,'C');
        $this->ln(4);
        $this->Cell(0,2,'GINECOLOGIA-OBSTETRICIA',0,0,'C');
        $this->Ln(4);
    }
    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-23);
        // Arial italic 8
        $this->SetFont('Arial','I',10);
        $this->cell(0,0,"",1);
        $this->ln(1);
        #arreglo acentos y problemas con signos especiales
        $dir = utf8_decode('CDTE. FOSSA Nº 98 ESQ. SERÚ (B° BOMBAL) CIUDAD.');
        $this->Cell(0,12,$dir,0,0,'C'); 
        $this->ln(4);
        $this->Cell(0,12,'TELEF. 0261-4246059 Y TELEF MOVIL 154-605712',0,0,'C');
    }
}
$pdf_orden = new PDF('P','mm',array(150,208));
$pdf_orden->AddPage();
$pdf_orden->SetFont('Times','',11);
$pdf_orden->cell(0,0,"",1);
$pdf_orden->ln(3);
$pdf_orden->cell(10,10,$paciente);
$pdf_orden->ln(5);
$pdf_orden->cell(10,10,$paciente_obs);
$pdf_orden->ln(5);
$pdf_orden->cell(10,10,$paciente_nro_obs);
$pdf_orden->ln(5);
$pdf_orden->cell(10,10,$paciente_plan_obs);
$pdf_orden->ln(8);
$pdf_orden->SetFont('Times','B',12);
$pdf_orden->cell(0,5,$diag);
$pdf_orden->ln(6);
$pdf_orden->SetFont('Times','',11);
$pdf_orden->SetLeftMargin(20);
$pdf_orden->MultiCell(0,5,$it_1,0,1);
$pdf_orden->MultiCell(0,5,$it_2,0,1);
$pdf_orden->MultiCell(0,5,$it_3,0,1);
$pdf_orden->MultiCell(0,5,$it_4,0,1);
$pdf_orden->MultiCell(0,5,$it_5,0,1);
$pdf_orden->MultiCell(0,5,$it_6,0,1);
$pdf_orden->MultiCell(0,5,$it_7,0,1);
$pdf_orden->MultiCell(0,5,$it_8,0,1);
$pdf_orden->MultiCell(0,5,$it_9,0,1);
$pdf_orden->MultiCell(0,5,$it_10,0,1);
$pdf_orden->MultiCell(0,5,$it_11,0,1);
$pdf_orden->MultiCell(0,5,$it_12,0,1);
$pdf_orden->MultiCell(0,5,$it_13,0,1);
$pdf_orden->MultiCell(0,5,$it_14,0,1);
$pdf_orden->MultiCell(0,5,$it_15,0,1);
$pdf_orden->MultiCell(0,5,$it_16,0,1);
$pdf_orden->MultiCell(0,5,$it_17,0,1);
$pdf_orden->MultiCell(0,5,$it_18,0,1);
$pdf_orden->MultiCell(0,5,$it_19,0,1);
$pdf_orden->MultiCell(0,5,$it_20,0,1);
$pdf_orden->MultiCell(0,5,$it_21,0,1);
$pdf_orden->ln(3);
$pdf_orden->SetLeftMargin(10);
$pdf_orden->Cell(0,5,"Diag:",0,3);


$pdf_orden->Output('Orden_Analitica_2.pdf','D');
//$pdf_orden->Output('Orden_consulta.pdf','I'); ABRE EL PDF

