<?php
use mvc\routing\routingClass as routing;

$id = jugoTableClass::ID;
$procedencia = jugoTableClass::PROCEDENCIA; 
$brix = jugoTableClass::BRIX;
$ph = jugoTableClass::PH; 
$control_id = jugoTableClass::CONTROL_ID;

$pdf = new FPDF('l', 'mm', 'letter');
$pdf->AddPage();
$pdf->Cell(80);
$pdf->SetFont('Arial','B',12);
$pdf->Image(routing::getInstance()->getUrlImg('jugoCaña.jpg'),70,20,50);

$pdf ->Ln(50);

$pdf->Cell(130,10,'REPORTE JUGO PROCESO',1,1,'C');
  $pdf->Cell(10,10,  utf8_decode("ID"),1);
  $pdf->Cell(35,10,  utf8_decode("PROCEDENCIA"),1);
  $pdf->Cell(35,10,  utf8_decode("BRIX"),1);
  $pdf->Cell(20,10,  utf8_decode("PH"),1);
  $pdf->Cell(30,10,  utf8_decode("CONTROL_ID"),1);

  $pdf->Ln();
foreach ($objJugo as $jugo){
  $pdf->Cell(10,10,  utf8_decode($jugo->$id),1);
  $pdf->Cell(35,10,  utf8_decode($jugo->$procedencia),1);
  $pdf->Cell(35,10,  utf8_decode($jugo->$brix),1);
  $pdf->Cell(20,10,  utf8_decode($jugo->$ph),1);
  $pdf->Cell(30,10,  utf8_decode($jugo->$control_id),1);

  $pdf ->Ln();
}

$pdf->Output();

