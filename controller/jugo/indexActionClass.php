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

        if (isset($filter['procedencia']) and $filter['procedencia'] !== null and $filter['procedencia'] !== "") {
          $where[jugoTableClass::PROCEDENCIA] = $filter['procedencia'];
        }
        if (isset($filter['brix']) and $filter['brix'] !== null and $filter['brix'] !== "") {
          $where[jugoTableClass::BRIX] = $filter['brix'];
        }
        if (isset($filter['ph']) and $filter['ph'] !== null and $filter['ph'] !== "") {
          $where[jugoTableClass::PH] = $filter['ph'];
        }
        
        session::getInstance()->setAttribute('jugoIndexFilters', $where);
      } else if (session::getInstance()->hasAttribute('jugoIndexFilters')) {
        $where = session::getInstance()->getAttribute('jugoIndexFilters');
      }
	  
	  $fields = array(
                     proveedorTableClass::ID,
                     proveedorTableClass::RAZON_SOCIAL
                );
                
                $this->objProveedor = proveedorTableClass::getAll($fields, false);
	  
      $fields = array(
          jugoTableClass::ID,
          jugoTableClass::PROCEDENCIA,
          jugoTableClass::BRIX,
          jugoTableClass::PH,
          jugoTableClass::CONTROL_ID
      );
      $orderBy = array(
          jugoTableClass::ID,
      );
      $page = 0;
      if (request::getInstance()->hasGet('page')) {
        $this->page = request::getInstance()->getGet('page');
        $page = request::getInstance()->getGet('page') - 1;
        $page = $page * config::getRowGrid();
      }
      $this->cntPages = jugoTableClass::getTotalPages(config::getRowGrid(), $where);
      $this->objJugo = jugoTableClass::getAll($fields, false, $orderBy, 'ASC', config::getRowGrid(), $page, $where);
      $this->defineView('index', 'jugo', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
