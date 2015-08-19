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
      $where = NULL;
      if (request::getInstance()->hasPost('report')) {
        $report = request::getInstance()->getPost('report');
        // aqui validar datos de filtros
        if (isset($report['procedencia']) and $report['procedencia'] !== NULL and $report['procedencia'] !== '') {
          $where[cachazaTableClass::PROCEDENCIA] = $report['procedencia'];
        }


        $fields = array(
            cachazaTableClass::ID,
            cachazaTableClass::PROCEDENCIA,
            cachazaTableClass::BRIX,
            cachazaTableClass::CONTROL_ID,

        );

        $orderBy = array(
            cachazaTableClass::ID
        );
        $this->objCachaza = cachazaTableClass::getAll($fields, FALSE, $orderBy, 'ASC', NULL, NULL, $where);
        $this->defineView('report', 'cachaza', session::getInstance()->getFormatOutput());
      }

    } catch (PDOException $exc) {
      echo $exc->getMessage() . "<BR>" . print_r($exc->getTraceAsString());
    }
  }

}
