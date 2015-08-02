
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
class editActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasGet(PagoTrabajadoresTableClass::ID)) {
        $fields = array(
            pagoTrabajadoresTableClass::ID,
            pagoTrabajadoresTableClass::FECHA,
            pagoTrabajadoresTableClass::PERIODO_INICIO,
            pagoTrabajadoresTableClass::PERIODO_FIN,
            pagoTrabajadoresTableClass::TIPO_PAGO_ID,
            pagoTrabajadoresTableClass::VALOR,
            pagoTrabajadoresTableClass::EMPLEADO_ID
        );
        $where = array(
            pagoTrabajadoresTableClass::ID => request::getInstance()->getGet(pagoTrabajadoresTableClass::ID)
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
        $this->objPagoTrabajadores = pagoTrabajadoresTableClass::getAll($fields, null, null, null, null, null, $where);
        $this->defineView('edit', 'pagoTrabajadores', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('pagoTrabajadores', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
