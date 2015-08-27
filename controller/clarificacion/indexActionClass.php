<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Clarificacion
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      $where = null;
      if (request::getInstance()->hasPost('filter') and request::getInstance()->isMethod('POST')) {
        $filter = request::getInstance()->getPost('filter');
        if ((isset($filter['fecha1']) and $filter['fecha1'] !== null and $filter['fecha1'] !== "") and ( isset($filter['fecha2']) and $filter['fecha2'] !== null and $filter['fecha2'] !== "")) {
          $where[clarificacionTableClass::FECHA] = array(
              date(config::getFormatTimestamp(), strtotime($filter['fecha1'] . '00:00:00')),
              date(config::getFormatTimestamp(), strtotime($filter['fecha2'] . '23:59:59'))
          );
        }
        session::getInstance()->setAttribute('clarificacionIndexFilters', $where);
      } else if (session::getInstance()->hasAttribute('clarificacionIndexFilters')) {
        $where = session::getInstance()->getAttribute('clarificacionIndexFilters');
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
      $page = 0;
      if (request::getInstance()->hasGet('page')) {
        $this->page = request::getInstance()->getGet('page');
        $page = request::getInstance()->getGet('page') - 1;
        $page = $page * config::getRowGrid();
      }
      $this->cntPages = clarificacionTableClass::getTotalPages(config::getRowGrid(), $where);
      $this->objClarificacion = clarificacionTableClass::getAll($fields, false, $orderBy, 'ASC', config::getRowGrid(), $page, $where);
      session::getInstance()->deleteAttribute('clarificacionIndexFilters');
      $this->defineView('index', 'clarificacion', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
