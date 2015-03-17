<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author Carlos Alberto Barrera Montoya <cabarera22@misena.edu.co>
 */
class viewActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {

            $id = request::getInstance()->getRequest(empaqueTableClass::ID, true);
            $fields = array(
                empaqueTableClass::ID,
                empaqueTableClass::FECHA,
                empaqueTableClass::EMPLEADO_ID,
                empaqueTableClass::TIPO_EMPAQUE_ID
            );
            $where = array(
                empaqueTableClass::ID => $id
            );
            $this->objEmpaque = empaqueTableClass::getAll($fields, false, null, null, null, null, $where);
            $this->defineView('view', 'empaque', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
