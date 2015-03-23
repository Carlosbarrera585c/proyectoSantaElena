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
class traductorActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST') === true) {
      $languaje = request::getInstance()->getPost('languaje');
      config::setDefaultCulture($languaje);
      } else {
        routing::getInstance()->redirect('empleado', 'index');
      }
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
      session::getInstance()->setError(i18n::__('failureToRegister'));
    }
  }

}
