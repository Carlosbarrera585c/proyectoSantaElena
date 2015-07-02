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
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class viewActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      $id = request::getInstance()->getRequest(usuarioTableClass::ID, TRUE);
      $fields = array(
          usuarioTableClass::ID,
          usuarioTableClass::USER,
          usuarioTableClass::ACTIVED,
          usuarioTableClass::CREATED_AT,
          usuarioTableClass::UPDATED_AT,
          usuarioTableClass::DELETED_AT
      );
      $orderBy = array(
          usuarioTableClass::ID
      );
      $where = array(
          usuarioTableClass::ID => $id
      );
      $this->objUsuarios = usuarioTableClass::getAll($fields, true, $orderBy, 'ASC', null, null, $where);
      $this->defineView('view', 'usuario', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
