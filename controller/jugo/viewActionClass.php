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
 * @author Cristian Ramirez <ccristianramirezc@gmail.com>
 */
class viewActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      $fields = array(
          jugoTableClass::ID ,
          jugoTableClass::PROCEDENCIA,
          jugoTableClass::BRIX,
          jugoTableClass::PH,
          jugoTableClass::CONTROL_ID

      );
      
    $where = array (
        jugoTableClass::ID => request::getInstance()->getRequest(jugoTableClass::ID)
    );
      $this->objJugo = jugoTableClass::getAll($fields, false, null, null, null, null, $where);
      $this->defineView('view', 'jugo', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}
