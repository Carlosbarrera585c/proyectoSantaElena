
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
            if (request::getInstance()->hasGet(jugoTableClass::ID)) {
                $fields = array(
		 jugoTableClass::ID,
                 jugoTableClass::PROCEDENCIA,
                 jugoTableClass::BRIX,
                 jugoTableClass::PH,
                 jugoTableClass::CONTROL_ID
 
                
                );
                $where = array(
                    jugoTableClass::ID => request::getInstance()->getGet(jugoTableClass::ID)
                );
                $this->objJugo = jugoTableClass::getAll($fields, false, null, null, null, null, $where);
                
                 $fields = array(
                     controlCalidadTableClass::ID,
                     controlCalidadTableClass::FECHA
                );
                
                $this->objControlCalidad = controlCalidadTableClass::getAll($fields, false);
               
              
				 $fields = array(
                     proveedorTableClass::ID,
                     proveedorTableClass::RAZON_SOCIAL
                );
                
                $this->objProveedor = proveedorTableClass::getAll($fields, false);
				
                $this->defineView('edit', 'jugo', session::getInstance()->getFormatOutput());
            } else {
                routing::getInstance()->redirect('jugo', 'index');
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
