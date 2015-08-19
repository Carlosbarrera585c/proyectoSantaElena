<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Control Calidad
 *
 * @author  cristian ramirez <ccristianramirezc@gmail.com> 
 */
class deleteFiltersActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (session::getInstance()->hasAttribute('cachazaIndexFilters')) {
        session::getInstance()->deleteAttribute('cachazaIndexFilters');
      }
      routing::getInstance()->redirect('cachaza', 'index');
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
    }
  }

}
