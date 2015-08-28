<?php

use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;

$empleado_id = controlCalidadTableClass::EMPLEADO_ID;
$proveedor_id = controlCalidadTableClass::PROVEEDOR_ID;
$variedad = controlCalidadTableClass::VARIEDAD;
$brix = controlCalidadTableClass::BRIX;
$ph = controlCalidadTableClass::PH;
$ar = controlCalidadTableClass::AR;
$sacarosa = controlCalidadTableClass::SACAROSA;
$pureza = controlCalidadTableClass::PUREZA;
$fecha = controlCalidadTableClass::FECHA;
$edad = controlCalidadTableClass::EDAD;


  class PDF extends FPDF {

	function Header() {



	  $this->Image(routing::getInstance()->getUrlImg('logoProyecto.jpg'), 0, 0, 210);
	  $this->SetFont('courier', 'B', '12');
	  $this->Ln(10);
	  # $this->Cell(80);
	  # $this->Cell(30, 10, 'Cliente', 1, 0, 'C');
	  $this->Ln(30);
	}

	function Footer() {
	  $this->SetY(-15);
	  $this->SetFont('', 'I', 8);
	  $this->Cell(0, 10, 'page' . $this->PageNo() . '/{Reportes}', 0, 0, 'C');
	}

  }

  $pdf = new PDF();
  $pdf->AddPage();
  $pdf->SetFont('Arial', 'B', 8);

  $pdf->Ln();
  $pdf->Ln();
//  $pdf->Cell(190, 10, $mensaje, 1, 0, 'C');
  $pdf->Ln();
  $pdf->Cell(20, 10, "FECHA", 1, 0, 'C');
  $pdf->Cell(20, 10, "EMPLEADO", 1, 0, 'C');
  $pdf->Cell(20, 10, "PROVEEDOR", 1, 0, 'C');
  $pdf->Cell(20, 10, "VARIEDAD", 1, 0, 'C');
  $pdf->Cell(15, 10, "BRIX", 1, 0, 'C');
  $pdf->Cell(15, 10, "PH", 1, 0, 'C');
  $pdf->Cell(15, 10, "AR", 1, 0, 'C');
  $pdf->Cell(20, 10, "SACAROSA", 1, 0, 'C');
  $pdf->Cell(20, 10, "PUREZA", 1, 0, 'C');
  $pdf->Cell(15, 10, "EDAD", 1, 0, 'C');
  $pdf->Ln();
  foreach ($objControlCalidad as $valor) {
	$pdf->Cell(20, 8, utf8_decode($valor->$fecha), 1);
	$pdf->Cell(20, 8, utf8_decode(controlCalidadTableClass::getNameEmpleado($objControlCalidad[0]->$empleado_id)), 1);
	$pdf->Cell(20, 8, utf8_decode(controlCalidadTableClass::getNameProveedor($objControlCalidad[0]->$proveedor_id)), 1);
	$pdf->Cell(20, 8, utf8_decode($valor->$variedad), 1);
	$pdf->Cell(15, 8, utf8_decode($valor->$brix), 1);
	$pdf->Cell(15, 8, utf8_decode($valor->$ph), 1);
	$pdf->Cell(15, 8, utf8_decode($valor->$ar), 1);
	$pdf->Cell(20, 8, utf8_decode($valor->$sacarosa), 1);
	$pdf->Cell(20, 8, utf8_decode($valor->$pureza), 1);
	$pdf->Cell(15, 8, utf8_decode($valor->$edad), 1);
	$pdf->Ln();
  }
  $pdf->Output();

?>