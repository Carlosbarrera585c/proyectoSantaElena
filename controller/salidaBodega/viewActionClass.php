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
 *  @author Cristian Ramirez <ccristianramirezc@gmail.com>
 */
class viewActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            
            $id = request::getInstance()->getRequest(salidaBodegaTableClass::ID, true);
            $fields = array(
                salidaBodegaTableClass::ID,
                salidaBodegaTableClass::FECHA,
                salidaBodegaTableClass::PROVEEDOR_ID,
                salidaBodegaTableClass::EMPLEADO_ID
            );
            $where = array (
            salidaBodegaTableClass::ID  => $id
            );
                $fieldsPro = array(
                proveedorTableClass::ID,
                proveedorTableClass::RAZON_SOCIAL
            );

            $this->objProveedor = proveedorTableClass::getAll($fieldsPro,false);
            
            $fieldsEm = array(
                empleadoTableClass::ID,
                empleadoTableClass::NOM_EMPLEADO
            );

            $this->objEmpleado = empleadoTableClass::getAll($fieldsEm,false);
            
            $this->objSalidaBodega = salidaBodegaTableClass::getAll($fields, false, null, null, null, null, $where);
            $this->defineView('view', 'salidaBodega', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
