
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
class updateActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $id = request::getInstance()->getPost(detalleEntradaTableClass::getNameField(detalleEntradaTableClass::ID, true));
                $cantidad = request::getInstance()->getPost(detalleEntradaTableClass::getNameField(detalleEntradaTableClass::CANTIDAD, true));
                $valor = request::getInstance()->getPost(detalleEntradaTableClass::getNameField(detalleEntradaTableClass::VALOR, true));
                $fechaFB = request::getInstance()->getPost(detalleEntradaTableClass::getNameField(detalleEntradaTableClass::FECHA_FABRICACION, true));
                $fechaVC = request::getInstance()->getPost(detalleEntradaTableClass::getNameField(detalleEntradaTableClass::FECHA_VENCIMIENTO, true));
                $idDoc = request::getInstance()->getPost(detalleEntradaTableClass::getNameField(detalleEntradaTableClass::ID_DOC, true));
                $enBodegaId = request::getInstance()->getPost(detalleEntradaTableClass::getNameField(detalleEntradaTableClass::ENTRADA_BODEGA_ID, true));
                $idInsumo = request::getInstance()->getPost(detalleEntradaTableClass::getNameField(detalleEntradaTableClass::INSUMO_ID, true));
                
         
                $ids = array(
                    detalleEntradaTableClass::ID => $id
                );

                $data = array(
                    detalleEntradaTableClass::ID => $id,
                    detalleEntradaTableClass::CANTIDAD => $cantidad,
                    detalleEntradaTableClass::VALOR => $valor,
                    detalleEntradaTableClass::FECHA_FABRICACION => $fechaFB,
                    detalleEntradaTableClass::FECHA_VENCIMIENTO => $fechaVC,
                    detalleEntradaTableClass::ID_DOC => $idDoc,
                    detalleEntradaTableClass::ENTRADA_BODEGA_ID => $enBodegaId,
                    detalleEntradaTableClass::INSUMO_ID => $idInsumo,
                    
                );

                detalleEntradaTableClass::update($ids, $data);
            }
            session::getInstance()->setSuccess(i18n::__('successfulUpdate'));
            routing::getInstance()->redirect('detalleEntrada', 'index');
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
