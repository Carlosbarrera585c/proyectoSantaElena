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
class editActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasRequest(tipoDocTableClass::ID)) {
        $fields = array(
            tipoDocTableClass::ID,
            tipoDocTableClass::DESC_TIPO_DOC
        );
        $where = array(
            tipoDocTableClass::ID => request::getInstance()->getRequest(tipoDocTableClass::ID)
        );
        $this->objTipoPago = tipoDocTableClass::getAll($fields, false, null, null, null, null, $where);
        $this->defineView('edit', 'tipoDoc', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('tipoDoc', 'index');
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
