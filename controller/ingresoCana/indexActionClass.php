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
        if ((isset($filter['fecha1']) and $filter['fecha1'] !== null and $filter['fecha1'] !== "") and ( isset($filter['fecha2']) and $filter['fecha2'] !== null and $filter['fecha2'] !== "")) {
          $where[ingresoCanaTableClass::FECHA] = array(
              date(config::getFormatTimestamp(), strtotime($filter['fecha1'])),
              date(config::getFormatTimestamp(), strtotime($filter['fecha2']))
          );
        }
        if (isset($filter['Empleado']) and $filter['Empleado'] !== null and $filter['Empleado'] !== "") {
          $where[ingresoCanaTableClass::EMPLEADO_ID] = $filter['Empleado'];
        }
        if (isset($filter['Proveedor']) and $filter['Proveedor'] !== null and $filter['Proveedor'] !== "") {
          $where[ingresoCanaTableClass::PROVEEDOR_ID] = $filter['Proveedor'];
        }
        if (isset($filter['Cantidad']) and $filter['Cantidad'] !== null and $filter['Cantidad'] !== "") {
          $where[ingresoCanaTableClass::CANTIDAD] = $filter['Cantidad'];
        }
        if (isset($filter['Peso']) and $filter['Peso'] !== null and $filter['Peso'] !== "") {
          $where[ingresoCanaTableClass::PESO_CAÑA] = $filter ['Peso'];
        }
        if (isset($filter['Vagon']) and $filter['Vagon'] !== null and $filter['Vagon'] !== "") {
          $where[ingresoCanaTableClass::NUM_VAGON] = $filter ['Vagon'];
        }
        session::getInstance()->setAttribute('ingresoCanaIndexFilters', $where);
      } else if (session::getInstance()->hasAttribute('ingresoCanaIndexFilters')) {
        $where = session::getInstance()->getAttribute('ingresoCanaIndexFilters');
      }
      $fields = array(
          ingresoCanaTableClass::ID,
          ingresoCanaTableClass::FECHA,
          ingresoCanaTableClass::EMPLEADO_ID,
          ingresoCanaTableClass::PROVEEDOR_ID,
          ingresoCanaTableClass::CANTIDAD,
          ingresoCanaTableClass::PESO_CAÑA,
          ingresoCanaTableClass::NUM_VAGON,
      );
      $orderBy = array(
          ingresoCanaTableClass::ID,
      );
      $page = 0;
      if (request::getInstance()->hasGet('page')) {
        $this->page = request::getInstance()->getGet('page');
        $page = request::getInstance()->getGet('page') - 1;
        $page = $page * config::getRowGrid();
      }
      $this->cntPages = ingresoCanaTableClass::getTotalPages(config::getRowGrid(), $where);
      $this->objingresoCana = ingresoCanaTableClass::getAll($fields, false, $orderBy, 'ASC', config::getRowGrid(), $page, $where);
      $this->defineView('index', 'ingresoCana', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
