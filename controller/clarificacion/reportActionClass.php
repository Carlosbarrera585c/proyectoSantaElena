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
        if (isset($report['Nombre']) and $report['Nombre'] !== NULL and $report['Nombre'] !== '') {
          $where[empleadoTableClass::NOM_EMPLEADO] = $report['Nombre'];
        }
        if (isset($report['Apellido']) and $report['Apellido'] !== NULL and $report['Apellido'] !== '') {
          $where[empleadoTableClass::APELL_EMPLEADO] = $report['Apellido'];
        }
        if (isset($report['NumIdentificacion']) and $report['NumIdentificacion'] !== NULL and $report['NumIdentificacion'] !== '') {
          $where[empleadoTableClass::NUMERO_IDENTIFICACION] = $report['NumIdentificacion'];
        }
        if (isset($report['Telefono']) and $report['Telefono'] !== NULL and $report['Telefono'] !== '') {
          $where[empleadoTableClass::TELEFONO] = $report['Telefono'];
        }
        if (isset($report['Direccion']) and $report['Direccion'] !== NULL and $report['Direccion'] !== '') {
          $where[empleadoTableClass::DIRECCION] = $report['Direccion'];
        }
        if (isset($report['Correo']) and $report['Correo'] !== NULL and $report['Correo'] !== '') {
          $where[empleadoTableClass::CORREO] = $report['Correo'];
        }
      }
      $orderBy = array(
          empleadoTableClass::ID
      );
      $fields = array(
          empleadoTableClass::ID,
          empleadoTableClass::NOM_EMPLEADO,
          empleadoTableClass::APELL_EMPLEADO,
          empleadoTableClass::TELEFONO,
          empleadoTableClass::DIRECCION,
          empleadoTableClass::TIPO_ID_ID,
          empleadoTableClass::CREDENCIAL_ID,
          empleadoTableClass::CORREO,
          empleadoTableClass::NUMERO_IDENTIFICACION
      );
      $this->objEmpleado = empleadoTableClass::getAll($fields, FALSE, $orderBy, 'ASC', NULL, NULL, $where);
      $this->defineView('index', 'empleado', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}

//if (isset($report['fechaCreacion1']) and $report['fechaCreacion1'] !== NULL and $report['fechaCreacion1'] !== '' and isset($report['fechaCreacion2']) and $report['fechaCreacion2'] !== NULL and $report['fechaCreacion2'] !== '') {
//          $where[animalTableClass::FECHA_INGRESO] = array(
//              $report['fechaCreacion1'],
//              $report['fechaCreacion2']
////                        date(config::getFormatTimestamp(),  strtotime($report['fechaCreacion1']. ' 00:00:00')) se puede de dos maneras
////                        date(config::getFormatTimestamp(),  strtotime($report['fechaCreacion2']. ' 23:59:59'))