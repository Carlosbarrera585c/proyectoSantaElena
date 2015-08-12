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
        if (isset($report['fecha1']) and $report['fecha1'] !== NULL and $report['fecha1'] !== '' and isset($report['fecha2']) and $report['fecha2'] !== NULL and $report['fecha2'] !== '') {
          $where[jugoTableClass::FECHA] = array(
              $report['fecha1'],
              $report['fecha2']
          );
        }
        if (isset($report['procedencia']) and $report['procedencia'] !== NULL and $report['procedencia'] !== '') {
          $where[jugoTableClass::PROCEDENCIA] = $report['procedencia'];
        }
        if (isset($report['brix']) and $report['brix'] !== NULL and $report['brix'] !== '') {
          $where[jugoTableClass::BRIX] = $report['brix'];
        }
        if (isset($report['ph']) and $report['ph'] !== NULL and $report['ph'] !== '') {
          $where[jugoTableClass::PH] = $report['ph'];
        }
        
        if (isset($report['ph']) and $report['ph'] !== NULL and $report['ph'] !== '') {
          $where[jugoTableClass::CONTROL_ID] = $report['ph'];
        }


        $fields = array(
            jugoTableClass::ID,
            jugoTableClass::FECHA,
            jugoTableClass::PROCEDENCIA,
            jugoTableClass::BRIX,
            jugoTableClass::PH,
            jugoTableClass::CONTROL_ID,

        );

        $orderBy = array(
            jugoTableClass::ID
        );
        $this->objJugo = jugoTableClass::getAll($fields, FALSE, $orderBy, 'ASC', NULL, NULL, $where);
        $this->defineView('report', 'jugo', session::getInstance()->getFormatOutput());
      }

    } catch (PDOException $exc) {
      echo $exc->getMessage() . "<BR>" . print_r($exc->getTraceAsString());
    }
  }

}
