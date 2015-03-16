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
 *  @author Cristian Ramirez <cristianRamirezXD@outlook.es>
 */
class viewActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            
            $id = request::getInstance()->getRequest(tipoInsumoTableClass::ID, true);
            $fields = array(
                tipoInsumoTableClass::ID,
                tipoInsumoTableClass::DESC_TIPO_INSUMO
            );
            $where = array (
            tipoInsumoTableClass::ID  => $id
            );
            $this->objTipoInsumo = tipoInsumoTableClass::getAll($fields, false, null, null, null, null, $where);
            $this->defineView('view', 'tipoInsumo', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
