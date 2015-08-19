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
 * @author Cristian Ramirez <ccristianramirezc@gmail.com>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      $where = null;
      if (request::getInstance()->hasPost('filter')) {
        $filter = request::getInstance()->getPost('filter');

        if (isset($filter['humedad']) and $filter['humedad'] !== null and $filter['humedad'] !== "") {
          $where[cachazaTableClass::HUMEDAD] = $filter['humedad'];
        }
        if (isset($filter['sacaroza']) and $filter['sacaroza'] !== null and $filter['sacaroza'] !== "") {
          $where[cachazaTableClass::SACAROZA] = $filter['sacaroza'];
        }
        session::getInstance()->setAttribute('cachazaIndexFilters', $where);
      } else if (session::getInstance()->hasAttribute('cachazaIndexFilters')) {
        $where = session::getInstance()->getAttribute('cachazaIndexFilters');
      }
      $fields = array(
          cachazaTableClass::ID,
          cachazaTableClass::HUMEDAD,
          cachazaTableClass::SACAROZA,
          cachazaTableClass::CONTROL_ID
      );
      $orderBy = array(
          cachazaTableClass::ID,
      );
      $page = 0;
      if (request::getInstance()->hasGet('page')) {
        $this->page = request::getInstance()->getGet('page');
        $page = request::getInstance()->getGet('page') - 1;
        $page = $page * config::getRowGrid();
      }
      $this->cntPages = cachazaTableClass::getTotalPages(config::getRowGrid(), $where);
      $this->objCachaza = cachazaTableClass::getAll($fields, false, $orderBy, 'ASC', config::getRowGrid(), $page, $where);
      $this->defineView('index', 'cachaza', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
