<?php
use mvc\routing\routingClass as routing;

$id = controlCalidadTableClass::ID;
$fecha = controlCalidadTableClass::FECHA;
$variedad = controlCalidadTableClass::VARIEDAD;
$edad = controlCalidadTableClass::EDAD;
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
$pdf->SetFont('courier','B',12);
$pdf->Image(routing::getInstance()->getUrlImg('logoProyecto.jpg'),0,0,280);
$pdf ->Ln(50);

$pdf->Cell(245,10,'REPORTE CONTROL CALIDAD',1,1,'C');
  $pdf->Cell(45,10,  utf8_decode("FECHA"),1);
  $pdf->Cell(24,10,  utf8_decode("VARIEDAD"),1);
  $pdf->Cell(15,10,  utf8_decode("EDAD"),1);
  $pdf->Cell(15,10,  utf8_decode("BRIX"),1);
  $pdf->Cell(15,10,  utf8_decode("PH"),1);
  $pdf->Cell(15,10,  utf8_decode("AR"),1);
  $pdf->Cell(26,10,  utf8_decode("SACAROSA"),1);
  $pdf->Cell(20,10,  utf8_decode("PUREZA"),1);
  $pdf->Cell(35,10,  utf8_decode("EMPLEADO"),1);
  $pdf->Cell(35,10,  utf8_decode("PROVEEDOR"),1);
  $pdf->Ln();
foreach ($objControlCalidad as $control){
  $pdf->Cell(45,10,  utf8_decode($control->$fecha),1);
  $pdf->Cell(24,10,  utf8_decode($control->$variedad),1);
  $pdf->Cell(15,10,  utf8_decode($control->$edad),1);
  $pdf->Cell(15,10,  utf8_decode($control->$brix),1);
  $pdf->Cell(15,10,  utf8_decode($control->$ph),1);
  $pdf->Cell(15,10,  utf8_decode($control->$ar),1);
  $pdf->Cell(26,10,  utf8_decode($control->$sacarosa),1);
  $pdf->Cell(20,10,  utf8_decode($control->$pureza),1);
  $pdf->Cell(35,10,  utf8_decode(controlCalidadTableClass::getNameEmpleado($control->$empleado_id)),1);
  $pdf->Cell(35,10,  utf8_decode(controlCalidadTableClass::getNameProveedor($control->$proveedor_id)),1);
  $pdf ->Ln();
}

$pdf->Output();

