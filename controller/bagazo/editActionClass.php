
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
 * @author  Bayron Henao <bairon_henao_1995@hotmail.com> 
 * @method post  los datos de la tabla llegan por metodo post.
 * @param getNameField se especifica los nombres de los capos contenidos en la tabla.
 * $data los datos del recorrido de la tabla controlCalidad se guardan
 * en la variable $data  
 */
class editActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->hasGet(bagazoTableClass::ID)) {
                $fields = array(
				 bagazoTableClass::ID,
                 bagazoTableClass::HUMEDAD,
				 bagazoTableClass::BRIX,
			     bagazoTableClass::SACAROSA,
				 bagazoTableClass::CONTROL_ID,
                );
                $where = array(
                    bagazoTableClass::ID => request::getInstance()->getGet(bagazoTableClass::ID)
                );
                $this->objBagazo = bagazoTableClass::getAll($fields, false, null, null, null, null, $where);
                
                 $fields = array(
                     controlCalidadTableClass::ID,
                     controlCalidadTableClass::FECHA
                );
                
                $this->objControlCalidad = controlCalidadTableClass::getAll($fields, false);
                

              
                $this->defineView('edit', 'bagazo', session::getInstance()->getFormatOutput());
            } else {
                routing::getInstance()->redirect('bagazo', 'index');
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
