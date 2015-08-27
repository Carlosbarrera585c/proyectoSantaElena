
<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of create editActionClass
 * @author Cristian Ramirez <ccristianramirezc@gmail.com>
 * @method post  los datos de la tabla llegan por metodo post.
 * @param getNameField se especifica los nombres de los capos contenidos en la tabla.
 * $data los datos del recorrido de la tabla controlCalidad se guardan
 * en la variable $data  
 */
class editActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->hasGet(aguasTableClass::ID)) {
                $fields = array(
		 aguasTableClass::ID,
                 aguasTableClass::PROCEDENCIA,
                 aguasTableClass::ARRASTRE_DULCE,
                 aguasTableClass::PH,
                 aguasTableClass::CLORO_RESIDUAL,
                 aguasTableClass::CONTROL_ID,
                 aguasTableClass::HORA
 
                
                );
                $where = array(
                    aguasTableClass::ID => request::getInstance()->getGet(aguasTableClass::ID)
                );
                $this->objAguas = aguasTableClass::getAll($fields, false, null, null, null, null, $where);
                
                 $fields = array(
                     controlCalidadTableClass::ID,
                     controlCalidadTableClass::FECHA
                );
                
                $this->objControlCalidad = controlCalidadTableClass::getAll($fields, false);
                              
              
              
                $this->defineView('edit', 'aguas', session::getInstance()->getFormatOutput());
            } else {
                routing::getInstance()->redirect('aguas', 'index');
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
