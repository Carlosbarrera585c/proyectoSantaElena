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
      $where = null;
      if (request::getInstance()->hasPost('report')) {
        $report = request::getInstance()->getPost('report');
//aqui validar datos
        if (isset($report['Credencial']) and $report['Credencial'] !== null and $report['Credencial'] !== "") {
          $where[credencialTableClass::NOMBRE] = $report['Credencial'];
        }
        if ((isset($report['creado1']) and $report['creado1'] !== null and $report['creado1'] !== "") and ( isset($report['creado2']) and $report['creado2'] !== null and $report['creado2'] !== "")) {
          $where[credencialTableClass::CREATED_AT] = array(
              date(config::getFormatTimestamp(), strtotime($report['creado1'] . '00:00:00')),
              date(config::getFormatTimestamp(), strtotime($report['creado2'] . '23:59:59'))
          );
        }
        if ((isset($report['editado1']) and $report['editado1'] !== null and $report['editado1'] !== "") and ( isset($report['editado2']) and $report['editado2'] !== null and $report['editado2'] !== "")) {
          $where[credencialTableClass::UPDATED_AT] = array(
              date(config::getFormatTimestamp(), strtotime($report['editado1'] . '00:00:00')),
              date(config::getFormatTimestamp(), strtotime($report['editado2'] . '23:59:59'))
          );
        }
      }
      $orderBy = array(
          credencialTableClass::ID
      );
      $fields = array(
          credencialTableClass::ID,
          credencialTableClass::NOMBRE,
          credencialTableClass::CREATED_AT,
          credencialTableClass::UPDATED_AT
      );
      $this->objCredencial = credencialTableClass::getAll($fields, FALSE, $orderBy, 'ASC', NULL, NULL, $where);
      $this->defineView('index', 'credencial', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}