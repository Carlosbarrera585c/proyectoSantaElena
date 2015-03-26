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
        if (isset($filter['RSocial']) and $filter['RSocial'] !== null and $filter['RSocial'] !== "") {
          $where[proveedorTableClass::RAZON_SOCIAL] = $filter['RSocial'];
        }
        if (isset($filter['Direccion']) and $filter['Direccion'] !== null and $filter['Direccion'] !== "") {
          $where[proveedorTableClass::DIRECCION] = $filter['Direccion'];
        }
        if (isset($filter['Telefono']) and $filter['Telefono'] !== null and $filter['Telefono'] !== "") {
          $where[proveedorTableClass::TELEFONO] = $filter['Telefono'];
        }
        if (isset($filter['Ciudad']) and $filter['Ciudad'] !== null and $filter['Ciudad'] !== "") {
          $where[proveedorTableClass::CIUDAD_ID] = $filter['Ciudad'];
        }
        session::getInstance()->setAttribute('proveedorIndexFilters', $where);
      } else if (session::getInstance()->hasAttribute('proveedorIndexFilters')) {
        $where = session::getInstance()->getAttribute('proveedorIndexFilters');
      }
      $fields = array(
          proveedorTableClass::ID,
          proveedorTableClass::RAZON_SOCIAL,
          proveedorTableClass::DIRECCION,
          proveedorTableClass::TELEFONO,
          proveedorTableClass::CIUDAD_ID
         
          
      );
      $orderBy = array(
          proveedorTableClass::RAZON_SOCIAL
      );
      $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }
      $this->cntPages = proveedorTableClass:: getTotalPages(config::getRowGrid(), $where);
      $this->objProveedor = proveedorTableClass::getAll($fields, false, $orderBy, 'ASC', config::getRowGrid(),$page, $where);
      $this->defineView('index', 'proveedor', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}
