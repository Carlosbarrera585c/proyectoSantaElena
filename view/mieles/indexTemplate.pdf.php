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
$pdf->SetFont('courier', 'B', 12);
$pdf->Image(routing::getInstance()->getUrlImg('logoProyecto.jpg'), 0, 0, 280);

$pdf->Ln(50);

$pdf->Cell(250, 10, 'REPORTE DE ALMACENAMIENTO DE MIELES', 1, 1, 'C');
$pdf->Cell(50, 10, utf8_decode("Fecha"), 1);
$pdf->Cell(30, 10, utf8_decode("Turno"), 1);
$pdf->Cell(30, 10, utf8_decode("EmpleadoId"), 1);
$pdf->Cell(30, 10, utf8_decode("NumCeba"), 1);
$pdf->Cell(30, 10, utf8_decode("Caja"), 1);
$pdf->Cell(80, 10, utf8_decode("Observacion"), 1);
$pdf->Ln();
foreach ($objMieles as $mieles) {

  $pdf->Cell(50, 10, utf8_decode($mieles->$fecha), 1);
  $pdf->Cell(30, 10, utf8_decode($mieles->$turno), 1);
  $pdf->Cell(30, 10, utf8_decode($mieles->$empleadoId), 1);
  $pdf->Cell(30, 10, utf8_decode($mieles->$numCeba), 1);
  $pdf->Cell(30, 10, utf8_decode($mieles->$caja), 1);
  $pdf->Cell(80, 10, utf8_decode($mieles->$observacion), 1);
  $pdf->Ln();
}$pdf->Ln();

$pdf->Output();

