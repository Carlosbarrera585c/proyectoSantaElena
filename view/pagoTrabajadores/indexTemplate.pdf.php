<?php

use mvc\routing\routingClass as routing;

$id = pagoTrabajadoresTableClass::ID;
$fecha = pagoTrabajadoresTableClass::FECHA;
$periodoInicio = pagoTrabajadoresTableClass::PERIODO_INICIO;
$periodoFin = pagoTrabajadoresTableClass::PERIODO_FIN;
$tipoPagoId = pagoTrabajadoresTableClass::TIPO_PAGO_ID;
$empleadoId = pagoTrabajadoresTableClass::EMPLEADO_ID;
$pdf = new FPDF('l', 'mm', 'letter');
$pdf->AddPage();
$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Image(routing::getInstance()->getUrlImg('fotos-gatos.jpg'), 90, 8, 70);

$pdf->Ln(50);

$pdf->Cell(259, 10, 'REPORTE EMPLEADO', 1, 1, 'C');
$pdf->Cell(10, 10, utf8_decode("Id"), 1);
$pdf->Cell(20, 10, utf8_decode("Fecha"), 1);
$pdf->Cell(25, 10, utf8_decode("PeriodoInicio"), 1);
$pdf->Cell(25, 10, utf8_decode("PeriodoFin"), 1);
$pdf->Cell(37, 10, utf8_decode("TipoPago"), 1);
$pdf->Cell(20, 10, utf8_decode("EmpleadoId"), 1);
$pdf->Ln();
foreach ($objPagoTrabajadores as $pagoTrabajadores) {
  $pdf->Cell(10, 10, utf8_decode($pagoTrabajadores->$id), 1);
  $pdf->Cell(20, 10, utf8_decode($pagoTrabajadores->$fecha), 1);
  $pdf->Cell(25, 10, utf8_decode($pagoTrabajadores->$periodoInicio), 1);
  $pdf->Cell(25, 10, utf8_decode($pagoTrabajadores->$periodoFin), 1);
  $pdf->Cell(37, 10, utf8_decode($pagoTrabajadores->$tipoPagoId), 1);
  $pdf->Cell(20, 10, utf8_decode($pagoTrabajadores->$empleadoId), 1);
  $pdf->Ln();
}$pdf->Ln();

$pdf->Output();
?>