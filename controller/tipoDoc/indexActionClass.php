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
 * @author Cristian Ramirez <cristianRamirezXD@outlook.es>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

        $where = null;
          if (request::getInstance()->hasPost('filter')) {
        $filter = request::getInstance()->getPost('filter');
//aqui validar datos
        
        if (isset($filter['descripcion']) and $filter['descripcion'] !== null and $filter['descripcion'] !== "") {
          $where[tipoDocTableClass::DESC_TIPO_DOC] = $filter['descripcion'];
        }
        
      } else if (session::getInstance()->hasAttribute('tipoDocIndexFilters')) {
        $where = session::getInstance()->getAttribute('tipoDocIndexFilters');
      }
        
      $fields = array(
          tipoDocTableClass::ID,
          tipoDocTableClass::DESC_TIPO_DOC
      );
      $orderBy = array(
          tipoDocTableClass::DESC_TIPO_DOC
      );
      
         $page = 0;
      if (request::getInstance()->hasGet('page')) {
        $this->page = request::getInstance()->getGet('page');
        $page = request::getInstance()->getGet('page') - 1;
        $page = $page * config::getRowGrid();
      }
      
        $this->cntPages = tipoDocTableClass:: getTotalPages(config::getRowGrid(), $where);
      
      $this->objTipoDoc = tipoDocTableClass::getAll($fields, false, null, null, config::getRowGrid(), $page, $where);
      $this->defineView('index', 'tipoDoc', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}
