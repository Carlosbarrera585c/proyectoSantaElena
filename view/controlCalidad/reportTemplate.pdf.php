<?php
use mvc\routing\routingClass as routing;

$id = controlCalidadTableClass::ID;
$fecha = controlCalidadTableClass::FECHA;
$turno = controlCalidadTableClass::TURNO;
$brix = controlCalidadTableClass::BRIX;
$ph = controlCalidadTableClass::PH;
$ar = controlCalidadTableClass::AR;
$sacarosa = controlCalidadTableClass::SACAROSA;
$pureza = controlCalidadTableClass::PUREZA;
$empleado_id = controlCalidadTableClass::EMPLEADO_ID;
$proveedor_id = controlCalidadTableClass::PROVEEDOR_ID;


$pdf = new FPDF('l', 'mm', 'letter');
$pdf->AddPage();
$pdf->Cell(80);
$pdf->SetFont('Arial','B',12);
$pdf->Image(routing::getInstance()->getUrlImg('controlDeCalidad.jpg'),90,8,70);

$pdf ->Ln(50);

$pdf->Cell(255,10,'CONTROL CALIDAD',1,1,'C');




  $pdf->Cell(10,10,  utf8_decode("ID"),1);
  $pdf->Cell(42,10,  utf8_decode("FECHA"),1);
  $pdf->Cell(20,10,  utf8_decode("TURNO"),1);
  $pdf->Cell(17,10,  utf8_decode("BRIX"),1);
  $pdf->Cell(17,10,  utf8_decode("PH"),1);
  $pdf->Cell(17,10,  utf8_decode("AR"),1);
  $pdf->Cell(35,10,  utf8_decode("SACAROSA"),1);
  $pdf->Cell(30,10,  utf8_decode("PUREZA"),1);
  $pdf->Cell(32,10,  utf8_decode("EMPLEADO_ID"),1);
  $pdf->Cell(35,10,  utf8_decode("PROVEEDOR_ID"),1);
  $pdf->Ln();
foreach ($objControlCalidad as $control){
  $pdf->Cell(10,10,  utf8_decode($control->$id),1);
  $pdf->Cell(42,10,  utf8_decode($control->$fecha),1);
  $pdf->Cell(20,10,  utf8_decode($control->$turno),1);
  $pdf->Cell(17,10,  utf8_decode($control->$brix),1);
  $pdf->Cell(17,10,  utf8_decode($control->$ph),1);
  $pdf->Cell(17,10,  utf8_decode($control->$ar),1);
  $pdf->Cell(35,10,  utf8_decode($control->$sacarosa),1);
  $pdf->Cell(30,10,  utf8_decode($control->$pureza),1);
  $pdf->Cell(32,10,  utf8_decode($control->$empleado_id),1);
  $pdf->Cell(35,10,  utf8_decode($control->$proveedor_id),1);
  
  
  
  $pdf ->Ln();
  
  
}
$pdf->Output();

?>
