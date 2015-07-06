<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Empaque
 *
 * @author Cristian Ramirez <cristianxdramirez@gmail.com>
 */
class insertActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      $fieldsEmpleado = array(
          empleadoTableClass::ID,
          empleadoTableClass::NOM_EMPLEADO
      );
      $fieldsTipoEmpaque = array(
          tipoEmpaqueTableClass::ID,
          tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE
      );
       $fieldsInsumo = array(
           insumoTableClass::ID,
           insumoTableClass::DESC_INSUMO
      );

      $this->objEmpleado = empleadoTableClass::getAll($fieldsEmpleado);
      $this->objTipoEmpaque = tipoEmpaqueTableClass::getAll($fieldsTipoEmpaque);
      $this->objInsumo = insumoTableClass::getAll($fieldsInsumo);
      $this->defineView('insert', 'empaque', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
