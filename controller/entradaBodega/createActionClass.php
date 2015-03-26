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
 *  @author Cristian Ramirez <cristianRamirezXD@outlook.es>
 */

class createActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $fecha = request::getInstance()->getPost(entradaBodegaTableClass::getNameField(entradaBodegaTableClass::FECHA, true));
                $proveedor_id = request::getInstance()->getPost(entradaBodegaTableClass::getNameField(entradaBodegaTableClass::PROVEEDOR_ID, true));
                
                               
                $data = array(
                    entradaBodegaTableClass::FECHA => $fecha,
                    entradaBodegaTableClass::PROVEEDOR_ID => $proveedor_id,
                    
                );
                entradaBodegaTableClass::insert($data);
                session::getInstance()->setSuccess(i18n::__('successfulRegister'));
                routing::getInstance()->redirect('entradaBodega', 'index');
                  
            } else {
                routing::getInstance()->redirect('entradaBodega', 'index');
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
            session::getInstance()->setError(i18n::__('failureToRegister'));
        }
    }

}
