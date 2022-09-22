<?php
include 'plantilla.php';
include_once '../conSystemDb.php';

$query     = "SELECT correo, nombre1, telefono FROM ienpg.usuarios;";
$queryVerificacion = mysqli_query($con, $query);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(70, 6, 'CORREO', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'TELEFONO', 1, 0, 'C', 1);
$pdf->Cell(95, 6, 'NOMBRE', 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 10);

while ($row = $queryVerificacion->fetch_assoc()) {
    $pdf->Cell(70, 6, utf8_decode($row['correo']), 1, 0, 'C');
    $pdf->Cell(30, 6, $row['telefono'], 1, 0, 'C');
    $pdf->Cell(95, 6, utf8_decode($row['nombre1']), 1, 1, 'C');
}
$pdf->Output();

?>