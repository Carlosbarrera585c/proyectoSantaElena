<?php
use mvc\routing\routingClass as routing;

$id = bagazoTableClass::ID;
$humedad = bagazoTableClass::HUMEDAD;
$brix = bagazoTableClass::BRIX;
$sacarosa = bagazoTableClass::SACAROSA; 
$control_id = bagazoTableClass::CONTROL_ID;

$pdf = new FPDF('l', 'mm', 'letter');
$pdf->AddPage();
$pdf->Cell(80);
$pdf->SetFont('Arial','B',12);
$pdf->Image(routing::getInstance()->getUrlImg('logoProyecto.jpg'),0,0,280);

$pdf ->Ln(50);

$pdf->Cell(175,10,'REPORTE BAGAZO',1,1,'C');
  $pdf->Cell(10,10,  utf8_decode("ID"),1);
  $pdf->Cell(45,10,  utf8_decode("HUMEDAD"),1);
  $pdf->Cell(35,10,  utf8_decode("BRIX"),1);
  $pdf->Cell(35,10,  utf8_decode("SACAROSA"),1);
  

  $pdf->Ln();
foreach ($objBagazo as $bagazo){
  $pdf->Cell(10,10,  utf8_decode($bagazo->$id),1);
  $pdf->Cell(45,10,  utf8_decode($bagazo->$humedad),1);
  $pdf->Cell(35,10,  utf8_decode($bagazo->$brix),1);
  $pdf->Cell(35,10,  utf8_decode($bagazo->$sacarosa),1);
  

  $pdf ->Ln();
}

$pdf->Output();

