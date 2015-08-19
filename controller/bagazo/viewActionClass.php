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
          bagazoTableClass::ID ,
          bagazoTableClass::HUMEDAD ,
          bagazoTableClass::BRIX ,
          bagazoTableClass::SACAROSA,
          bagazoTableClass::CONTROL_ID

      );
      
    $where = array (
        bagazoTableClass::ID => request::getInstance()->getRequest(bagazoTableClass::ID)
    );
      $this->objBagazo = bagazoTableClass::getAll($fields, false, null, null, null, null, $where);
      $this->defineView('view', 'bagazo', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}
