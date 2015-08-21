<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Mieles
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class viewActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      $id = request::getInstance()->getRequest(mielesTableClass::ID, TRUE);
      $fields = array(
          mielesTableClass::ID,
          mielesTableClass::FECHA,
          mielesTableClass::TURNO,
          mielesTableClass::EMPLEADO_ID,
          mielesTableClass::NUM_CEBA,
          mielesTableClass::CAJA,
          mielesTableClass::OBSERVACION
      );
      $where = array(
          mielesTableClass::ID => $id
      );
      $this->objMieles = mielesTableClass::getAll($fields, false, null, null, null, null, $where);
      $this->defineView('view', 'mieles', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
