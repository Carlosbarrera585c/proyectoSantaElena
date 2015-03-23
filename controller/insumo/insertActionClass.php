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
class insertActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            $fields = array(
                tipoInsumoTableClass::ID,
                tipoInsumoTableClass::DESC_TIPO_INSUMO
            );
            
       $this->objTipoInsumo = tipoInsumoTableClass::getAll($fields, false);            
            $this->defineView('insert', 'insumo', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
