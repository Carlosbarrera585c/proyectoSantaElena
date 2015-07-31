
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
class editActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->hasGet(empleadoTableClass::ID)) {
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
                    empleadoTableClass::ID => request::getInstance()->getGet(empleadoTableClass::ID)
                );

                $fieldsTipoId = array(
                    tipoIdTableClass::ID,
                    tipoIdTableClass::DESC_TIPO_ID
                );
                $fieldsCredencial = array(
                    credencialTableClass::ID,
                    credencialTableClass::NOMBRE
                );

                $this->objTipoId = tipoIdTableClass::getAll($fieldsTipoId);
                $this->objCredencial = credencialTableClass::getAll($fieldsCredencial);
                $this->objEmpleado = empleadoTableClass::getAll($fields, NULL, NULL, NULL, NULL, NULL, $where);
                $this->defineView('edit', 'empleado', session::getInstance()->getFormatOutput());
            } else {
                routing::getInstance()->redirect('empleado', 'index');
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
