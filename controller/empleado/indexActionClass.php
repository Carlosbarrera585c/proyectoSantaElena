<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Empleado
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            $fields = array(
                empleadoTableClass::ID,
                empleadoTableClass::NOM_EMPLEADO,
                empleadoTableClass::APELL_EMPLEADO,
                empleadoTableClass::TELEFONO,
                empleadoTableClass::DIRECCION,
                empleadoTableClass::TIPO_ID_ID,
                empleadoTableClass::NUMERO_IDENTIFICACION,
                empleadoTableClass::CREDENCIAL_ID,
                empleadoTableClass::CORREO
            );
            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }
            $this->cntPages = empleadoTableClass:: getTotalPages(config::getRowGrid());
            $this->objEmpleado = empleadoTableClass::getAll($fields, false, null, null,config::getRowGrid(), $page);
            $this->defineView('index', 'empleado', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
