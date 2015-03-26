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
* @author Cristian Ramirez <cristianRamirezXD@outlook.es>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $id = request::getInstance()->getPost(tipoPagoTableClass::getNameField(tipoPagoTableClass::ID, true));
        $desc_tipo_pago = request::getInstance()->getPost(tipoPagoTableClass::getNameField(tipoPagoTableClass::DESC_TIPO_PAGO, true));

        $ids = array(
            tipoPagoTableClass::ID => $id
        );

        $data = array(
            tipoPagoTableClass::DESC_TIPO_PAGO => $desc_tipo_pago
        );

        tipoPagoTableClass::update($ids, $data);
      }
      session::getInstance()->setSuccess(i18n::__('successfulUpdate'));
      routing::getInstance()->redirect('tipoPago', 'index');
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}
