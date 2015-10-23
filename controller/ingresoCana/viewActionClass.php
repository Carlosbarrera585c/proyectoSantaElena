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
class viewActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {

            $fields = array(
                ingresoCanaTableClass::ID,
                ingresoCanaTableClass::FECHA,
                ingresoCanaTableClass::EMPLEADO_ID,
                ingresoCanaTableClass::PROVEEDOR_ID,
                ingresoCanaTableClass::CANTIDAD,
                ingresoCanaTableClass::PESO_CAÑA,
                ingresoCanaTableClass::PESO_CAÑA2,
                ingresoCanaTableClass::PESO_CAÑA3,
                ingresoCanaTableClass::PESO_CAÑA4,
                ingresoCanaTableClass::PESO_CAÑA5,
                ingresoCanaTableClass::NUM_VAGON,
                ingresoCanaTableClass::NUM_VAGON2,
                ingresoCanaTableClass::NUM_VAGON3,
                ingresoCanaTableClass::NUM_VAGON4,
                ingresoCanaTableClass::NUM_VAGON5,
                ingresoCanaTableClass::VARIEDAD
            );

            $where = array(
                ingresoCanaTableClass::ID => request::getInstance()->getRequest(ingresoCanaTableClass::ID)
            );
            $this->objingresoCana = ingresoCanaTableClass::getAll($fields, false, null, null, null, null, $where);
            $this->defineView('view', 'ingresoCana', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo '<pre>';
            print_r($exc->getTrace());
            echo '</pre>';
        }
    }

}
