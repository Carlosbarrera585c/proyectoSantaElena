<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author Bayron Henao <bairon_henao_1995@hotmail.com>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

   public function execute() {
    try {
        $where = null;
      if (request::getInstance()->hasPost('filter')) {
        $filter = request::getInstance()->getPost('filter');
//aqui validar datos
        if ((isset($filter['fecha1']) and $filter['fecha1'] !== null and $filter['fecha1'] !== "") and (isset($filter['fecha2']) and $filter['fecha2'] !== null and $filter['fecha2'] !== "")) {
          $where[ingresoCañaTableClass::FECHA] = array(
          date(config::getFormatTimestamp(), strtotime($filter['fecha1'])),
          date(config::getFormatTimestamp(), strtotime($filter['fecha2']))
          );
        }
        if (isset($filter['Empleado']) and $filter['Empleado'] !== null and $filter['Empleado'] !== "") {
          $where[ingresoCañaTableClass::EMPLEADO_ID] = $filter['Empleado'];
        }
        if (isset($filter['Proveedor']) and $filter['Proveedor'] !== null and $filter['Proveedor'] !== "") {
          $where[ingresoCañaTableClass::PROVEEDOR_ID] = $filter['Proveedor'];
        }
        if (isset($filter['Cantidad']) and $filter['Cantidad'] !== null and $filter['Cantidad'] !== "") {
          $where[ingresoCañaTableClass::CANTIDAD] = $filter['Cantidad'];
        }
        if (isset($filter['Procedencia']) and $filter['Procedencia'] !== null and $filter['Procedencia'] !== "") {
          $where[ingresoCañaTableClass::PROCEDENCIA_CAÑA] = $filter['Procedencia'];
        }
        if (isset($filter['Peso']) and $filter['Peso'] !== null and $filter['Peso'] !== "") {
          $where[ingresoCañaTableClass::PESO_CAÑA] = $filter ['Peso'];
        }
        if (isset($filter['Vagon']) and $filter['Vagon'] !== null and $filter['Vagon'] !== "") {
          $where[ingresoCañaTableClass::NUM_VAGON] = $filter ['Vagon'];
        }
        session::getInstance()->setAttribute('ingresoCañaIndexFilters', $where);
      } else if (session::getInstance()->hasAttribute('ingresoCañaIndexFilters')) {
        $where = session::getInstance()->getAttribute('ingresoCañaIndexFilters');
      }
      $fields = array(
      ingresoCañaTableClass::ID,
      ingresoCañaTableClass::FECHA,
      ingresoCañaTableClass::EMPLEADO_ID,
      ingresoCañaTableClass::PROVEEDOR_ID,
      ingresoCañaTableClass::CANTIDAD,
      ingresoCañaTableClass::PROCEDENCIA_CAÑA,
      ingresoCañaTableClass::PESO_CAÑA,
      ingresoCañaTableClass::NUM_VAGON,
      );
      $orderBy = array(
          ingresoCañaTableClass::ID,
      );
      $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }
            $this->cntPages = ingresoCañaTableClass:: getTotalPages(config::getRowGrid(), $where);
      $this->objIngresoCaña = ingresoCañaTableClass::getAll($fields, false, $orderBy, 'ASC');
      $this->defineView('index', 'ingresoCaña', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}