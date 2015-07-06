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

                $desc_tipo_insumo = request::getInstance()->getPost(tipoInsumoTableClass::getNameField(tipoInsumoTableClass::DESC_TIPO_INSUMO, true));
                
                               
                $data = array(
                    tipoInsumoTableClass::DESC_TIPO_INSUMO => $desc_tipo_insumo,
                    
                );
                tipoInsumoTableClass::insert($data);
                session::getInstance()->setSuccess(i18n::__('successfulRegister'));
                routing::getInstance()->redirect('tipoInsumo', 'index');
                  
            } else {
                routing::getInstance()->redirect('tipoInsumo', 'index');
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
            session::getInstance()->setError(i18n::__('failureToRegister'));
        }
    }

}
