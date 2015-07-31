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
class insertActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {

            $fieldsTipoPago = array(
                tipoPagoTableClass::ID,
                tipoPagoTableClass::DESC_TIPO_PAGO
            );
            $fieldsEmpleado = array(
                empleadoTableClass::ID,
                empleadoTableClass::NOM_EMPLEADO,
                empleadoTableClass::APELL_EMPLEADO,
                empleadoTableClass::NUMERO_IDENTIFICACION
            );

            $this->objTipoPago = tipoPagoTableClass::getAll($fieldsTipoPago);
            $this->objEmpleado = empleadoTableClass::getAll($fieldsEmpleado);
            $this->defineView('insert', 'pagoTrabajadores', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
