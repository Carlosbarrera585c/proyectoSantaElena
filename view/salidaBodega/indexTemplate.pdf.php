<?php
use mvc\routing\routingClass as routing;

$id = entradaBodegaTableClass::ID;
$fecha = entradaBodegaTableClass::FECHA;
$proveedorId = entradaBodegaTableClass::PROVEEDOR_ID;
$pdf = new FPDF('l', 'mm', 'letter');
$pdf->AddPage();
$pdf->Cell(80);
$pdf->SetFont('Arial','B',12);
$pdf->Image(routing::getInstance()->getUrlImg('entradaBodega.jpg'),90,8,70);

$pdf ->Ln(50);

$pdf->Cell(255,10,'REPORTE ENTRADA BODEGA',1,1,'C');
  $pdf->Cell(10,10,  utf8_decode("ID"),1);
  $pdf->Cell(50,10,  utf8_decode("FECHA"),1);
  $pdf->Cell(45,10,  utf8_decode("PROVEEDOR_ID"),1);
  $pdf->Ln();
foreach ($objEntradaBodega as $entradaBodega){
  $pdf->Cell(10,10,  utf8_decode($entradaBodega->$id),1);
  $pdf->Cell(50,10,  utf8_decode($entradaBodega->$fecha),1);
  $pdf->Cell(45,10,  utf8_decode($entradaBodega->$proveedorId),1);
  $pdf ->Ln();
}

$pdf->Output();

