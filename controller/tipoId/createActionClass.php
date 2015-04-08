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

                $desc_tipo_id = trim(request::getInstance()->getPost(tipoIdTableClass::getNameField(tipoIdTableClass::DESC_TIPO_ID, true)));

                $this->Validate($desc_tipo_id);

                $data = array(
                    tipoIdTableClass::DESC_TIPO_ID => $desc_tipo_id,
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

    private function Validate($desc_tipo_id) {
        $bandera = FALSE;
        if (strlen($desc_tipo_id) > tipoIdTableClass::DESC_TIPO_ID_LENGTH) {
            session::getInstance()->setError(i18n::__('errorLengthTipoId', NULL, 'default', array('%descripcion%' => $desc_tipo_id, '%caracteres%' => tipoIdTableClass::DESC_TIPO_ID_LENGTH)));
            $bandera = true;
            session::getInstance()->setFlash(tipoIdTableClass::getNameField(tipoIdTableClass::DESC_TIPO_ID, true), true);
        }
        if ($desc_tipo_id === '') {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(tipoIdTableClass::getNameField(tipoIdTableClass::DESC_TIPO_ID, true), true);
        }
        if (!ereg("^[A-Z a-z_]*$", $desc_tipo_id)) {
            session::getInstance()->setError(i18n::__('errorText', NULL, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(tipoIdTableClass::getNameField(tipoIdTableClass::DESC_TIPO_ID, true), true);
        }
        if ($bandera === true) {
            request::getInstance()->setMethod('GET');
            routing::getInstance()->forward('tipoId', 'insert');
        }
    }

}
