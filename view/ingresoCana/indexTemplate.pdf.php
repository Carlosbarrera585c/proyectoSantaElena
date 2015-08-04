<?php
use mvc\routing\routingClass as routing;

$id = ingresoCanaTableClass::ID;
$fecha = ingresoCanaTableClass::FECHA;
$empleado_id = ingresoCanaTableClass::EMPLEADO_ID;
$proveedor_id = ingresoCanaTableClass::PROVEEDOR_ID;
$cantidad = ingresoCanaTableClass::CANTIDAD;
$procedencia_caña = ingresoCanaTableClass::PROCEDENCIA_CAÑA;
$peso_caña = ingresoCanaTableClass::PESO_CAÑA;
$num_vagon = ingresoCanaTableClass::NUM_VAGON;
$pdf = new FPDF('l', 'mm', 'letter');
$pdf->AddPage();
$pdf->Cell(80);
$pdf->SetFont('Arial','B',12);
$pdf->Image(routing::getInstance()->getUrlImg('controlDeCalidad.jpg'),100,20,70);

$pdf ->Ln(50);

$pdf->Cell(255,10,'REPORTE INGRESO CAÑA',1,1,'C');
  $pdf->Cell(10,10,  utf8_decode("ID"),1);
  $pdf->Cell(45,10,  utf8_decode("FECHA"),1);
  $pdf->Cell(35,10,  utf8_decode("EMPLEADO_ID"),1);
  $pdf->Cell(35,10,  utf8_decode("PROVEEDOR_ID"),1);
  $pdf->Cell(20,10,  utf8_decode("CANTIDAD"),1);
  $pdf->Cell(20,10,  utf8_decode("PROCEDENCIA"),1);
  $pdf->Cell(20,10,  utf8_decode("PESO"),1);
  $pdf->Cell(20,10,  utf8_decode("NUM_VAGON"),1);
  $pdf->Ln();
foreach ($objingresoCana as $ingreso){
  $pdf->Cell(10,10,  utf8_decode($ingreso->$id),1);
  $pdf->Cell(45,10,  utf8_decode($ingreso->$fecha),1);
  $pdf->Cell(35,10,  utf8_decode($ingreso->$empleado_id),1);
  $pdf->Cell(35,10,  utf8_decode($ingreso->$proveedor_id),1);
  $pdf->Cell(20,10,  utf8_decode($ingreso->$cantidad),1);
  $pdf->Cell(20,10,  utf8_decode($ingreso->$procedencia_caña),1);
  $pdf->Cell(20,10,  utf8_decode($ingreso->$peso_caña),1);
  $pdf->Cell(20,10,  utf8_decode($ingreso->$num_vagon),1);
  $pdf ->Ln();
}

$pdf->Output();

