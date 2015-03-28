<?php
use mvc\routing\routingClass as routing;

$id = credencialTableClass::ID;
$nomCredencial = credencialTableClass::NOMBRE;
$create = credencialTableClass::CREATED_AT;
$update = credencialTableClass::UPDATED_AT;
$pdf = new FPDF('l', 'mm', 'letter');
$pdf->AddPage();
$pdf->Cell(80);
$pdf->SetFont('Arial','B',12);
$pdf->Image(routing::getInstance()->getUrlImg('fotos-gatos.jpg'),90,8,70);

$pdf ->Ln(50);

$pdf->Cell(169,10,'REPORTE EMPLEADO',1,1,'C');
  $pdf->Cell(10,10,  utf8_decode("Id"),1);
  $pdf->Cell(45,10,  utf8_decode("Nombre Credencial"),1);
  $pdf->Cell(57,10,  utf8_decode("Creado"),1);
  $pdf->Cell(57,10,  utf8_decode("Actualizado"),1);
  $pdf->Ln();
foreach ($objCredencial as $credencial){
  $pdf->Cell(10,10,  utf8_decode($credencial->$id),1);
  $pdf->Cell(45,10,  utf8_decode($credencial->$nomCredencial),1);
  $pdf->Cell(57,10,  utf8_decode($credencial->$create),1);
  $pdf->Cell(57,10,  utf8_decode($credencial->$update),1);
  $pdf ->Ln();
}$pdf ->Ln();

$pdf->Output();

