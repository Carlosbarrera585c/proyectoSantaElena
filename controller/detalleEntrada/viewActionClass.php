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
          
          $idEntrada = request::getInstance()->getRequest(entradaBodegaTableClass::ID, true);
            $fieldsEntrada = array(
                entradaBodegaTableClass::ID,
                entradaBodegaTableClass::FECHA
            );
            $whereEntrada = array(
                entradaBodegaTableClass::ID => $idEntrada
            );
            $this->objEntradaBodega = entradaBodegaTableClass::getAll($fieldsEntrada, false, null, null, null, null, $whereEntrada);

            $idDetalle = request::getInstance()->getRequest(detalleEntradaTableClass::ID, true);
            $fieldsDetalle = array(
                detalleEntradaTableClass::ID,
                detalleEntradaTableClass::CANTIDAD,
                detalleEntradaTableClass::VALOR,
                detalleEntradaTableClass::FECHA_FABRICACION,
                detalleEntradaTableClass::FECHA_VENCIMIENTO,
                detalleEntradaTableClass::ID_DOC,
                detalleEntradaTableClass::ENTRADA_BODEGA_ID,
                detalleEntradaTableClass::INSUMO_ID
            );
            $whereDetalle = array(
                detalleEntradaTableClass::ENTRADA_BODEGA_ID => $idDetalle
            );
            $this->objDetalleEntrada = detalleEntradaTableClass::getAll($fieldsDetalle, false, null, null, null, null, $whereDetalle);
            $this->defineView('view', 'detalleEntrada', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
