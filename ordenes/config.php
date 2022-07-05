<?php

if(gethostname() == "Fabiana-PC"){ // Cambiar por nombre de Fabiana
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
            $this->SetY(-30);
            // Arial italic 8
            $this->SetFont('Arial','I',8);

            $this->cell(0,0,"",1);
            $this->ln(2);
            #arreglo acentos y problemas con signos especiales
            $dir = utf8_decode('CDTE. FOSSA Nro 98 ESQ.SERU (B° BOMBAL) CIUDAD.');
            $this->Cell(0,10,$dir,0,0,'C'); 
            $this->ln(4);
            $this->Cell(0,10,'Y SAN MARTIN 1440 UNIDAD 2 GC.',0,0,'C');
            $this->ln(4);
            $this->Cell(0,10,'TELEF.0261-4246059 Y TELEF MOVIL 154-605712',0,0,'C');
        }
    }
    $pdf_orden = new PDF('P','mm',array(110,220));
    
}else{
    
    # Configuramos para pc Marcela
    class PDF extends FPDF
    {
        function Header()
        {
            $this->SetFont('Arial','B',9);
            $this->Cell(0,10,'DRA. FABIANA VALLES',0,0,'C');
            $this->ln(4);
            $this->Cell(0,10,'MAT. 1997 ',0,0,'C');
            $this->ln(4);
            $this->Cell(0,10,'GINECOLOGIA-OBSTETRICIA',0,0,'C');
            $this->Ln(10);
        }
        // Pie de página
        function Footer()
        {
            // Posición: a 1,5 cm del final
            $this->SetY(-25);
            // Arial italic 8
            $this->SetFont('Arial','I',8);

            $this->cell(0,0,"",1);
            $this->ln(2);
            #arreglo acentos y problemas con signos especiales
            $dir = utf8_decode('CDTE. FOSSA Nro 98 ESQ.SERU (B° BOMBAL) CIUDAD.');
            $this->Cell(0,10,$dir,0,0,'C'); 
            $this->ln(4);
            $this->Cell(0,10,'Y SAN MARTIN 1440 UNIDAD 2 GC.',0,0,'C');
            $this->ln(4);
            $this->Cell(0,10,'TELEF.0261-4246059 Y TELEF MOVIL 154-605712',0,0,'C');
        }
    }
    $pdf_orden = new PDF('P','mm',array(120,222));
}

?>

