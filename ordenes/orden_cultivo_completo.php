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
$it_1 = utf8_decode("o	BACTERIOLÓGICO DEL FLUJO VAGINAL");
$it_2 = "o	HISOPADO DE FONDO DE SACO Y CERVIX ";
$it_3 = "o	EN FRESCO ";
$it_4 = utf8_decode("o	GRAM -NICOLLE ");
$it_5 = utf8_decode("o	CULTIVO ");
$it_6 = "o	pH ";
$it_7 = "o	HISOPADO ENDOCERVICAL POR ";
$it_8 = "o	Chlamydia trachomatis";
$it_9 = "o	Mycoplasma hominis ";
$it_10 = "o	Ureaplasma urealiticum ";

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
$pdf_orden->SetFont('Times','',10);
$pdf_orden->cell(0,0,"",1);
$pdf_orden->ln(3);
$pdf_orden->cell(10,10,$paciente);
$pdf_orden->ln(5);
$pdf_orden->cell(10,10,$paciente_obs);
$pdf_orden->ln(5);
$pdf_orden->cell(10,10,$paciente_nro_obs);
$pdf_orden->ln(5);
$pdf_orden->cell(10,10,$paciente_plan_obs);
$pdf_orden->ln(5);
$pdf_orden->cell(10,10,$dni);
$pdf_orden->ln(5);
$pdf_orden->cell(10,10,$edad);
$pdf_orden->ln(8);
$pdf_orden->ln(8);
$pdf_orden->SetFont('Times','B',12);
$pdf_orden->cell(0,5,$diag);
$pdf_orden->ln(6);
$pdf_orden->SetFont('Times','',10);
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
$pdf_orden->ln(3);
$pdf_orden->ln(3);
$pdf_orden->ln(3);
$pdf_orden->ln(3);
$pdf_orden->SetLeftMargin(10);
$pdf_orden->SetFont('Times','B',12);
$pdf_orden->Cell(0,5,"Diag:",0,3);


$pdf_orden->Output('Orden de flujo completo.pdf','D');
//$pdf_orden->Output('Orden_consulta.pdf','I'); ABRE EL PDF

