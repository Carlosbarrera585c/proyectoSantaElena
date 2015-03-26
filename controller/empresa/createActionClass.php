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
          
                $nit = request::getInstance()->getPost(empresaTableClass::getNameField(empresaTableClass::NIT, true));
                $nom_empresa = request::getInstance()->getPost(empresaTableClass::getNameField(empresaTableClass::NOM_EMPRESA, true));
                $razon_social = request::getInstance()->getPost(empresaTableClass::getNameField(empresaTableClass::RAZON_SOCIAL, true));
                $direccion = request::getInstance()->getPost(empresaTableClass::getNameField(empresaTableClass::DIRECCION, true));
                $telefono = request::getInstance()->getPost(empresaTableClass::getNameField(empresaTableClass::TELEFONO, true));
                $usuario_id = request::getInstance()->getPost(empresaTableClass::getNameField(empresaTableClass::USUARIO_ID, true));

                if (strlen($nom_empresa) > empresaTableClass::NOM_LENGTH) {
                      throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => empresaTableClass::NOM_LENGTH)), 00001);
                   }
                
               if (strlen($razon_social) > empresaTableClass::RAZON_LENGTH) {
                      throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => empresaTableClass::RAZON_LENGTH)), 00001);
                   }
                   
                $data = array(
                    empresaTableClass::NIT => $nit,
                    empresaTableClass::NOM_EMPRESA => $nom_empresa,
                    empresaTableClass::RAZON_SOCIAL => $razon_social,
                    empresaTableClass::DIRECCION => $direccion,
                    empresaTableClass::TELEFONO => $telefono,
                    empresaTableClass::USUARIO_ID => $usuario_id,
                    
                );
                empresaTableClass::insert($data);
                session::getInstance()->setSuccess(i18n::__('successfulRegister'));
                routing::getInstance()->redirect('empresa', 'index');
                  
            } else {
                routing::getInstance()->redirect('empresa', 'index');
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
            session::getInstance()->setError(i18n::__('failureToRegister'));
        }
    }

}
