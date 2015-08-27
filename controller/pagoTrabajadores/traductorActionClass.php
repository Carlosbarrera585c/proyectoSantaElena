<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Clarificacion
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class traductorActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      $language = request::getInstance()->getGet('language');
      $PATH_INFO = request::getInstance()->getGet('PATH_INFO');

      if (request::getInstance()->hasGet('QUERY_STRING')) {
        $QUERY_STRING = html_entity_decode(request::getInstance()->getGet('QUERY_STRING'));
      }

      session::getInstance()->setDefaultCulture($language);
      $dir = config::getUrlBase() . config::getIndexFile() . $PATH_INFO;
      $dir .= (isset($QUERY_STRING)) ? '?' . $QUERY_STRING : '';
      header('Location: ' . $dir);
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
      session::getInstance()->setError(i18n::__('failureToRegister'));
    }
  }

}
