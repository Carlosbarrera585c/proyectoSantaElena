<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Pago Trabajadores
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST') === TRUE) {

        $fecha = trim(request::getInstance()->getPost(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::FECHA, true)));
        $periodoInicio = trim(request::getInstance()->getPost(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_INICIO, true)));
        $periodoFin = trim(request::getInstance()->getPost(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_FIN, true)));
        $valor = trim(request::getInstance()->getPost(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::VALOR, true)));
        $idTipoPago = trim(request::getInstance()->getPost(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::TIPO_PAGO_ID, true)));
        $idEmpleado = trim(request::getInstance()->getPost(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::EMPLEADO_ID, true)));

        $this->Validate($fecha, $periodoInicio, $periodoFin, $valor, $idTipoPago, $idEmpleado);

        $data = array(
            pagoTrabajadoresTableClass::FECHA => $fecha,
            pagoTrabajadoresTableClass::PERIODO_INICIO => $periodoInicio,
            pagoTrabajadoresTableClass::PERIODO_FIN => $periodoFin,
            pagoTrabajadoresTableClass::VALOR => $valor,
            pagoTrabajadoresTableClass::TIPO_PAGO_ID => $idTipoPago,
            pagoTrabajadoresTableClass::EMPLEADO_ID => $idEmpleado
        );

        PagoTrabajadoresTableClass::insert($data);
        session::getInstance()->setSuccess(i18n::__('successfulRegister'));
        routing::getInstance()->redirect('pagoTrabajadores', 'index');
      } else {
        routing::getInstance()->redirect('pagoTrabajadores', 'index');
      }
    } catch (PDOException $exc) {
      routing::getInstance()->redirect('pagoTrabajadores', 'insert');
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

  private function Validate($fecha, $periodoInicio, $periodoFin, $valor, $idTipoPago, $idEmpleado) {
    $bandera = false;

    if ($fecha == '') {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorNullFecha');
      $bandera = true;
      session::getInstance()->setFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::FECHA, true), true);
    }
     if ($periodoInicio == '') {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorNullPeriodoInicio');
      $bandera = true;
      session::getInstance()->setFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_INICIO, true), true);
    }
     if ($periodoFin == '') {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorNullPeriodoFin');
      $bandera = true;
      session::getInstance()->setFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_FIN, true), true);
    }
    if ($valor == '') {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorNullValor');
      $bandera = true;
      session::getInstance()->setFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::VALOR, true), true);
    }
     if ($idTipoPago == '') {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorNullTipoPago');
      $bandera = true;
      session::getInstance()->setFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::TIPO_PAGO_ID, true), true);
    }
     if ($idEmpleado == '') {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorNullEmpleado');
      $bandera = true;
      session::getInstance()->setFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::EMPLEADO_ID, true), true);
    }
    if ($bandera === true) {
      request::getInstance()->setMethod('GET');
      routing::getInstance()->forward('pagoTrabajadores', 'insert');
    }
  }

}
