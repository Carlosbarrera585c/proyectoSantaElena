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
        if (isset($report['fechaCreacion1']) and $report['fechaCreacion1'] !== NULL and $report['fechaCreacion1'] !== '' and isset($report['fechaCreacion2']) and $report['fechaCreacion2'] !== NULL and $report['fechaCreacion2'] !== '') {
          $where[controlCalidadTableClass::FECHA] = array(
              $report['fechaCreacion1'],
              $report['fechaCreacion2']
          );
        }
        if (isset($report['Turno']) and $report['Turno'] !== NULL and $report['Turno'] !== '') {
          $where[controlCalidadTableClass::TURNO] = $report['Turno'];
        }
        if (isset($report['Brix']) and $report['Brix'] !== NULL and $report['Brix'] !== '') {
          $where[controlCalidadTableClass::BRIX] = $report['Brix'];
        }
        if (isset($report['Ph']) and $report['Ph'] !== NULL and $report['Ph'] !== '') {
          $where[controlCalidadTableClass::PH] = $report['Ph'];
        }
        if (isset($report['Ar']) and $report['Ar'] !== NULL and $report['Ar'] !== '') {
          $where[controlCalidadTableClass::AR] = $report['Ar'];
        }
        if (isset($report['Sacarosa']) and $report['Sacarosa'] !== NULL and $report['Sacarosa'] !== '') {
          $where[controlCalidadTableClass::SACAROSA] = $report['Sacarosa'];
        }
        if (isset($report['Pureza']) and $report['Pureza'] !== NULL and $report['Pureza'] !== '') {
          $where[controlCalidadTableClass::PUREZA] = $report['Pureza'];
        }
        if (isset($report['Empleado']) and $report['Empleado'] !== NULL and $report['Empleado'] !== '') {
          $where[controlCalidadTableClass::EMPLEADO_ID] = $report['Empleado'];
        }
        if (isset($report['Proveedor']) and $report['Proveedor'] !== NULL and $report['Proveedor'] !== '') {
          $where[controlCalidadTableClass::PROVEEDOR_ID] = $report['Proveedor'];
        }
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

        $orderBy = array(
            controlCalidadTableClass::ID
        );
        $this->objControlCalidad = controlCalidadTableClass::getAll($fields, FALSE, $orderBy, 'ASC', NULL, NULL, $where);
        $this->defineView('report', 'controlCalidad', session::getInstance()->getFormatOutput());
      }
//            $fields = array(
//            controlCalidadTableClass::ID,
//            controlCalidadTableClass::NOMBRE,
//            controlCalidadTableClass::GENERO,
//            controlCalidadTableClass::EDAD,
//            controlCalidadTableClass::PESO,
//            controlCalidadTableClass::FECHA_INGRESO,
//            controlCalidadTableClass::NUMERO_PARTOS,
//            controlCalidadTableClass::ID_RAZA,
//            controlCalidadTableClass::ID_ESTADO
//            );
//            $orderBy = array(
//            controlCalidadTableClass::ID
//            );
//            $page = 0;
//            if(request::getInstance()->hasGet('page')){
//                $this->page = request::getInstance()->getGet('page');
//                $page = request::getInstance()->getGet('page') - 1;
//                $page = $page * config::getRowGrid();
//            }
//            $this->cntPages = controlCalidadTableClass::getTotalPages(config::getRowGrid(),$where);
//            $this->objAnimal = controlCalidadTableClass::getAll($fields, FALSE ,$orderBy,'ASC', config::getRowGrid(),$page,$where);
//            $this->defineView('index', 'animal',  session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage() . "<BR>" . print_r($exc->getTraceAsString());
    }
  }

}
