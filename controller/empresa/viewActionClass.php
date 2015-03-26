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

            $id = request::getInstance()->getRequest(empresaTableClass::ID, true);
            $fields = array(
                empresaTableClass::ID,
                empresaTableClass::NIT,
                empresaTableClass::NOM_EMPRESA,
                empresaTableClass::RAZON_SOCIAL,
                empresaTableClass::DIRECCION,
                empresaTableClass::TELEFONO,
                empresaTableClass::USUARIO_ID
            );
            $where = array(
                empresaTableClass::ID => $id
            );
            $this->objEmpresa = empresaTableClass::getAll($fields, false, null, null, null, null, $where);
            $this->defineView('view', 'empresa', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
