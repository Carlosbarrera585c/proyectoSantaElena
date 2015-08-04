<?php
use mvc\routing\routingClass as routing;

$id = tipoInsumoTableClass::ID;
$descTipoInsumo = tipoInsumoTableClass::DESC_TIPO_INSUMO;

$pdf = new FPDF('l', 'mm', 'letter');
$pdf->AddPage();
$pdf->Cell(80);
$pdf->SetFont('Arial','B',12);
$pdf->Image(routing::getInstance()->getUrlImg('panela.jpg'),90,8,70);

$pdf ->Ln(50);

$pdf->Cell(255,10,'REPORTE  TIPO INSUMO',1,1,'C');
  $pdf->Cell(10,10,  utf8_decode("ID"),1);
  $pdf->Cell(245,10,  utf8_decode("DESCRIPCION TIPO INSUMO"),1);
  $pdf->Ln();
foreach ($objTipoInsumo as $tipo){
  $pdf->Cell(10,10,  utf8_decode($tipo->$id),1);
  $pdf->Cell(245,10,  utf8_decode($tipo->$descTipoInsumo),1);
 $pdf->Output();
}



