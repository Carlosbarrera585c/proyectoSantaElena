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
class insertActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {

            $fieldsTipoId = array(
                tipoIdTableClass::ID,
                tipoIdTableClass::DESC_TIPO_ID
            );
            $fieldsCredencial = array(
                credencialTableClass::ID,
                credencialTableClass::NOMBRE
            );

            $this->objCredencial = credencialTableClass::getAll($fieldsCredencial);
            $this->objTipoId = tipoIdTableClass::getAll($fieldsTipoId);
            $this->defineView('insert', 'empleado', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
