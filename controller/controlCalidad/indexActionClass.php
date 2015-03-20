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
 * @author Bayron Henao <bairon_henao_1995@hotmail.com>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            $fields = array(
                controlCalidadTableClass::ID,
                controlCalidadTableClass::FECHA,
                controlCalidadTableClass::TURNO,
                controlCalidadTableClass::BRIX,
                controlCalidadTableClass::PH,
                controlCalidadTableClass::AR,
                controlCalidadTableClass::SACAROSA,
                controlCalidadTableClass::PUREZA,
                controlCalidadTableClass::EMPLEADO_ID,
                controlCalidadTableClass::PROVEEDOR_ID
            );
            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }
            $this->cntPages = controlCalidadTableClass:: getTotalPages(config::getRowGrid());
            $this->objControlCalidad = controlCalidadTableClass::getAll($fields, false, null, null, config::getRowGrid(), $page);
            $this->defineView('index', 'controlCalidad', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
