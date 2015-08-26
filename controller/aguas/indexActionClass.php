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
//aqui validar datos
        if (isset($filter['procedencia']) and $filter['procedencia'] !== null and $filter['procedencia'] !== "") {
          $where[aguasTableClass::PROCEDENCIA] = $filter['procedencia'];
        }
        
        session::getInstance()->setAttribute('aguasIndexFilters', $where);
      } else if (session::getInstance()->hasAttribute('aguasIndexFilters')) {
        $where = session::getInstance()->getAttribute('aguasIndexFilters');
      }
      $fields = array(
          aguasTableClass::ID,
          aguasTableClass::PROCEDENCIA,
          aguasTableClass::ARRASTRE_DULCE,
          aguasTableClass::PH,
          aguasTableClass::CLORO_RESIDUAL,
          aguasTableClass::CONTROL_ID,
          aguasTableClass::HORA
      );
      $orderBy = array(
          aguasTableClass::ID,
      );
      $page = 0;
      if (request::getInstance()->hasGet('page')) {
        $this->page = request::getInstance()->getGet('page');
        $page = request::getInstance()->getGet('page') - 1;
        $page = $page * config::getRowGrid();
      }
      $this->cntPages = aguasTableClass::getTotalPages(config::getRowGrid(), $where);
      $this->objAguas = aguasTableClass::getAll($fields, false, $orderBy, 'ASC', config::getRowGrid(), $page, $where);
      $this->defineView('index', 'aguas', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
