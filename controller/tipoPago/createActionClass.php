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

        $desc_tipo_pago = request::getInstance()->getPost(tipoPagoTableClass::getNameField(tipoPagoTableClass::DESC_TIPO_PAGO, true));


        if (strlen($desc_tipo_pago) > tipoPagoTableClass::DESC_LENGTH) {
          throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => tipoPagoTableClass::DESC_LENGTH)), 00001);
        }

        $data = array(
            tipoPagoTableClass::DESC_TIPO_PAGO => $desc_tipo_pago,
        );
        
        tipoPagoTableClass::insert($data);
        session::getInstance()->setSuccess(i18n::__('successfulRegister'));
        routing::getInstance()->redirect('tipoPago', 'index');
      } else {
        routing::getInstance()->redirect('tipoPago', 'index');
      }
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}
