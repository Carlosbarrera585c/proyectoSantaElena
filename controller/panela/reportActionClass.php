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
        if ((isset($filter['hora1']) and $filter['hora1'] !== null and $filter['hora1'] !== "") and (isset($filter['hora2']) and $filter['hora2'] !== null and $filter['hora2'] !== "")) {
          $where[panelaTableClass::HORA] = array(
          date(config::getFormatTimestamp(), strtotime($filter['hora1'])),
          date(config::getFormatTimestamp(), strtotime($filter['hora2']))
          );
}
        $fields = array(
            panelaTableClass::ID,
            panelaTableClass::HORA,
            panelaTableClass::PROVEEDOR_ID,
            panelaTableClass::SEDIMENTO,
            panelaTableClass::CONTROL_ID,

        );

        $orderBy = array(
            panelaTableClass::ID
        );
        $this->objPanela = panelaTableClass::getAll($fields, FALSE, $orderBy, 'ASC', NULL, NULL, $where);
        $this->defineView('report', 'panela', session::getInstance()->getFormatOutput());
      }

    } catch (PDOException $exc) {
      echo $exc->getMessage() . "<BR>" . print_r($exc->getTraceAsString());
    }
  }

}
