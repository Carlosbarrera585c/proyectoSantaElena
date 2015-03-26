<?php
use mvc\routing\routingClass as routing;

$id = proveedorTableClass::ID;
$Rsocial = proveedorTableClass::RAZON_SOCIAL;
$direccion = proveedorTableClass::DIRECCION;
$telefono = proveedorTableClass::TELEFONO;
$ciudad = proveedorTableClass::CIUDAD_ID;

$pdf = new FPDF('l', 'mm', 'letter');
$pdf->AddPage();
$pdf->Cell(80);
$pdf->SetFont('Arial','B',12);
$pdf->Image(routing::getInstance()->getUrlImg('proveedores.jpg'),100,20,70);

$pdf ->Ln(50);

$pdf->Cell(150,10,'REPORTE PROVEEDOR',1,1,'C');
  $pdf->Cell(10,10,  utf8_decode("ID"),1);
  $pdf->Cell(45,10,  utf8_decode("RAZON SOCIAL"),1);
  $pdf->Cell(40,10,  utf8_decode("DIRECCION"),1);
  $pdf->Cell(35,10,  utf8_decode("TELEFONO"),1);
  $pdf->Cell(20,10,  utf8_decode("CIUDAD"),1);
  $pdf->Ln();
foreach ($objProveedor as $proveedor){
  $pdf->Cell(10,10,  utf8_decode($proveedor->$id),1);
  $pdf->Cell(45,10,  utf8_decode($proveedor->$Rsocial),1);
  $pdf->Cell(40,10,  utf8_decode($proveedor->$direccion),1);
  $pdf->Cell(35,10,  utf8_decode($proveedor->$telefono),1);
  $pdf->Cell(20,10,  utf8_decode($proveedor->$ciudad),1);
  $pdf ->Ln();
}

$pdf->Output();

