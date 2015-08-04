<?php
use mvc\routing\routingClass as routing;

$id = proveedorTableClass::ID;
$Rsocial = proveedorTableClass::RAZON_SOCIAL;
$direccion = proveedorTableClass::DIRECCION;
$telefono = proveedorTableClass::TELEFONO;



$pdf = new FPDF('l', 'mm', 'letter');
$pdf->AddPage();
$pdf->Cell(80);
$pdf->SetFont('Arial','B',12);
$pdf->Image(routing::getInstance()->getUrlImg('proveedores.jpg'),90,8,70);

$pdf ->Ln(50);

$pdf->Cell(255,10,'PROVEEDOR',1,1,'C');




  $pdf->Cell(10,10,  utf8_decode("ID"),1);
  $pdf->Cell(82,10,  utf8_decode("RAZON_SOCIAL"),1);
  $pdf->Cell(82,10,  utf8_decode("DIRECCION"),1);
  $pdf->Cell(81,10,  utf8_decode("TELEFONO"),1);
  
 
  $pdf->Ln();
foreach ($objProveedor as $proveedor){
  $pdf->Cell(10,10,  utf8_decode($proveedor->$id),1);
  $pdf->Cell(82,10,  utf8_decode($proveedor->$Rsocial),1);
  $pdf->Cell(82,10,  utf8_decode($proveedor->$direccion),1);
  $pdf->Cell(81,10,  utf8_decode($proveedor->$telefono),1);
  
  $pdf ->Ln();
  
  
}
$pdf->Output();

?>
