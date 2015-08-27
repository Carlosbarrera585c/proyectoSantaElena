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
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class viewActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      $id = request::getInstance()->getRequest(clarificacionTableClass::ID, TRUE);
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
          clarificacionTableClass::ID => $id
      );
      $this->objClarificacion = clarificacionTableClass::getAll($fields, false, null, null, null, null, $where);
      $this->defineView('view', 'clarificacion', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
