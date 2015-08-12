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
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $usuario = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USER, true));
        $password = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true));
        $this->Validate($usuario, $password);

        $data = array(
            usuarioTableClass::USER => $usuario,
            usuarioTableClass::PASSWORD => md5($password)
        );
        usuarioTableClass::insert($data);
        session::getInstance()->setSuccess(i18n::__('successfulRegister'));
        routing::getInstance()->redirect('usuario', 'index');
      } else {
        routing::getInstance()->redirect('usuario', 'index');
      }
    } catch (PDOException $exc) {
      routing::getInstance()->redirect('usuario', 'insert');
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

  private function Validate($usuario, $password) {
    $bandera = FALSE;
    if (strlen($usuario) > usuarioTableClass::USER_LENGTH) {
      throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => usuarioTableClass::USER_LENGTH)), 00001);
    }
    if ($usuario === '') {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
      $bandera = true;
      session::getInstance()->setFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, true), true);
    }
     if ($password === '') {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
      $bandera = true;
      session::getInstance()->setFlash(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true), true);
    }
    if ($bandera === true) {
      request::getInstance()->setMethod('GET');
      routing::getInstance()->forward('usuario', 'insert');
    }
  }
}