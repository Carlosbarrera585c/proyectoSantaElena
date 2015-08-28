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
          $where[ingresoCanaTableClass::FECHA] = array(
              $report['fechaCreacion1'],
              $report['fechaCreacion2']
          );
        }
        if (isset($report['Empleado']) and $report['Empleado'] !== NULL and $report['Empleado'] !== '') {
          $where[ingresoCanaTableClass::EMPLEADO_ID] = $report['Empleado'];
        }
        if (isset($report['Proveedor']) and $report['Proveedor'] !== NULL and $report['Proveedor'] !== '') {
          $where[ingresoCanaTableClass::PROVEEDOR_ID] = $report['Proveedor'];
        }
        if (isset($report['Cantidad']) and $report['Cantidad'] !== NULL and $report['Cantidad'] !== '') {
          $where[ingresoCanaTableClass::CANTIDAD] = $report['Cantidad'];
        }
        if (isset($report['Peso']) and $report['Peso'] !== NULL and $report['Peso'] !== '') {
          $where[ingresoCanaTableClass::PESO_CAÑA] = $report['Peso'];
        }
        if (isset($report['Vagon']) and $report['Vagon'] !== NULL and $report['Vagon'] !== '') {
          $where[ingresoCanaTableClass::NUM_VAGON] = $report['Vagon'];
        }
        $fields = array(
            ingresoCanaTableClass::ID,
            ingresoCanaTableClass::FECHA,
            ingresoCanaTableClass::EMPLEADO_ID,
            ingresoCanaTableClass::PROVEEDOR_ID,
            ingresoCanaTableClass::CANTIDAD,
            ingresoCanaTableClass::PESO_CAÑA,
            ingresoCanaTableClass::NUM_VAGON
        );

        $orderBy = array(
            ingresoCanaTableClass::ID
        );
        $this->objingresoCana = ingresoCanaTableClass::getAll($fields, FALSE, $orderBy, 'ASC', NULL, NULL, $where);
        $this->defineView('report', 'ingresoCana', session::getInstance()->getFormatOutput());
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
