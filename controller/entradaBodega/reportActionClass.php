<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

class reportActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      $fields = array(
      entradaBodegaTableClass::ID,
      entradaBodegaTableClass::FECHA,
      entradaBodegaTableClass::PROVEEDOR_ID,

      );
      $this->objEntradaBodega = entradaBodegaTableClass::getAll($fields, FALSE);
      $this->defineView('index', 'entradaBodega', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}



