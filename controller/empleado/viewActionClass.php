<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Empleado
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class viewActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            $id = request::getInstance()->getRequest(empleadoTableClass::ID, TRUE);
            $fields = array(
                empleadoTableClass::ID,
                empleadoTableClass::NOM_EMPLEADO,
                empleadoTableClass::APELL_EMPLEADO,
                empleadoTableClass::TELEFONO,
                empleadoTableClass::DIRECCION,
                empleadoTableClass::TIPO_ID_ID,
                empleadoTableClass::NUMERO_IDENTIFICACION,
                empleadoTableClass::CREDENCIAL_ID,
                empleadoTableClass::CORREO
            );
            $where = array(
                empleadoTableClass::ID => $id
            );
            $this->objEmpleado = empleadoTableClass::getAll($fields, false, null, null, null, null, $where);
            $this->defineView('view', 'empleado', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
