
<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Clarificacion
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class editActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasGet(clarificacionTableClass::ID)) {
        $fields = array(
            clarificacionTableClass::ID,
            clarificacionTableClass::FECHA,
            clarificacionTableClass::NUM_BACHE,
            clarificacionTableClass::TURNO,
            clarificacionTableClass::EMPLEADO_ID,
            clarificacionTableClass::PROVEEDOR_ID,
            clarificacionTableClass::BRIX,
            clarificacionTableClass::PH_DILUIDO,
            clarificacionTableClass::PH_CLARIFICADO,
            clarificacionTableClass::CAL_DOSIFICADA,
            clarificacionTableClass::FLOCULANTE
        );
        $where = array(
            clarificacionTableClass::ID => request::getInstance()->getGet(clarificacionTableClass::ID)
        );

        $fieldsEmpleado = array(
            empleadoTableClass::ID,
            empleadoTableClass::NOM_EMPLEADO
        );
        $fieldsProveedor = array(
            proveedorTableClass::ID,
            proveedorTableClass::RAZON_SOCIAL
        );

        $this->objEmpleado = empleadoTableClass::getAll($fieldsEmpleado);
        $this->objProveedor = proveedorTableClass::getAll($fieldsProveedor);
        $this->objClarificacion = clarificacionTableClass::getAll($fields, NULL, NULL, NULL, NULL, NULL, $where);
        $this->defineView('edit', 'clarificacion', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('clarificacion', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
