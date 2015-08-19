<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Mieles
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      $where = null;
      if (request::getInstance()->hasPost('filter') and request::getInstance()->isMethod('POST')) {
        $filter = request::getInstance()->getPost('filter');
        
        if ((isset($filter['Fecha1']) and $filter['Fecha1'] !== null and $filter['Fecha1'] !== "") and ( isset($filter['Fecha2']) and $filter['Fecha2'] !== null and $filter['Fecha2'] !== "")) {
          $where[mielesTableClass::FECHA] = array(
              date(config::getFormatTimestamp(), strtotime($filter['Fecha1'])),
              date(config::getFormatTimestamp(), strtotime($filter['Fecha2']))
          );
        }
//        $where[mielesTableClass::Turno] = $filter['Turno'];
        //aqui validar datos

        session::getInstance()->setAttribute('mielesIndexFilters', $where);
      } else if (session::getInstance()->hasAttribute('mielesIndexFilters')) {
        $where = session::getInstance()->getAttribute('mielesIndexFilters');
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
          mielesTableClass::OBSERVACION,
      );
      $page = 0;
      if (request::getInstance()->hasGet('page')) {
        $this->page = request::getInstance()->getGet('page');
        $page = request::getInstance()->getGet('page') - 1;
        $page = $page * config::getRowGrid();
      }
      $this->cntPages = mielesTableClass::getTotalPages(config::getRowGrid(), $where);
      $this->objMieles = mielesTableClass::getAll($fields, false, $orderBy, 'ASC', config::getRowGrid(), $page, $where);
      session::getInstance()->deleteAttribute('mielesIndexFilters');
      $this->defineView('index', 'mieles', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }


  }

