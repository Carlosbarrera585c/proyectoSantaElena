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
        if (isset($filter['Humedad']) and $filter['Humedad'] !== null and $filter['Humedad'] !== "") {
          $where[bagazoTableClass::HUMEDAD] = $filter['Humedad'];
        }
        if (isset($filter['Brix']) and $filter['Brix'] !== null and $filter['Brix'] !== "") {
          $where[bagazoTableClass::BRIX] = $filter['Brix'];
        }
        if (isset($filter['Sacarosa']) and $filter['Sacarosa'] !== null and $filter['Sacarosa'] !== "") {
          $where[bagazoTableClass::SACAROSA] = $filter['Sacarosa'];
        }
        
        session::getInstance()->setAttribute('bagazoIndexFilters', $where);
      } else if (session::getInstance()->hasAttribute('bagazoIndexFilters')) {
        $where = session::getInstance()->getAttribute('bagazoIndexFilters');
      }
      $fields = array(
          bagazoTableClass::ID,
          bagazoTableClass::HUMEDAD,
		  bagazoTableClass::BRIX,
		  bagazoTableClass::SACAROSA
      );
      $orderBy = array(
          bagazoTableClass::ID,
      );
      $page = 0;
      if (request::getInstance()->hasGet('page')) {
        $this->page = request::getInstance()->getGet('page');
        $page = request::getInstance()->getGet('page') - 1;
        $page = $page * config::getRowGrid();
      }
      $this->cntPages = bagazoTableClass::getTotalPages(config::getRowGrid(), $where);
      $this->objBagazo = bagazoTableClass::getAll($fields, false, $orderBy, 'ASC', config::getRowGrid(), $page, $where);
      $this->defineView('index', 'bagazo', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
