<?php

use mvc\routing\routingClass as routing;

$id = pagoTrabajadoresTableClass::ID;
$fecha = pagoTrabajadoresTableClass::FECHA;
$periodoInicio = pagoTrabajadoresTableClass::PERIODO_INICIO;
$periodoFin = pagoTrabajadoresTableClass::PERIODO_FIN;
$tipoPagoId = pagoTrabajadoresTableClass::TIPO_PAGO_ID;
$empleadoId = pagoTrabajadoresTableClass::EMPLEADO_ID;
$valor = pagoTrabajadoresTableClass::VALOR;
$pdf = new FPDF('l', 'mm', 'letter');
$pdf->AddFont('anonymous', '', 'anonymous.php');
$pdf->AddFont('anonymous', 'B', 'anonymous.php');
$pdf->AddPage();
$pdf->Cell(40);
$pdf->SetFont('anonymous', 'B', 12);
$pdf->Image(routing::getInstance()->getUrlImg('sena.jpg'),10,8,33);

$pdf->Ln(32);

$pdf->Cell(190, 10, 'REPORTE PAGO DE EMPLEADOS', 1, 1, 'C');
$pdf->Cell(30, 10, utf8_decode("Fecha"), 1);
$pdf->Cell(42, 10, utf8_decode("Periodo Inicio"), 1);
$pdf->Cell(34, 10, utf8_decode("Periodo Fin"), 1);
$pdf->Cell(37, 10, utf8_decode("Tipo de Pago"), 1);
$pdf->Cell(24, 10, utf8_decode("Empleado"), 1);
$pdf->Cell(23, 10, utf8_decode("Valor"), 1);

$pdf->Ln();
foreach ($objPagoTrabajadores as $pagoTrabajadores) {
  $pdf->Cell(30, 10, utf8_decode($pagoTrabajadores->$fecha), 1);
  $pdf->Cell(42, 10, utf8_decode($pagoTrabajadores->$periodoInicio), 1);
  $pdf->Cell(34, 10, utf8_decode($pagoTrabajadores->$periodoFin), 1);
  $pdf->Cell(37, 10, utf8_decode(pagoTrabajadoresTableClass::getNameTipoPago($pagoTrabajadores->$tipoPagoId)), 1);
  $pdf->Cell(24, 10, utf8_decode(pagoTrabajadoresTableClass::getNameEmpleado($pagoTrabajadores->$empleadoId)), 1);
  $pdf->Cell(23, 10, utf8_decode($pagoTrabajadores->$valor), 1);
  $pdf->Ln();
}$pdf->Ln();

$pdf->Output();
?>