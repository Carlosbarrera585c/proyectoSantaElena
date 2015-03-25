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
      controlCalidadTableClass::ID,
      controlCalidadTableClass::FECHA,
      controlCalidadTableClass::TURNO,
      controlCalidadTableClass::BRIX,
      controlCalidadTableClass::PH,
      controlCalidadTableClass::AR,
      controlCalidadTableClass::SACAROSA,
      controlCalidadTableClass::PUREZA,
      controlCalidadTableClass::EMPLEADO_ID,
      controlCalidadTableClass::PROVEEDOR_ID
      );
      $this->objControlCalidad = controlCalidadTableClass::getAll($fields, FALSE);
      $this->defineView('index', 'controlCalidad', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}



