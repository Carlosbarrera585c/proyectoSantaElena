<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Empleado
 *
 * @author Cristian Ramirez <cristianxdramirez@gmail.com>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      $where = null;
      if (request::getInstance()->hasPost('filter')) {
        $filter = request::getInstance()->getPost('filter');
//aqui validar datos
       if ((isset($filter['fecha1']) and $filter['fecha1'] !== null and $filter['fecha1'] !== "") and (isset($filter['fecha2']) and $filter['fecha2'] !== null and $filter['fecha2'] !== "")) {
          $where[empaqueTableClass::FECHA] = array(
          date(config::getFormatTimestamp(), strtotime($filter['fecha1'] . '00:00:00')),
          date(config::getFormatTimestamp(), strtotime($filter['fecha2'] . '23:59:59'))
          );
        }
        if (isset($filter['cantidad']) and $filter['cantidad'] !== null and $filter['cantidad'] !== "") {
          $where[empaqueTableClass::CANTIDAD] = $filter['cantidad'];
        }
        
        session::getInstance()->setAttribute('empaqueIndexFilters', $where);
      } else if (session::getInstance()->hasAttribute('empaqueIndexFilters')) {
        $where = session::getInstance()->getAttribute('empaqueIndexFilters');
      }
      $orderBy = array(
          empaqueTableClass::ID
      );
      $fields = array(
          empaqueTableClass::ID,
          empaqueTableClass::FECHA,
          empaqueTableClass::EMPLEADO_ID,
          empaqueTableClass::CANTIDAD,
          empaqueTableClass::INSUMO_ID
      );
      $page = 0;
      if (request::getInstance()->hasGet('page')) {
        $this->page = request::getInstance()->getGet('page');
        $page = request::getInstance()->getGet('page') - 1;
        $page = $page * config::getRowGrid();
      }
      $this->cntPages = empaqueTableClass::getTotalPages(config::getRowGrid(), $where);
      $this->objEmpaque = empaqueTableClass::getAll($fields, false, $orderBy, 'ASC', config::getRowGrid(), $page, $where);
      $this->defineView('index', 'empaque', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
    }
  }

}
