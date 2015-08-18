<?php
use mvc\routing\routingClass as routing;

$id = aguasTableClass::ID;
$procedencia = aguasTableClass::PROCEDENCIA; 
$arrastre_dulce = aguasTableClass::ARRASTRE_DULCE;
$ph = aguasTableClass::PH;
$cloro_residual = aguasTableClass::CLORO_RESIDUAL;
$control_id = aguasTableClass::CONTROL_ID;

$pdf = new FPDF('l', 'mm', 'letter');
$pdf->AddPage();
$pdf->Cell(80);
$pdf->SetFont('Arial','B',12);
$pdf->Image(routing::getInstance()->getUrlImg('jugoCaña.jpg'),70,20,50);

$pdf ->Ln(50);

$pdf->Cell(200,10,'REPORTE AGUAS',1,1,'C');
  $pdf->Cell(10,10,  utf8_decode("ID"),1);
  $pdf->Cell(45,10,  utf8_decode("PROCEDENCIA"),1);
  $pdf->Cell(45,10,  utf8_decode("ARRASTRE_DULCE"),1);
  $pdf->Cell(25,10,  utf8_decode("PH"),1);
  $pdf->Cell(45,10,  utf8_decode("CLORO_RESIDUAL"),1);
  $pdf->Cell(30,10,  utf8_decode("CONTROL_ID"),1);

  $pdf->Ln();
foreach ($objAguas as $aguas){
  $pdf->Cell(10,10,  utf8_decode($aguas->$id),1);
  $pdf->Cell(45,10,  utf8_decode($aguas->$procedencia),1);
  $pdf->Cell(45,10,  utf8_decode($aguas->$arrastre_dulce),1);
  $pdf->Cell(25,10,  utf8_decode($aguas->$ph),1);
  $pdf->Cell(45,10,  utf8_decode($aguas->$cloro_residual),1);
  $pdf->Cell(30,10,  utf8_decode($aguas->$control_id),1);

  $pdf ->Ln();
}

$pdf->Output();

