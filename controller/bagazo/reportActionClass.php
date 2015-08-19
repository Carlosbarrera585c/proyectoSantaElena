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
        if (isset($report['Humedad']) and $report['Humedad'] !== NULL and $report['Humedad'] !== '') {
          $where[bagazoTableClass::HUMEDAD] = $report['Humedad'];
        }
        if (isset($report['Brix']) and $report['Brix'] !== NULL and $report['Brix'] !== '') {
          $where[bagazoTableClass::BRIX] = $report['Brix'];
        }
        if (isset($report['Sacarosa']) and $report['Sacarosa'] !== NULL and $report['Sacarosa'] !== '') {
          $where[bagazoTableClass::SACAROSA] = $report['Sacarosa'];
        }


        $fields = array(
            bagazoTableClass::ID,
            bagazoTableClass::HUMEDAD,
			bagazoTableClass::BRIX,
			bagazoTableClass::SACAROSA,
			

        );

        $orderBy = array(
            bagazoTableClass::ID
        );
        $this->objBagazo = bagazoTableClass::getAll($fields, FALSE, $orderBy, 'ASC', NULL, NULL, $where);
        $this->defineView('report', 'bagazo', session::getInstance()->getFormatOutput());
      }

    } catch (PDOException $exc) {
      echo $exc->getMessage() . "<BR>" . print_r($exc->getTraceAsString());
    }
  }

}
