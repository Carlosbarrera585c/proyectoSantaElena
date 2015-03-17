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
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class insertActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {

            $fieldsEmpleado = array(
                empleadoTableClass::ID,
                empleadoTableClass::NOM_EMPLEADO
            );
            $fieldsTipoEmpaque = array(
                tipoEmpaqueTableClass::ID,
                tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE
            );

            $this->objEmpleado = empleadoTableClass::getAll($fieldsEmpleado);
            $this->objTipoEmpaque = tipoEmpaqueTableClass::getAll($fieldsTipoEmpaque);
            $this->defineView('insert', 'empaque', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
