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
          if ((isset($filter['hora1']) and $filter['hora1'] !== null and $filter['hora1'] !== "") and (isset($filter['hora2']) and $filter['hora2'] !== null and $filter['hora2'] !== "")) {
          $where[panelaTableClass::HORA] = array(
          date(config::getFormatTimestamp(), strtotime($filter['hora1'])),
          date(config::getFormatTimestamp(), strtotime($filter['hora2']))
          );
}
        session::getInstance()->setAttribute('panelaIndexFilters', $where);
      } else if (session::getInstance()->hasAttribute('panelaIndexFilters')) {
        $where = session::getInstance()->getAttribute('panelaIndexFilters');
      }
      $fields = array(
          panelaTableClass::ID,
          panelaTableClass::HORA,
          panelaTableClass::PROVEEDOR_ID,
          panelaTableClass::SEDIMENTO,
          panelaTableClass::CONTROL_ID
      );
      $orderBy = array(
          panelaTableClass::ID,
      );
      $page = 0;
      if (request::getInstance()->hasGet('page')) {
        $this->page = request::getInstance()->getGet('page');
        $page = request::getInstance()->getGet('page') - 1;
        $page = $page * config::getRowGrid();
      }
      $this->cntPages = panelaTableClass::getTotalPages(config::getRowGrid(), $where);
      $this->objPanela = panelaTableClass::getAll($fields, false, $orderBy, 'ASC', config::getRowGrid(), $page, $where);
      $this->defineView('index', 'panela', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
