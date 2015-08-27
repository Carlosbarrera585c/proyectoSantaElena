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
          $where[clarificacionTableClass::FECHA] = array(
              $report['fecha1'],
              $report['fecha2']
          );
        }
      }
      $orderBy = array(
          clarificacionTableClass::ID
      );
      $fields = array(
          clarificacionTableClass::ID,
          clarificacionTableClass::FECHA,
          clarificacionTableClass::NUM_BACHE,
          clarificacionTableClass::TURNO,
          clarificacionTableClass::EMPLEADO_ID,
          clarificacionTableClass::PROVEEDOR_ID,
          clarificacionTableClass::BRIX,
          clarificacionTableClass::PH_DILUIDO,
          clarificacionTableClass::PH_CLARIFICADO,
          clarificacionTableClass::CAL_DOSIFICADA,
          clarificacionTableClass::FLOCULANTE
      );
      $this->objClarificacion = clarificacionTableClass::getAll($fields, FALSE, $orderBy, 'ASC', NULL, NULL, $where);
      $this->defineView('index', 'clarificacion', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}

//if (isset($report['fecha1']) and $report['fecha1'] !== NULL and $report['fecha1'] !== '' and isset($report['fecha2']) and $report['fecha2'] !== NULL and $report['fecha2'] !== '') {
//          $where[animalTableClass::FECHA_INGRESO] = array(
//              $report['fecha1'],
//              $report['fecha2']
////                        date(config::getFormatTimestamp(),  strtotime($report['fecha1']. ' 00:00:00')) se puede de dos maneras
////                        date(config::getFormatTimestamp(),  strtotime($report['fecha2']. ' 23:59:59'))