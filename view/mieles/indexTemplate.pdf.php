<?php

use mvc\routing\routingClass as routing;

$id = mielesTableClass::ID;
$fecha = mielesTableClass::FECHA;
$turno = mielesTableClass::TURNO;
$empleadoId = mielesTableClass::EMPLEADO_ID;
$numCeba = mielesTableClass::NUM_CEBA;
$caja = mielesTableClass::CAJA;
$observacion = mielesTableClass::OBSERVACION;

$pdf = new FPDF('l', 'mm', 'letter');
$pdf->AddPage();
$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Image(routing::getInstance()->getUrlImg('fotos-gatos.jpg'), 90, 8, 70);

$pdf->Ln(50);

$pdf->Cell(259, 10, 'REPORTE DE ALMACENAMIENTO DE MIELES', 1, 1, 'C');
$pdf->Cell(10, 10, utf8_decode("Id"), 1);
$pdf->Cell(20, 10, utf8_decode("Fecha"), 1);
$pdf->Cell(25, 10, utf8_decode("Turno"), 1);
$pdf->Cell(25, 10, utf8_decode("EmpleadoId"), 1);
$pdf->Cell(37, 10, utf8_decode("NumCeba"), 1);
$pdf->Cell(20, 10, utf8_decode("Caja"), 1);
$pdf->Cell(22, 10, utf8_decode("Observacion"), 1);
$pdf->Ln();
foreach ($objMieles as $mieles) {
  $pdf->Cell(10, 10, utf8_decode($mieles->$id), 1);
  $pdf->Cell(20, 10, utf8_decode($mieles->$fecha), 1);
  $pdf->Cell(25, 10, utf8_decode($mieles->$turno), 1);
  $pdf->Cell(25, 10, utf8_decode($mieles->$empleadoId), 1);
  $pdf->Cell(37, 10, utf8_decode($mieles->$numCeba), 1);
  $pdf->Cell(20, 10, utf8_decode($mieles->$caja), 1);
  $pdf->Cell(22, 10, utf8_decode($mieles->$observacion), 1);
  $pdf->Ln();
}$pdf->Ln();

$pdf->Output();

