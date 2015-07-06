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
 * @author Cristian Ramirez <cristianRamirezXD@outlook.es>
 */
class insertActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
        
            $fields = array(
                ciudadTableClass::ID,
                ciudadTableClass::NOM_CIUDAD
            );
            
       $this->objCiudad = ciudadTableClass::getAll($fields, false);
       $this->defineView('insert', 'proveedor', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}
