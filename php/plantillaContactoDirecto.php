<?php
require '../pdf/fpdf.php';

class PDF extends FPDF
{
    public function Header()
    {
        $this->Image('../img/pickerFondo.jpg', 5, 5, 30);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(30);
        $this->Cell(120, 10, 'Reporte Lista de Usuarios', 0, 0, 'C');
        $this->Ln(20);
    }

    public function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
