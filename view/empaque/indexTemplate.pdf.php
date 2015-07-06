<?php
use mvc\routing\routingClass as routing;

$id = empleadoTableClass::ID;
$nomEmpleado = empleadoTableClass::NOM_EMPLEADO;
$apellEmpleado = empleadoTableClass::APELL_EMPLEADO;
$telefono = empleadoTableClass::TELEFONO;
$direccion = empleadoTableClass::DIRECCION;
$tipoId = empleadoTableClass::TIPO_ID_ID;
$credencialId = empleadoTableClass::CREDENCIAL_ID;
$correo = empleadoTableClass::CORREO;
$numeroIdent = empleadoTableClass::NUMERO_IDENTIFICACION;
$pdf = new FPDF('l', 'mm', 'letter');
$pdf->AddPage();
$pdf->Cell(80);
$pdf->SetFont('Arial','B',12);
$pdf->Image(routing::getInstance()->getUrlImg('fotos-gatos.jpg'),90,8,70);

$pdf ->Ln(50);

$pdf->Cell(259,10,'REPORTE EMPLEADO',1,1,'C');
  $pdf->Cell(10,10,  utf8_decode("Id"),1);
  $pdf->Cell(20,10,  utf8_decode("Nombre"),1);
  $pdf->Cell(25,10,  utf8_decode("Apellido"),1);
  $pdf->Cell(25,10,  utf8_decode("telefono"),1);
  $pdf->Cell(37,10,  utf8_decode("direccion"),1);
  $pdf->Cell(20,10,  utf8_decode("tipo Id"),1);
  $pdf->Cell(22,10,  utf8_decode("credencial"),1);
  $pdf->Cell(65,10,  utf8_decode("correo"),1);
  $pdf->Cell(35,10,  utf8_decode("identificacion"),1);
  $pdf->Ln();
foreach ($objEmpleado as $empleado){
  $pdf->Cell(10,10,  utf8_decode($empleado->$id),1);
  $pdf->Cell(20,10,  utf8_decode($empleado->$nomEmpleado),1);
  $pdf->Cell(25,10,  utf8_decode($empleado->$apellEmpleado),1);
  $pdf->Cell(25,10,  utf8_decode($empleado->$telefono),1);
  $pdf->Cell(37,10,  utf8_decode($empleado->$direccion),1);
  $pdf->Cell(20,10,  utf8_decode($empleado->$tipoId),1);
  $pdf->Cell(22,10,  utf8_decode($empleado->$credencialId),1);
  $pdf->Cell(65,10,  utf8_decode($empleado->$correo),1);
  $pdf->Cell(35,10,  utf8_decode($empleado->$numeroIdent),1);
  $pdf ->Ln();
}$pdf ->Ln();

$pdf->Output();

