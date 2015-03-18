
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
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $id = request::getInstance()->getPost(empresaTableClass::getNameField(empresaTableClass::ID, true));
                $nit = request::getInstance()->getPost(empresaTableClass::getNameField(empresaTableClass::NIT, true));
                $nom_empresa = request::getInstance()->getPost(empresaTableClass::getNameField(empresaTableClass::NOM_EMPRESA, true));
                $razon_social = request::getInstance()->getPost(empresaTableClass::getNameField(empresaTableClass::RAZON_SOCIAL, true));
                $direccion = request::getInstance()->getPost(empresaTableClass::getNameField(empresaTableClass::DIRECCION, true));
                $telefono = request::getInstance()->getPost(empresaTableClass::getNameField(empresaTableClass::TELEFONO, true));
                $usuario_id = request::getInstance()->getPost(empresaTableClass::getNameField(empresaTableClass::USUARIO_ID, true));
   
                $ids = array(
                    empresaTableClass::ID => $id
                );

                $data = array(
                    empresaTableClass::NIT => $nit,
                    empresaTableClass::NOM_EMPRESA => $nom_empresa,
                    empresaTableClass::RAZON_SOCIAL => $razon_social,
                    empresaTableClass::DIRECCION => $direccion,
                    empresaTableClass::TELEFONO => $telefono,
                    empresaTableClass::USUARIO_ID => $usuario_id,
                    
                );

                empresaTableClass::update($ids, $data);
            }
            session::getInstance()->setSuccess(i18n::__('successfulUpdate'));
            routing::getInstance()->redirect('empresa', 'index');
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
