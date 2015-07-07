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
class deleteSelectActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST') and request::getInstance()->hasPost('chk')) {

        $idsToDelete = request::getInstance()->getPost('chk');

        foreach ($idsToDelete as $id) {
          $ids = array(
              usuarioTableClass::ID => $id
          );
          usuarioTableClass::delete($ids, true);
        }
        session::getInstance()->setSuccess(i18n::__('successfulDelete'));
        routing::getInstance()->redirect('usuario', 'index');
      } else {
        routing::getInstance()->redirect('usuario', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
      switch ($exc->getCode()) {
        case 23503:
          session::getInstance()->setError(i18n::__('errorDeleteForeign'));
          routing::getInstance()->redirect('usuario', 'index');
          break;
        case 00000:
          break;
      }
    }
  }

}
