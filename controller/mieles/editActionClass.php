
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
class editActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasGet(mielesTableClass::ID)) {
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
            mielesTableClass::ID => request::getInstance()->getGet(mielesTableClass::ID)
        );

        $fieldsEmpleado = array(
            empleadoTableClass::ID,
            empleadoTableClass::NOM_EMPLEADO
        );


        $this->objEmpleado = empleadoTableClass::getAll($fieldsEmpleado);
        $this->objMieles = mielesTableClass::getAll($fields, NULL, NULL, NULL, NULL, NULL, $where);
        $this->defineView('edit', 'mieles', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('mieles', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
