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
	  
      $this->Image(routing::getInstance()->getUrlImg('report.png'), 5, 55, 202);
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
  $pdf->Output();

?>