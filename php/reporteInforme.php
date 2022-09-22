<?php
include 'plantilla.php';
include_once '../conSystemDb.php';

$query             = "SELECT cd.id_consulta ,cd.nombre_completo ,cd.correo ,cd.telefono ,cd.mensaje_reporte ,cd.fecha_reporte FROM ienpg.contacto_directo cd";
$queryVerificacion = mysqli_query($con, $query);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 6, 'No.', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'CORREO', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'TELEFONO', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'NOMBRE', 1, 1, 'C', 1);
$pdf->Cell(70, 6, 'Fecha Reporte', 1, 0, 'C', 1);
$pdf->Cell(110, 6, 'Comentario', 1, 1, 'C', 1);



$pdf->SetFont('Arial', '', 10);

while ($row = $queryVerificacion->fetch_assoc()) {
    $pdf->Cell(10, 6, $row['id_consulta'], 1, 0, 'C');
    $pdf->Cell(70, 6, utf8_decode($row['correo']), 1, 0, 'C');
    $pdf->Cell(30, 6, $row['telefono'], 1, 0, 'C');
    $pdf->Cell(70, 6, utf8_decode($row['nombre_completo']), 1, 1, 'C');
    $pdf->Cell(70, 6, utf8_decode($row['fecha_reporte']), 1, 0, 'C');
    $pdf->Multicell(110, 6, utf8_decode($row['mensaje_reporte']), 1, 1, false);


}
$pdf->Output();
