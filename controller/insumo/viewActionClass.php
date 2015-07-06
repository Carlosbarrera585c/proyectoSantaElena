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
 * @author yefri alexander <yefri-1994@hotmail.com>
 */
class viewActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            
            $id = request::getInstance()->getRequest(insumoTableClass::ID, true);
            $fields = array(
                insumoTableClass::ID,
                insumoTableClass::DESC_INSUMO,
                insumoTableClass::PRECIO,
                insumoTableClass::TIPO_INSUMO_ID
            );
            $where = array (
            insumoTableClass::ID  => $id
            );
            $this->objInsu = insumoTableClass::getAll($fields, false, null, null, null, null, $where);
            $this->defineView('view', 'insumo', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
