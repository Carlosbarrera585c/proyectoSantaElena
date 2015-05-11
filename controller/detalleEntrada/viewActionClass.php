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
                entradaBodegaTableClass::FECHA
            );
            $where = array(
                entradaBodegaTableClass::ID => request::getInstance()->getRequest(entradaBodegaTableClass::ID)
            );
            $this->objEntradaBodega = entradaBodegaTableClass::getAll($fields, false, null, null, null, null, $where);

            $id = request::getInstance()->getRequest(detalleEntradaTableClass::ID, true);
            $fields = array(
                detalleEntradaTableClass::ID,
                detalleEntradaTableClass::CANTIDAD,
                detalleEntradaTableClass::VALOR,
                detalleEntradaTableClass::FECHA_FABRICACION,
                detalleEntradaTableClass::FECHA_VENCIMIENTO,
                detalleEntradaTableClass::ID_DOC,
                detalleEntradaTableClass::ENTRADA_BODEGA_ID,
                detalleEntradaTableClass::INSUMO_ID
            );
            $where = array(
                detalleEntradaTableClass::ID => request::getInstance()->getRequest(detalleEntradaTableClass::ID)
            );
            $this->objDetalleEntrada = detalleEntradaTableClass::getAll($fields, false, null, null, null, null, $where);
            $this->defineView('view', 'detalleEntrada', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
