<?php include("../conexion.php");
$id = $_POST['pac'];
$doctor = $_POST['another_doc'];
$orden = $_POST['orden_tipo'];

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

if ($orden != "") {
    # code...
    switch ($orden) {
        case 'consulta':
            $diag = "Diagnostico:";
            $tem = "Item: Consulta 420101";
            break;
        case 'pap':
            $diag = "Solicito:";
            $tem = "Item:";
            $tem2 = "220101 COLPOSCOPIA";
            $tem3 = "150106 CITOLOGIA EXFOLIATIVA";
            $tem4 = "220102 COLPOCITOLOGIA";
            break;
        case 'internacion':
            $diag = "Solicito:";
            $tem = "Item:";
            $tem2 = "ORDEN DE INTERNACION EN";
            break;
        case 'recetario':
            $tem = "Rp./";
            break;
        case 'blanco':
            $tem = " ";
            break;
        case 'COD_110284':
            $diag = "Diagnostico: ";
            $tem = "MODULO DE COLOCACION DE SISTEMA INTRAUTERINO DE ";
            $tem2 = "LIBERACION DE LEVONORGESTREL 52MG (SIU-DIU LNG52)";
            $tem3 = "COD 11.02.84";
            break;
        case 'COD_110285':
            $diag = "Diagnostico: ";
            $tem = "MODULO DE RECOLOCACION DE SISTEMA INTRAUTERINO DE ";
            $tem2 = "LIBERACION DE LEVONORGESTREL 52MG (SIU-DIU LNG52)";
            $tem3 = "COD 11.02.85";
            break;
        case 'COD_110286':
            $diag = "Diagnostico: ";
            $tem = "MODULO DE COLOCACION DE IMPLANTE ";
            $tem2 = "SUBDERMICO DE ETONOGESTREL 68MG";
            $tem3 = "COD 11.02.86";
            break;
        case 'COD_110287':
            $diag = "Diagnostico: ";
            $tem = "MODULO DE EXTRACCION DE IMPLANTE ";
            $tem2 = "SUBDERMICO DE ETONOGESTREL 68MG";
            $tem3 = "COD 11.02.87";
            break;
        default:
            $diag = "Diagnostico:";
            $tem = "Item: Consulta 420101";
            break;
    }
}


