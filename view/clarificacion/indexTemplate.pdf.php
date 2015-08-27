<?php

use mvc\routing\routingClass as routing;

$id = clarificacionTableClass::ID;
$fecha = clarificacionTableClass::FECHA;
$numBache = clarificacionTableClass::NUM_BACHE;
$turno = clarificacionTableClass::TURNO;
$empleadoId = clarificacionTableClass::EMPLEADO_ID;
$proveedorId = clarificacionTableClass::PROVEEDOR_ID;
$brix = clarificacionTableClass::BRIX;
$phDiluido = clarificacionTableClass::PH_DILUIDO;
$phClarificado = clarificacionTableClass::PH_CLARIFICADO;
$calDosificada = clarificacionTableClass::CAL_DOSIFICADA;
$floculante = clarificacionTableClass::FLOCULANTE;
$pdf = new FPDF('l', 'mm', 'letter');
$pdf->AddPage();
$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Image(routing::getInstance()->getUrlImg('logoProyecto.jpg'), 0, 0, 280);

$pdf->Ln(50);

$pdf->Cell(260, 10, 'REPORTE DE CLARIFICACION', 1, 1, 'C');
$pdf->Cell(25, 10, utf8_decode("Fecha"), 1);
$pdf->Cell(32, 10, utf8_decode("Num de Bache"), 1);
$pdf->Cell(17, 10, utf8_decode("Turno"), 1);
$pdf->Cell(27, 10, utf8_decode("Empleado"), 1);
$pdf->Cell(23, 10, utf8_decode("Proveedor"), 1);
$pdf->Cell(18, 10, utf8_decode("Brix"), 1);
$pdf->Cell(25, 10, utf8_decode("Ph Diluido"), 1);
$pdf->Cell(32, 10, utf8_decode("Ph Clarificado"), 1);
$pdf->Cell(34, 10, utf8_decode("Cal Dosificada"), 1);
$pdf->Cell(27, 10, utf8_decode("Floculante"), 1);
$pdf->Ln();
foreach ($objClarificacion as $clarificacion) {
  $pdf->Cell(25, 10, utf8_decode($clarificacion->$fecha), 1);
  $pdf->Cell(32, 10, utf8_decode($clarificacion->$numBache), 1);
  $pdf->Cell(17, 10, utf8_decode($clarificacion->$turno), 1);
  $pdf->Cell(27, 10, utf8_decode(clarificacionTableClass::getNameEmpleado($clarificacion->$empleadoId)), 1);
  $pdf->Cell(23, 10, utf8_decode(clarificacionTableClass::getNameProveedor($clarificacion->$proveedorId)), 1);
  $pdf->Cell(18, 10, utf8_decode($clarificacion->$brix . ' %'), 1);
  $pdf->Cell(25, 10, utf8_decode($clarificacion->$phDiluido . ' %'), 1);
  $pdf->Cell(32, 10, utf8_decode($clarificacion->$phClarificado . ' %'), 1);
  $pdf->Cell(34, 10, utf8_decode($clarificacion->$calDosificada), 1);
  $pdf->Cell(27, 10, utf8_decode($clarificacion->$floculante), 1);
  $pdf->Ln();
}$pdf->Ln();

$pdf->Output();
