<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Tipo Identificación
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class viewActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      $id = request::getInstance()->getRequest(tipoIdTableClass::ID, true);
      $fields = array(
          tipoIdTableClass::ID,
          tipoIdTableClass::DESC_TIPO_ID
      );
      $where = array(
          tipoIdTableClass::ID => $id
      );
      $this->objTipoId = tipoIdTableClass::getAll($fields, false, null, null, null, null, $where);
      $this->defineView('view', 'tipoId', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
    }
  }

}
