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
 * @author Cristian Ramirez <cristianxdramirez@gmail.com>
 */
class traductorActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      //if (request::getInstance()->isMethod('POST')) {
        
//        echo '<pre>';
//        print_r($_SERVER);
//        echo '</pre>';
//        exit();
        $language = request::getInstance()->getGet('language');
        $PATH_INFO = request::getInstance()->getGet('PATH_INFO');
        
        if (request::getInstance()->hasGet('QUERY_STRING')) {
          $QUERY_STRING = html_entity_decode(request::getInstance()->getGet('QUERY_STRING'));
        }
        
        session::getInstance()->setDefaultCulture($language);
//        config::setDefaultCulture($language);
        $dir = config::getUrlBase() . config::getIndexFile() . $PATH_INFO;
        $dir .= (isset($QUERY_STRING)) ? '?' . $QUERY_STRING : '';
        header('Location: ' . $dir);
      //} else {
        //routing::getInstance()->redirect('default', 'index');
      //}
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
      session::getInstance()->setError(i18n::__('failureToRegister'));
    }
  }

}
