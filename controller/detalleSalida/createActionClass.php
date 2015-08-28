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
* @author Cristian Ramirez <ccritianramirezc@gmail.com>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $cantidad =trim (request::getInstance()->getPost(detalleSalidaTableClass::getNameField(detalleSalidaTableClass::CANTIDAD, true)));
                $valor = trim (request::getInstance()->getPost(detalleSalidaTableClass::getNameField(detalleSalidaTableClass::VALOR, true)));
                $fechaFB = trim (request::getInstance()->getPost(detalleSalidaTableClass::getNameField(detalleSalidaTableClass::FECHA_FABRICACION, true)));
                $fechaVC = trim (request::getInstance()->getPost(detalleSalidaTableClass::getNameField(detalleSalidaTableClass::FECHA_VENCIMIENTO, true)));
                $idDoc = request::getInstance()->getPost(detalleSalidaTableClass::getNameField(detalleSalidaTableClass::ID_DOC, true));
                $salidaId = request::getInstance()->getPost(detalleSalidaTableClass::getNameField(detalleSalidaTableClass::SALIDA_BODEGA_ID, true));
                $idInsumo = request::getInstance()->getPost(detalleSalidaTableClass::getNameField(detalleSalidaTableClass::INSUMO_ID, true));

                $this->Validate($cantidad, $valor);

                $data = array(
                    detalleSalidaTableClass::CANTIDAD => $cantidad,
                    detalleSalidaTableClass::VALOR => $valor,
                    detalleSalidaTableClass::FECHA_FABRICACION => $fechaFB,
                    detalleSalidaTableClass::FECHA_VENCIMIENTO => $fechaVC,
                    detalleSalidaTableClass::ID_DOC => $idDoc,
                    detalleSalidaTableClass::SALIDA_BODEGA_ID => $salidaId,
                    detalleSalidaTableClass::INSUMO_ID => $idInsumo
                );
                detalleSalidaTableClass::insert($data);
                session::getInstance()->setSuccess(i18n::__('successfulRegister'));
                routing::getInstance()->redirect('detalleSalida', 'view', array('id' => $salidaId ));
            } else {
                routing::getInstance()->redirect('salidaBodega', 'index');
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
    if (strlen($cantidad) > detalleSalidaTableClass::CANTIDAD_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLengthAmount', NULL, 'default', array('%cantidad%' => $cantidad, '%caracteres%' => detalleSalidaTableClass::CANTIDAD_LENGHT)));
      $bandera = true;
      session::getInstance()->setFlash(detalleSalidaTableClass::getNameField(detalleSalidaTableClass::CANTIDAD, true), true);
    }
    if (strlen($valor) > detalleSalidaTableClass::VALOR_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLengthValue', NULL, 'default', array('%valor%' => $valor, '%caracteres%' => detalleSalidaTableClass::VALOR_LENGHT)));
      $bandera = true;
      session::getInstance()->setFlash(detalleSalidaTableClass::getNameField(detalleSalidaTableClass::VALOR, true), true);
    }
    if($cantidad === '') {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
      $bandera = true;
      session::getInstance()->setFlash(detalleSalidaTableClass::getNameField(detalleSalidaTableClass::CANTIDAD, true), true);
    }
    if($valor === '') {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
      $bandera = true;
      session::getInstance()->setFlash(detalleSalidaTableClass::getNameField(detalleSalidaTableClass::VALOR, true), true);
    }
    if (!is_numeric($cantidad)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'));
      $bandera = true;
      session::getInstance()->setFlash(detalleSalidaTableClass::getNameField(detalleSalidaTableClass::CANTIDAD, true), true);
    }
    if (!is_numeric($valor)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'));
      $bandera = true;
      session::getInstance()->setFlash(detalleSalidaTableClass::getNameField(detalleSalidaTableClass::VALOR, true), true);
    }
    
    if ($bandera === true) {
      request::getInstance()->setMethod('GET');
      routing::getInstance()->forward('detalleSalida', 'insert');
    }
  }

}
