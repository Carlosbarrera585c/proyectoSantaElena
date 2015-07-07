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
 * @author Cristian Ramirez <ccristianramirezc@gmail.com>
 */
class insertActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {

            $fieldsProveedor = array(
                proveedorTableClass::ID,
                proveedorTableClass::RAZON_SOCIAL
            );

            $this->objProveedor = proveedorTableClass::getAll($fieldsProveedor, false);

            $fieldsEmpleado = array(
                empleadoTableClass::ID,
                empleadoTableClass::NOM_EMPLEADO
            );

            $this->objEmpleado = empleadoTableClass::getAll($fieldsEmpleado, false);

            $this->defineView('insert', 'SalidaBodega', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
