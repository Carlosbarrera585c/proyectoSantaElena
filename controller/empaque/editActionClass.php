
<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Empleado
 *
 * @author Cristian Ramirez <cristianxdramirez@gmail.com>
 */
class editActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasRequest(empaqueTableClass::ID)) {
        $fields = array(
            empaqueTableClass::ID,
            empaqueTableClass::FECHA,
            empaqueTableClass::CANTIDAD,
            empaqueTableClass::EMPLEADO_ID,
            empaqueTableClass::TIPO_EMPAQUE_ID,
            empaqueTableClass::INSUMO_ID
        );
        $where = array(
            empaqueTableClass::ID => request::getInstance()->getRequest(empaqueTableClass::ID)
        );

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
        $this->objEmpaque = empaqueTableClass::getAll($fields, NULL, NULL, NULL, NULL, NULL, $where);
        $this->defineView('edit', 'empaque', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('empaque', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
