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
$pdf->SetFont('courier','B',12);
$pdf->Image(routing::getInstance()->getUrlImg('logoProyecto.jpg'),0,0,280);

$pdf ->Ln(50);

$pdf->Cell(132,10,'REPORTE JUGO PROCESO',1,1,'C');

  $pdf->Cell(35,10,  utf8_decode("PROCEDENCIA"),1);
  $pdf->Cell(35,10,  utf8_decode("BRIX"),1);
  $pdf->Cell(20,10,  utf8_decode("PH"),1);
  $pdf->Cell(42,10,  utf8_decode("CONTROL CALIDAD"),1);

  $pdf->Ln();
foreach ($objJugo as $jugo){

  $pdf->Cell(35,10,  utf8_decode(jugoTableClass::getNameProveedor($objJugo[0]->$procedencia)),1);
  $pdf->Cell(35,10,  utf8_decode($jugo->$brix),1);
  $pdf->Cell(20,10,  utf8_decode($jugo->$ph),1);
  $pdf->Cell(42,10,  utf8_decode(jugoTableClass::getNameControl($objJugo[0]->$control_id)),1);

  
  $pdf ->Ln();
}



$pdf->Output();