require('../pdf/fpdf.php');
if ($doctor != "") {
    class PDF extends FPDF
    {
        function Header()
        {
            $doctor = $_POST['another_doc'];

            $this->SetFont('Arial','B',9);

            if ($doctor == 1) {
                $this->Cell(0,2,'DRA. MARISA CRESPO',0,0,'C');
                $this->ln(4);
                $this->Cell(0,2,'MAT. 6959 ',0,0,'C');
                $this->ln(4);
	            $this->Cell(0,2,'GINECOLOGIA-OBSTETRICIA',0,0,'C');
	            $this->Ln(4);
            }elseif ($doctor == 2) {
                $this->Cell(0,2,'DR. JAIR FERNANDEZ CARAM',0,0,'C');
                $this->ln(4);
                $this->Cell(0,2,'MAT. 10576 ',0,0,'C');
                $this->ln(4);
	            $this->Cell(0,2,'GINECOLOGIA-OBSTETRICIA',0,0,'C');
	            $this->Ln(4);
            }elseif ($doctor == 3) {
                $this->Cell(0,2,'DR. JOSE ROSSI',0,0,'C');
                $this->ln(4);
                $this->Cell(0,2,'MAT. 3928 ',0,0,'C');
                $this->ln(4);
	            $this->Cell(0,2,'GINECOLOGIA-OBSTETRICIA',0,0,'C');
	            $this->Ln(4);
            }elseif ($doctor == 4) {
                $this->Cell(0,2,'DRA. FABIANA VALLES',0,0,'C');
                $this->ln(4);
                $this->Cell(0,2,'MAT. 7997 ',0,0,'C');
                $this->ln(4);
	            $this->Cell(0,2,'GINECOLOGIA-OBSTETRICIA',0,0,'C');
	            $this->Ln(4);
            }elseif ($doctor == 5) {
                $this->Cell(0,2,'DRA. GABRIELA CASTELLER',0,0,'C');
                $this->ln(4);
                $this->Cell(0,2,'MAT. 6374 ',0,0,'C');
                $this->ln(4);
	            $this->Cell(0,2,'GINECOLOGIA-OBSTETRICIA',0,0,'C');
	            $this->Ln(4);
            }elseif ($doctor == 6) {
                $this->Cell(0,2,'DR. NICOLAS YACOMO',0,0,'C');
                $this->ln(4);
                $this->Cell(0,2,'MAT. 12309 ',0,0,'C');
                $this->ln(4);
	            $this->Cell(0,2,'GINECOLOGIA-OBSTETRICIA',0,0,'C');
	            $this->Ln(4);
            }elseif ($doctor == 7) {
                $this->Cell(0,2,'DRA. MARIA INES MARIANETTI',0,0,'C');
                $this->ln(4);
                $this->Cell(0,2,'MAT. 6722 ',0,0,'C');
                $this->ln(4);
	            $this->Cell(0,2,'MEDICO PEDIATRA',0,0,'C');
	            $this->Ln(4);
            }elseif ($doctor == 8) {
                $this->Cell(0,2,'DRA. PAULA GONZALEZ',0,0,'C');
                $this->ln(4);
                $this->Cell(0,2,'MAT. 10459 ',0,0,'C');
                $this->ln(4);
	            $this->Cell(0,2,'CIRUGIA GENERAL',0,0,'C');
	            $this->Ln(4);
            }elseif ($doctor == 9) {
                $this->Cell(0,2,'DRA. ALICIA CALDERON',0,0,'C');
                $this->ln(4);
                $this->Cell(0,2,'MAT. 6404 ',0,0,'C');
                $this->ln(4);
	            $this->Cell(0,2,'GINECOLOGIA-OBSTETRICIA',0,0,'C');
	            $this->Ln(4);
            }
            
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
}

if ($orden == "consulta") {
    $pdf_orden = new PDF('P','mm',array(150,208));
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
    $pdf_orden->ln(10);
    $pdf_orden->cell(10,10,$dni);
    $pdf_orden->ln(10);
    $pdf_orden->cell(10,10,$edad);
    $pdf_orden->ln(10);
    $pdf_orden->cell(10,10,$dir);
    $pdf_orden->ln(20);
    $pdf_orden->SetFont('Times','B',13);
    $pdf_orden->cell(0,5,$diag);
    $pdf_orden->ln(8);
    $pdf_orden->SetFont('Times','',12);
    $pdf_orden->SetLeftMargin(20);
    $pdf_orden->MultiCell(0,5,$tem);
    $pdf_orden->ln(12);
    $pdf_orden->ln(6);
    $pdf_orden->ln(13);
    //$pdf_orden->SetLeftMargin(0);
    $y = $pdf_orden->GetY();
    $pdf_orden->MultiCell(115,4,'Afiliado',0,'L'); 
    $pdf_orden->SetXY(110,$y);
    $pdf_orden->Cell(20,4,'Prestador',0,0,'R');
    $pdf_orden->Ln(24);
    $pdf_orden->Cell(106,4,'Fecha',0,0,'R');
    $pdf_orden->ln(3);
    $pdf_orden->SetLeftMargin(20);
    $pdf_orden->Output('Orden_consulta.pdf','D');
    //$pdf_orden->Output('Orden_consulta.pdf','I'); ABRE EL PDF
}elseif ($orden == "pap") {
    $pdf_orden = new PDF('P','mm',array(150,208));
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
    $pdf_orden->ln(10);
    $pdf_orden->cell(10,10,$dni);
    $pdf_orden->ln(10);
    $pdf_orden->cell(10,10,$edad);
    $pdf_orden->ln(10);
    $pdf_orden->cell(10,10,$dir);
    $pdf_orden->ln(20);
    $pdf_orden->SetFont('Times','B',13);
    $pdf_orden->cell(0,5,$diag);
    $pdf_orden->ln(8);
    $pdf_orden->SetFont('Times','',12);
    $pdf_orden->SetLeftMargin(20);
    $pdf_orden->SetTextColor(170,0,185);
    $pdf_orden->MultiCell(0,5,$tem);
    $pdf_orden->ln(3);
    $pdf_orden->SetTextColor(0,0,0);
    $pdf_orden->MultiCell(0,5,$tem2);
    $pdf_orden->ln(3);
    $pdf_orden->MultiCell(0,5,$tem3);
    $pdf_orden->ln(3);
    $pdf_orden->MultiCell(0,5,$tem4);
    $pdf_orden->ln(3);
    $pdf_orden->SetLeftMargin(10);
    $pdf_orden->Output('Orden_pap.pdf','D');
    //$pdf_orden->Output('Orden_consulta.pdf','I'); ABRE EL PDF
}elseif ($orden == "internacion") {
    $pdf_orden = new PDF('P','mm',array(150,208));
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
    $pdf_orden->ln(10);
    $pdf_orden->ln(20);
    $pdf_orden->SetFont('Times','B',13);
    $pdf_orden->cell(0,5,$diag);
    $pdf_orden->ln(8);
    $pdf_orden->SetFont('Times','',12);
    $pdf_orden->SetLeftMargin(20);
    $pdf_orden->SetTextColor(170,0,185);
    //$pdf_orden->MultiCell(0,5,$tem);
    //$pdf_orden->ln(3);
    $pdf_orden->SetTextColor(0,0,0);
    $pdf_orden->MultiCell(0,5,$tem2);
    $pdf_orden->ln(3);
    $pdf_orden->SetLeftMargin(10);
    $pdf_orden->Output('Orden_internacion.pdf','D');  
}elseif ($orden == "recetario") {
    $pdf_orden = new PDF('P','mm',array(150,208));
    $pdf_orden->AddPage();
    $pdf_orden->SetFont('Times','',12);
    $pdf_orden->cell(0,0,"",1);
    $pdf_orden->ln(10);
    $pdf_orden->SetFont('Times','',12);
    $pdf_orden->MultiCell(0,5,$tem);
    $pdf_orden->ln(3);
    $pdf_orden->SetLeftMargin(10);
    $pdf_orden->Output('Recetario.pdf','D');
    //$pdf_orden->Output('Orden_consulta.pdf','I'); ABRE EL PDF
}elseif ($orden == "blanco") {
    $pdf_orden = new PDF('P','mm',array(150,208));
    $pdf_orden->AddPage();
    $pdf_orden->SetFont('Times','',12);
    $pdf_orden->cell(0,0,"",1);
    $pdf_orden->ln(10);
    $pdf_orden->SetFont('Times','',12);
    $pdf_orden->MultiCell(0,5,$tem);
    $pdf_orden->ln(3);
    $pdf_orden->SetLeftMargin(10);
    $pdf_orden->Output('blanco.pdf','D');
    //$pdf_orden->Output('Orden_consulta.pdf','I'); ABRE EL PDF
}elseif ($orden == "COD_110284") {
    $pdf_orden = new PDF('P','mm',array(150,208));
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
    $pdf_orden->ln(10);
    $pdf_orden->cell(10,10,$edad);
    $pdf_orden->ln(10);
    $pdf_orden->cell(10,10,$dni);
    $pdf_orden->ln(10);
    $pdf_orden->cell(10,10,$dir);
    $pdf_orden->ln(8);
    $pdf_orden->SetFont('Times','',12);
    $pdf_orden->SetLeftMargin(10);
    $pdf_orden->ln(8);
    $pdf_orden->MultiCell(0,5,$tem);
    $pdf_orden->ln(3);
    $pdf_orden->SetTextColor(0,0,0);
    $pdf_orden->MultiCell(0,5,$tem2);
    $pdf_orden->ln(3);
    $pdf_orden->SetFont('Times','B',13);
    $pdf_orden->MultiCell(0,5,$tem3);
    $pdf_orden->ln(3);
    $pdf_orden->ln(12);
    $pdf_orden->SetFont('Times','B',13);
    $pdf_orden->cell(0,5,$diag);
    $pdf_orden->SetLeftMargin(10);
    $pdf_orden->Output('colocacion_sist_intrauterino.pdf','D');
    //$pdf_orden->Output('Orden_consulta.pdf','I'); ABRE EL PDF
}elseif ($orden == "COD_110285") {
    $pdf_orden = new PDF('P','mm',array(150,208));
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
    $pdf_orden->ln(10);
    $pdf_orden->cell(10,10,$edad);
    $pdf_orden->ln(10);
    $pdf_orden->cell(10,10,$dni);
    $pdf_orden->ln(10);
    $pdf_orden->cell(10,10,$dir);
    $pdf_orden->ln(8);
    $pdf_orden->SetFont('Times','',12);
    $pdf_orden->SetLeftMargin(10);
    $pdf_orden->ln(8);
    $pdf_orden->MultiCell(0,5,$tem);
    $pdf_orden->ln(3);
    $pdf_orden->SetTextColor(0,0,0);
    $pdf_orden->MultiCell(0,5,$tem2);
    $pdf_orden->ln(3);
    $pdf_orden->SetFont('Times','B',13);
    $pdf_orden->MultiCell(0,5,$tem3);
    $pdf_orden->ln(3);
    $pdf_orden->ln(12);
    $pdf_orden->SetFont('Times','B',13);
    $pdf_orden->cell(0,5,$diag);
    $pdf_orden->SetLeftMargin(10);
    $pdf_orden->Output('recolocacion_sist_intrauterino.pdf','D');
    //$pdf_orden->Output('Orden_consulta.pdf','I'); ABRE EL PDF
}elseif ($orden == "COD_110286") {
    $pdf_orden = new PDF('P','mm',array(150,208));
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
    $pdf_orden->ln(10);
    $pdf_orden->cell(10,10,$edad);
    $pdf_orden->ln(10);
    $pdf_orden->cell(10,10,$dni);
    $pdf_orden->ln(10);
    $pdf_orden->cell(10,10,$dir);
    $pdf_orden->ln(8);
    $pdf_orden->SetFont('Times','',12);
    $pdf_orden->SetLeftMargin(10);
    $pdf_orden->ln(8);
    $pdf_orden->MultiCell(0,5,$tem);
    $pdf_orden->ln(3);
    $pdf_orden->SetTextColor(0,0,0);
    $pdf_orden->MultiCell(0,5,$tem2);
    $pdf_orden->ln(3);
    $pdf_orden->SetFont('Times','B',13);
    $pdf_orden->MultiCell(0,5,$tem3);
    $pdf_orden->ln(3);
    $pdf_orden->ln(12);
    $pdf_orden->SetFont('Times','B',13);
    $pdf_orden->cell(0,5,$diag);
    $pdf_orden->SetLeftMargin(10);
    $pdf_orden->Output('colocacion_implante.pdf','D');
    //$pdf_orden->Output('Orden_consulta.pdf','I'); ABRE EL PDF
}elseif ($orden == "COD_110287") {
    $pdf_orden = new PDF('P','mm',array(150,208));
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
    $pdf_orden->ln(10);
    $pdf_orden->cell(10,10,$edad);
    $pdf_orden->ln(10);
    $pdf_orden->cell(10,10,$dni);
    $pdf_orden->ln(10);
    $pdf_orden->cell(10,10,$dir);
    $pdf_orden->ln(8);
    $pdf_orden->SetFont('Times','',12);
    $pdf_orden->SetLeftMargin(10);
    $pdf_orden->ln(8);
    $pdf_orden->MultiCell(0,5,$tem);
    $pdf_orden->ln(3);
    $pdf_orden->SetTextColor(0,0,0);
    $pdf_orden->MultiCell(0,5,$tem2);
    $pdf_orden->ln(3);
    $pdf_orden->SetFont('Times','B',13);
    $pdf_orden->MultiCell(0,5,$tem3);
    $pdf_orden->ln(3);
    $pdf_orden->ln(12);
    $pdf_orden->SetFont('Times','B',13);
    $pdf_orden->cell(0,5,$diag);
    $pdf_orden->SetLeftMargin(10);
    $pdf_orden->Output('extraccion_implante.pdf','D');
    //$pdf_orden->Output('Orden_consulta.pdf','I'); ABRE EL PDF
}


