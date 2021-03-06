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
class createActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $cantidad =trim (request::getInstance()->getPost(detalleEntradaTableClass::getNameField(detalleEntradaTableClass::CANTIDAD, true)));
                $valor = trim (request::getInstance()->getPost(detalleEntradaTableClass::getNameField(detalleEntradaTableClass::VALOR, true)));
                $fechaFB = trim (request::getInstance()->getPost(detalleEntradaTableClass::getNameField(detalleEntradaTableClass::FECHA_FABRICACION, true)));
                $fechaVC = trim (request::getInstance()->getPost(detalleEntradaTableClass::getNameField(detalleEntradaTableClass::FECHA_VENCIMIENTO, true)));
                $idDoc = request::getInstance()->getPost(detalleEntradaTableClass::getNameField(detalleEntradaTableClass::ID_DOC, true));
                $enBodegaId = request::getInstance()->getPost(detalleEntradaTableClass::getNameField(detalleEntradaTableClass::ENTRADA_BODEGA_ID, true));
                $idInsumo = request::getInstance()->getPost(detalleEntradaTableClass::getNameField(detalleEntradaTableClass::INSUMO_ID, true));

                $this->Validate($cantidad, $valor);

                $data = array(
                    detalleEntradaTableClass::CANTIDAD => $cantidad,
                    detalleEntradaTableClass::VALOR => $valor,
                    detalleEntradaTableClass::FECHA_FABRICACION => $fechaFB,
                    detalleEntradaTableClass::FECHA_VENCIMIENTO => $fechaVC,
                    detalleEntradaTableClass::ID_DOC => $idDoc,
                    detalleEntradaTableClass::ENTRADA_BODEGA_ID => $enBodegaId,
                    detalleEntradaTableClass::INSUMO_ID => $idInsumo
                );
                detalleEntradaTableClass::insert($data);
                session::getInstance()->setSuccess(i18n::__('successfulRegister'));
                routing::getInstance()->redirect('detalleEntrada', 'view', array('id' => $enBodegaId ));
            } else {
                routing::getInstance()->redirect('entradaBodega', 'index');
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
            session::getInstance()->setError(i18n::__('failureToRegister'));
        }
    }
    
    private function Validate($cantidad, $valor) {
    $bandera = FALSE;
    if (strlen($cantidad) > detalleEntradaTableClass::CANTIDAD_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLengthAmount', NULL, 'default', array('%cantidad%' => $cantidad, '%caracteres%' => detalleEntradaTableClass::CANTIDAD_LENGHT)));
      $bandera = true;
      session::getInstance()->setFlash(detalleEntradaTableClass::getNameField(detalleEntradaTableClass::CANTIDAD, true), true);
    }
    if (strlen($valor) > detalleEntradaTableClass::VALOR_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLengthValue', NULL, 'default', array('%valor%' => $valor, '%caracteres%' => detalleEntradaTableClass::VALOR_LENGHT)));
      $bandera = true;
      session::getInstance()->setFlash(detalleEntradaTableClass::getNameField(detalleEntradaTableClass::VALOR, true), true);
    }
    if($cantidad === '') {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
      $bandera = true;
      session::getInstance()->setFlash(detalleEntradaTableClass::getNameField(detalleEntradaTableClass::CANTIDAD, true), true);
    }
    if($valor === '') {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
      $bandera = true;
      session::getInstance()->setFlash(detalleEntradaTableClass::getNameField(detalleEntradaTableClass::VALOR, true), true);
    }
    if (!is_numeric($cantidad)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'));
      $bandera = true;
      session::getInstance()->setFlash(detalleEntradaTableClass::getNameField(detalleEntradaTableClass::CANTIDAD, true), true);
    }
    if (!is_numeric($valor)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'));
      $bandera = true;
      session::getInstance()->setFlash(detalleEntradaTableClass::getNameField(detalleEntradaTableClass::VALOR, true), true);
    }
    
    if ($bandera === true) {
      request::getInstance()->setMethod('GET');
      routing::getInstance()->forward('detalleEntrada', 'insert');
    }
  }

}
