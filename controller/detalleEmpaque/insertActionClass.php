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
class insertActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            
            $fields = array(
                insumoTableClass::ID,
                insumoTableClass::DESC_INSUMO
            );

            $this->objInsu = insumoTableClass::getAll($fields);
            
            $fields = array(
                empaqueTableClass::ID,
                empaqueTableClass::FECHA
            );

            $this->objEmpaque = empaqueTableClass::getAll($fields);
            $this->defineView('insert', 'detalleEmpaque', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}