<?php
use mvc\routing\routingClass as routing;

$id = insumoTableClass::ID;
$descInsumo = insumoTableClass::DESC_INSUMO;
$precio = insumoTableClass::PRECIO;
$tipoInsumoId = insumoTableClass::TIPO_INSUMO_ID;

$pdf = new FPDF('l', 'mm', 'letter');
$pdf->AddPage();
$pdf->Cell(80);
$pdf->SetFont('Arial','B',12);
$pdf->Image(routing::getInstance()->getUrlImg('panela.jpg'),90,8,70);

$pdf ->Ln(50);

$pdf->Cell(255,10,'REPORTE INSUMO',1,1,'C');
  $pdf->Cell(10,10,  utf8_decode("ID"),1);
  $pdf->Cell(82,10,  utf8_decode("DESCRIPCION DE INSUMO"),1);
  $pdf->Cell(82,10,  utf8_decode("PRECIO"),1);
  $pdf->Cell(81,10,  utf8_decode("TIPO INSUMO"),1);
  $pdf->Ln();
foreach ($objInsu as $insu){
  $pdf->Cell(10,10,  utf8_decode($insu->$id),1);
  $pdf->Cell(82,10,  utf8_decode($insu->$descInsumo),1);
  $pdf->Cell(82,10,  utf8_decode($insu->$precio),1);
  $pdf->Cell(81,10,  utf8_decode($insu->$tipoInsumoId),1);
 $pdf->Output();
}



