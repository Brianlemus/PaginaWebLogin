<?php
include 'plantillaContactoDirecto.php';
include_once '../conSystemDb.php';

$query             = "SELECT 
                            p.fecha_reporte
                            ,p.nombre_completo
                            ,p.correo
                            ,p.telefono
                            ,p.mensaje_reporte
                    FROM ienpg.contacto_directo AS p";
$queryVerificacion = mysqli_query($con, $query);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(20, 6, 'FECHA.', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'NOMBRE', 1, 0, 'C', 1);
$pdf->Cell(25, 6, 'TELEFONO', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'CORREO', 1, 1, 'C', 1);
$pdf->Cell(185, 6, 'COMENTARIO', 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 10);

while ($row = $queryVerificacion->fetch_assoc()) {
    $pdf->Cell(20, 6, $row['fecha_reporte'], 1, 0, 'C');
    $pdf->Cell(70, 6, utf8_decode($row['nombre_completo']), 1, 0, 'C');
    $pdf->Cell(25, 6, $row['telefono'], 1, 0, 'C');
    $pdf->Cell(70, 6, utf8_decode($row['correo']), 1, 1, 'C');
    $pdf->MultiCell(185, 6, utf8_decode($row['mensaje_reporte']), 1, 1, false);

}
$pdf->Output();

?>