<?php
use mvc\routing\routingClass as routing;

$id = ingresoCanaTableClass::ID;
$fecha = ingresoCanaTableClass::FECHA;
$empleado_id = ingresoCanaTableClass::EMPLEADO_ID;
$proveedor_id = ingresoCanaTableClass::PROVEEDOR_ID;
$cantidad = ingresoCanaTableClass::CANTIDAD;
$peso_caña = ingresoCanaTableClass::PESO_CAÑA;
$num_vagon = ingresoCanaTableClass::NUM_VAGON;



$pdf = new FPDF('l', 'mm', 'letter');
$pdf->AddPage();
$pdf->Cell(80);
$pdf->SetFont('courier','B',12);
$pdf->Image(routing::getInstance()->getUrlImg('logoProyecto.jpg'),0,0,280);

$pdf ->Ln(50);

$pdf->Cell (255,10,'INGRESO CANA',1,1,'C');
  $pdf->Cell(45,10,  utf8_decode("FECHA"),1);
  $pdf->Cell(45,10,  utf8_decode("EMPLEADO"),1);
  $pdf->Cell(45,10,  utf8_decode("PROVEEDOR"),1);
  $pdf->Cell(40,10,  utf8_decode("CANTIDAD"),1);
  $pdf->Cell(40,10,  utf8_decode("PESO CAÑA"),1);
  $pdf->Cell(40,10,  utf8_decode("NUM VAGON"),1);
  
 
  $pdf->Ln();
foreach ($objingresoCana as $ingreso){
  $pdf->Cell(45,10,  utf8_decode($ingreso->$fecha),1);
  $pdf->Cell(45,10,  utf8_decode(ingresoCanaTableClass::getNameEmpleado($ingreso->$empleado_id)),1);
  $pdf->Cell(45,10,  utf8_decode(ingresoCanaTableClass::getNameProveedor($ingreso->$proveedor_id)),1);
  $pdf->Cell(40,10,  utf8_decode($ingreso->$cantidad),1);
  $pdf->Cell(40,10,  utf8_decode($ingreso->$peso_caña),1);
  $pdf->Cell(40,10,  utf8_decode($ingreso->$num_vagon),1);
  
  
  
  
  
  $pdf ->Ln();
  
  
}
$pdf->Output();

?>
