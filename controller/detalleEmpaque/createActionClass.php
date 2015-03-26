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
          
                $cantidad = request::getInstance()->getPost(detalleEmpaqueTableClass::getNameField(detalleEmpaqueTableClass::CANTIDAD, true));
                $idInsumo = request::getInstance()->getPost(detalleEmpaqueTableClass::getNameField(detalleEmpaqueTableClass::INSUMO_ID, true));
                $idEmpaque = request::getInstance()->getPost(detalleEmpaqueTableClass::getNameField(detalleEmpaqueTableClass::EMPAQUE_ID, true));
                                
                   
                $data = array(
                    detalleEmpaqueTableClass::CANTIDAD => $cantidad,
                    detalleEmpaqueTableClass::INSUMO_ID => $idInsumo,
                    detalleEmpaqueTableClass::EMPAQUE_ID => $idEmpaque
                    
                );
                detalleEmpaqueTableClass::insert($data);
                session::getInstance()->setSuccess(i18n::__('successfulRegister'));
                routing::getInstance()->redirect('detalleEmpaque', 'index');
                  
            } else {
                routing::getInstance()->redirect('detalleEmpaque', 'index');
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
            session::getInstance()->setError(i18n::__('failureToRegister'));
        }
    }

}
