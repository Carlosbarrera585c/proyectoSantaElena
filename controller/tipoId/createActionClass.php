<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Tipo Identificación
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $descTipoId = trim(request::getInstance()->getPost(tipoIdTableClass::getNameField(tipoIdTableClass::DESC_TIPO_ID, true)));

                $this->Validate($descTipoId);

                $data = array(
                    tipoIdTableClass::DESC_TIPO_ID => $descTipoId,
                );
                tipoIdTableClass::insert($data);
                session::getInstance()->setSuccess(i18n::__('successfulRegister'));
                routing::getInstance()->redirect('tipoId', 'index');
            } else {
                routing::getInstance()->redirect('tipoId', 'index');
            }
        } catch (PDOException $exc) {
            routing::getInstance()->redirect('tipoId', 'insert');
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

    private function Validate($descTipoId) {
        $bandera = FALSE;
        if (strlen($descTipoId) > tipoIdTableClass::DESC_TIPO_ID_LENGTH) {
            session::getInstance()->setError(i18n::__('errorLengthTipoId', NULL, 'default', array('%descripcion%' => $descTipoId, '%caracteres%' => tipoIdTableClass::DESC_TIPO_ID_LENGTH)),'errorDescripcion');
            $bandera = true;
            session::getInstance()->setFlash(tipoIdTableClass::getNameField(tipoIdTableClass::DESC_TIPO_ID, true), true);
        }
        if ($descTipoId === '') {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'),'errorDescripcion');
            $bandera = true;
            session::getInstance()->setFlash(tipoIdTableClass::getNameField(tipoIdTableClass::DESC_TIPO_ID, true), true);
        }
        if (!ereg("^[A-Z a-z_]*$", $descTipoId)) {
            session::getInstance()->setError(i18n::__('errorText', NULL, 'default'),'errorDescripcion');
            $bandera = true;
            session::getInstance()->setFlash(tipoIdTableClass::getNameField(tipoIdTableClass::DESC_TIPO_ID, true), true);
        }
        if ($bandera === true) {
            request::getInstance()->setMethod('GET');
            routing::getInstance()->forward('tipoId', 'insert');
        }
    }

}
