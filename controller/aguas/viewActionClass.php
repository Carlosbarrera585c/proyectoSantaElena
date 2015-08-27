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
          aguasTableClass::ID ,
          aguasTableClass::PROCEDENCIA,
          aguasTableClass::ARRASTRE_DULCE,
          aguasTableClass::PH,
          aguasTableClass::CLORO_RESIDUAL,
          aguasTableClass::CONTROL_ID,
          aguasTableClass::HORA

      );
      
    $where = array (
        aguasTableClass::ID => request::getInstance()->getRequest(aguasTableClass::ID)
    );
      $this->objAguas = aguasTableClass::getAll($fields, false, null, null, null, null, $where);
      $this->defineView('view', 'aguas', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}
