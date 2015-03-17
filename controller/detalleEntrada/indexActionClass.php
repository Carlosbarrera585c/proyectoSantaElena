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
class indexActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            $fields = array(
                detalleEntradaBodegaTableClass::ID,
                detalleEntradaBodegaTableClass::CANTIDAD,
                detalleEntradaBodegaTableClass::INSUMO_ID
            );
            $this->objDetalleEntrada = detalleEntradaBodegaTableClass::getAll($fields, false);
            $this->defineView('index', 'detalle_entrada', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
