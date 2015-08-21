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
        if (isset($report['Fecha']) and $report['Fecha'] !== NULL and $report['Fecha'] !== '') {
          $where[mielesTableClass::FECHA] = $report['Fecha'];
        }
        if (isset($report['Turno']) and $report['Turno'] !== NULL and $report['Turno'] !== '') {
          $where[mielesTableClass::TURNO] = $report['Turno'];
        }
        if (isset($report['EmpleadoId']) and $report['EmpleadoId'] !== NULL and $report['EmpleadoId'] !== '') {
          $where[mielesTableClass::EMPLEADO_ID] = $report['EmpleadoId'];
        }
        if (isset($report['NumCeba']) and $report['NumCeba'] !== NULL and $report['NumCeba'] !== '') {
          $where[mielesTableClass::NUM_CEBA] = $report['NumCeba'];
        }
        if (isset($report['Caja']) and $report['Caja'] !== NULL and $report['Caja'] !== '') {
          $where[mielesTableClass::CAJA] = $report['Caja'];
        }
        if (isset($report['Observacion']) and $report['Observacion'] !== NULL and $report['Observacion'] !== '') {
          $where[mielesTableClass::OBSERVACION] = $report['Observacion'];
        }
        if (isset($report['Correo']) and $report['Correo'] !== NULL and $report['Correo'] !== '') {
          $where[mielesTableClass::CORREO] = $report['Correo'];
        }
      }
      $orderBy = array(
          mielesTableClass::ID
      );
      $fields = array(
          mielesTableClass::ID,
          mielesTableClass::FECHA,
          mielesTableClass::TURNO,
          mielesTableClass::EMPLEADO_ID,
          mielesTableClass::NUM_CEBA,
          mielesTableClass::CAJA,
          mielesTableClass::OBSERVACION
      );
      $this->objMieles = mielesTableClass::getAll($fields, FALSE, $orderBy, 'ASC', NULL, NULL, $where);
      $this->defineView('index', 'mieles', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}

//if (isset($report['fechaCreacion1']) and $report['fechaCreacion1'] !== NULL and $report['fechaCreacion1'] !== '' and isset($report['fechaCreacion2']) and $report['fechaCreacion2'] !== NULL and $report['fechaCreacion2'] !== '') {
//          $where[animalTableClass::FECHA_INGRESO] = array(
//              $report['fechaCreacion1'],
//              $report['fechaCreacion2']
////                        date(config::getFormatTimestamp(),  strtotime($report['fechaCreacion1']. ' 00:00:00')) se puede de dos maneras
////                        date(config::getFormatTimestamp(),  strtotime($report['fechaCreacion2']. ' 23:59:59'))