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
          cachazaTableClass::ID ,
          cachazaTableClass::HUMEDAD,
          cachazaTableClass::SACAROZA,
          cachazaTableClass::CONTROL_ID

      );
      
    $where = array (
        cachazaTableClass::ID => request::getInstance()->getRequest(cachazaTableClass::ID)
    );
      $this->objCachaza = cachazaTableClass::getAll($fields, false, null, null, null, null, $where);
      $this->defineView('view', 'cachaza', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}
