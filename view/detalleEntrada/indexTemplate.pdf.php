<?php
use mvc\routing\routingClass as routing;

$id = detalleEntradaTableClass::ID;
$fechaFB = detalleEntradaTableClass::FECHA_FABRICACION;
$fechaVC = detalleEntradaTableClass::FECHA_VENCIMIENTO;
$pdf = new FPDF('l', 'mm', 'letter');
$pdf->AddPage();
$pdf->Cell(80);
$pdf->SetFont('Arial','B',12);
$pdf->Image(routing::getInstance()->getUrlImg('entradaBodega.jpg'),90,8,70);

$pdf ->Ln(50);

$pdf->Cell(255,10,'REPORTE DETALLE BODEGA BODEGA',1,1,'C');
  $pdf->Cell(10,10,  utf8_decode("ID"),1);
  $pdf->Cell(50,10,  utf8_decode("FECHA FABRICACION"),1);
  $pdf->Cell(50,10,  utf8_decode("FECHA VENCIMIENTO "),1);
  $pdf->Ln();
 foreach ($objDetalleEntrada as $entradaBodega){
  $pdf->Cell(10,10,  utf8_decode($entradaBodega->$id),1);
  $pdf->Cell(50,10,  utf8_decode($entradaBodega->$fechaFB),1);
  $pdf->Cell(50,10,  utf8_decode($entradaBodega->$fechaVC),1);
  $pdf ->Ln();
}



$pdf->Output();

