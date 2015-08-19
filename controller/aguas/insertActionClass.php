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
 * @author Cristian Ramirez <ccristianramirezc@gmail.com>
 */
class insertActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
              $fields = array(
                  controlCalidadTableClass::ID,
                  controlCalidadTableClass::FECHA
            );
               $this->objControlCalidad = controlCalidadTableClass::getAll($fields,false);
               
            
        $this->defineView('insert', 'aguas', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
