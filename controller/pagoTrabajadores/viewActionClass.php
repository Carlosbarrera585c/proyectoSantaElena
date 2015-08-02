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
class viewActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      $id = request::getInstance()->getRequest(pagoTrabajadoresTableClass::ID, TRUE);
      $fields = array(
          pagoTrabajadoresTableClass::ID,
          pagoTrabajadoresTableClass::FECHA,
          pagoTrabajadoresTableClass::PERIODO_INICIO,
          pagoTrabajadoresTableClass::PERIODO_FIN,
          pagoTrabajadoresTableClass::TIPO_PAGO_ID,
          pagoTrabajadoresTableClass::VALOR,
          pagoTrabajadoresTableClass::EMPLEADO_ID,
      );
      $where = array(
          pagoTrabajadoresTableClass::ID => $id
      );
      $fieldsTipoPago = array(
          tipoPagoTableClass::ID,
          tipoPagoTableClass::DESC_TIPO_PAGO
      );
      $fieldsEmpleado = array(
          empleadoTableClass::ID,
          empleadoTableClass::NOM_EMPLEADO,
      );

      $this->objTipoPago = tipoPagoTableClass::getAll($fieldsTipoPago);
      $this->objEmpleado = empleadoTableClass::getAll($fieldsEmpleado);
      $this->objPagoTrabajadores = pagoTrabajadoresTableClass::getAll($fields, false, null, null, null, null, $where);
      $this->defineView('view', 'pagoTrabajadores', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
