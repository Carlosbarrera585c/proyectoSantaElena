<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

class reportActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      $where = NULL;
      if (request::getInstance()->hasPost('report')) {
        $report = request::getInstance()->getPost('report');
        // aqui validar datos de filtros
        if (isset($report['RSocial']) and $report['RSocial'] !== NULL and $report['RSocial'] !== '') {
          $where[proveedorTableClass::RAZON_SOCIAL] = $report['RSocial'];
        }
        if (isset($report['Direccion']) and $report['Direccion'] !== NULL and $report['Direccion'] !== '') {
          $where[proveedorTableClass::DIRECCION] = $report['Direccion'];
        }
        if (isset($report['Telefono']) and $report['Telefono'] !== NULL and $report['Telefono'] !== '') {
          $where[proveedorTableClass::TELEFONO] = $report['Telefono'];
        }
        if (isset($report['Procedencia']) and $report['Procedencia'] !== NULL and $report['Procedencia'] !== '') {
          $where[proveedorTableClass::PROCEDENCIA_CAÑA] = $report['Procedencia'];
        }
        $fields = array(
            proveedorTableClass::ID,
            proveedorTableClass::RAZON_SOCIAL,
            proveedorTableClass::DIRECCION,
            proveedorTableClass::TELEFONO
        );

        $orderBy = array(
            proveedorTableClass::ID
        );
        $this->objProveedor = proveedorTableClass::getAll($fields, FALSE, $orderBy, 'ASC', NULL, NULL, $where);
        $this->defineView('report', 'proveedor', session::getInstance()->getFormatOutput());
      }
    } catch (PDOException $exc) {
      echo $exc->getMessage() . "<BR>" . print_r($exc->getTraceAsString());
    }
  }

}
