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
            
            $id = request::getInstance()->getRequest(entradaBodegaTableClass::ID, true);
            $fields = array(
                entradaBodegaTableClass::ID,
                entradaBodegaTableClass::FECHA,
                entradaBodegaTableClass::PROVEEDOR_ID
            );
            $where = array (
            entradaBodegaTableClass::ID  => $id
            );
                $fieldsPro = array(
                proveedorTableClass::ID,
                proveedorTableClass::RAZON_SOCIAL
            );

            $this->objProveedor = proveedorTableClass::getAll($fieldsPro,false);
            $this->objEntradaBodega = entradaBodegaTableClass::getAll($fields, false, null, null, null, null, $where);
            $this->defineView('view', 'entradaBodega', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
