<?php
use mvc\routing\routingClass as routing;

$id = panelaTableClass::ID;
$proveedor_id = panelaTableClass::PROVEEDOR_ID; 
$sedimento = panelaTableClass::SEDIMENTO; 
$control_id = panelaTableClass::CONTROL_ID;

$pdf = new FPDF('l', 'mm', 'letter');
$pdf->AddPage();
$pdf->Cell(80);
$pdf->SetFont('Arial','B',12);
$pdf->Image(routing::getInstance()->getUrlImg('panela.jpg'),70,20,50);

$pdf ->Ln(50);

$pdf->Cell(130,10,'REPORTE PANELA',1,1,'C');
  $pdf->Cell(10,10,  utf8_decode("ID"),1);
  $pdf->Cell(35,10,  utf8_decode("PROCEDENCIA"),1);
  $pdf->Cell(35,10,  utf8_decode("SEDIMENTO"),1);
  $pdf->Cell(30,10,  utf8_decode("CONTROL_ID"),1);

  $pdf->Ln();
foreach ($objPanela as $panela){
  $pdf->Cell(10,10,  utf8_decode($panela->$id),1);
  $pdf->Cell(35,10,  utf8_decode($panela->$proveedor_id),1);
  $pdf->Cell(35,10,  utf8_decode($panela->$sedimento),1);
  $pdf->Cell(30,10,  utf8_decode($panela->$control_id),1);

  $pdf ->Ln();
}

$pdf->Output();

