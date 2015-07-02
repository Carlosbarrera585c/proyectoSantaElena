
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

                $id = request::getInstance()->getPost(credencialTableClass::getNameField(credencialTableClass::ID, true));
                $nombre = request::getInstance()->getPost(credencialTableClass::getNameField(credencialTableClass::NOMBRE, true));

                $this->Validate($nombre);

                $ids = array(
                    credencialTableClass::ID => $id
                );

                $data = array(
                    credencialTableClass::NOMBRE => $nombre,
                );

                credencialTableClass::update($ids, $data);
            }
            session::getInstance()->setSuccess(i18n::__('successfulUpdate'));
            routing::getInstance()->redirect('credencial', 'index');
        } catch (PDOException $exc) {
            routing::getInstance()->redirect('credencial', 'insert');
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

    private function Validate($nombre) {
        $bandera = FALSE;
        if (strlen($nombre) > credencialTableClass::NOMBRE_LENGTH) {
            session::getInstance()->setError(i18n::__('errorLengthCredential', NULL, 'default', array('%descripcion%' => $nombre, '%caracteres%' => credencialTableClass::NOMBRE_LENGTH)));
            $bandera = true;
            session::getInstance()->setFlash(credencialTableClass::getNameField(credencialTableClass::NOMBRE, true), true);
        }
        if ($nombre === '') {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(credencialTableClass::getNameField(credencialTableClass::NOMBRE, true), true);
        }
        if (!ereg("^[A-Z a-z_]*$", $nombre)) {
            session::getInstance()->setError(i18n::__('errorText', NULL, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(credencialTableClass::getNameField(credencialTableClass::NOMBRE, true), true);
        }
        if ($bandera === true) {
            request::getInstance()->setMethod('GET');
            routing::getInstance()->forward('credencial', 'insert');
        }
    }

}
