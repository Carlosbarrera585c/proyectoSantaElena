<?php
use mvc\routing\routingClass as routing;

$id = ingresoCanaTableClass::ID;
$fecha = ingresoCanaTableClass::FECHA;
$empleado_id = ingresoCanaTableClass::EMPLEADO_ID;
$proveedor_id = ingresoCanaTableClass::PROVEEDOR_ID;
$cantidad = ingresoCanaTableClass::CANTIDAD;
$peso_caña = ingresoCanaTableClass::PESO_CAÑA;
$num_vagon = ingresoCanaTableClass::NUM_VAGON;
$peso_caña2 = ingresoCanaTableClass::PESO_CAÑA2;
$num_vagon2 = ingresoCanaTableClass::NUM_VAGON2;
$peso_caña3 = ingresoCanaTableClass::PESO_CAÑA3;
$num_vagon3 = ingresoCanaTableClass::NUM_VAGON3;
$peso_caña4 = ingresoCanaTableClass::PESO_CAÑA4;
$num_vagon4 = ingresoCanaTableClass::NUM_VAGON4;
$peso_caña5 = ingresoCanaTableClass::PESO_CAÑA5;
$num_vagon5 = ingresoCanaTableClass::NUM_VAGON5;
$variedad = ingresoCanaTableClass::VARIEDAD;

$pdf = new FPDF('l', 'mm', 'letter');
$pdf->AddPage();
$pdf->Cell(80);
$pdf->SetFont('courier','B',8);
$pdf->Image(routing::getInstance()->getUrlImg('logoProyecto.jpg'),0,0,280);

$pdf ->Ln(50);

$pdf->Cell (256,10,'INGRESO CANA',1,1,'C');
  $pdf->Cell(22,10,  utf8_decode("FECHA"),1);
  $pdf->Cell(18,10,  utf8_decode("NUM VAGON"),1);
  $pdf->Cell(18,10,  utf8_decode("PESO CAÑA"),1);
  $pdf->Cell(18,10,  utf8_decode("NUM VAGON2"),1);
  $pdf->Cell(18,10,  utf8_decode("PESO CAÑA2"),1);
  $pdf->Cell(18,10,  utf8_decode("NUM VAGON3"),1);
  $pdf->Cell(18,10,  utf8_decode("PESO CAÑA3"),1);
  $pdf->Cell(18,10,  utf8_decode("NUM VAGON4"),1);
  $pdf->Cell(18,10,  utf8_decode("PESO CAÑA4"),1);
  $pdf->Cell(18,10,  utf8_decode("NUM VAGON5"),1);
  $pdf->Cell(18,10,  utf8_decode("PESO CAÑA5"),1);
  $pdf->Cell(18,10,  utf8_decode("CANTIDAD"),1);
  $pdf->Cell(18,10,  utf8_decode("VARIEDAD"),1);
  $pdf->Cell(18,10,  utf8_decode("EMPLEADO"),1);
  $pdf->Cell(18,10,  utf8_decode("PROVEEDOR"),1);
  
 
  
 
  $pdf->Ln();
foreach ($objingresoCana as $ingreso){
  $pdf->Cell(22,10,  utf8_decode($ingreso->$fecha),1);
  $pdf->Cell(18,10,  utf8_decode($ingreso->$peso_caña),1);
  $pdf->Cell(18,10,  utf8_decode($ingreso->$num_vagon),1);
  $pdf->Cell(18,10,  utf8_decode($ingreso->$peso_caña2),1);
  $pdf->Cell(18,10,  utf8_decode($ingreso->$num_vagon2),1);
  $pdf->Cell(18,10,  utf8_decode($ingreso->$peso_caña3),1);
  $pdf->Cell(18,10,  utf8_decode($ingreso->$num_vagon3),1);
  $pdf->Cell(18,10,  utf8_decode($ingreso->$peso_caña4),1);
  $pdf->Cell(18,10,  utf8_decode($ingreso->$num_vagon4),1);
  $pdf->Cell(18,10,  utf8_decode($ingreso->$peso_caña5),1);
  $pdf->Cell(18,10,  utf8_decode($ingreso->$num_vagon5),1);
  $pdf->Cell(18,10,  utf8_decode($ingreso->$cantidad),1);
  $pdf->Cell(18,10,  utf8_decode($ingreso->$variedad),1);
  $pdf->Cell(18,10,  utf8_decode(ingresoCanaTableClass::getNameEmpleado($ingreso->$empleado_id)),1);
  $pdf->Cell(18,10,  utf8_decode(ingresoCanaTableClass::getNameProveedor($ingreso->$proveedor_id)),1);
  
  
  
  
  
  
  
  $pdf ->Ln();
  
  
}
$pdf->Output();

?>
