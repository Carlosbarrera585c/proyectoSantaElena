
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
 * @author Cristian Ramirez <ccristianramirezc@gmail.com>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {
                
                $id = trim(request::getInstance()->getPost(jugoTableClass::getNameField(jugoTableClass::ID, true)));
                $procedencia = trim(request::getInstance()->getPost(jugoTableClass::getNameField(jugoTableClass::PROCEDENCIA, true)));
                $brix = trim(request::getInstance()->getPost(jugoTableClass::getNameField(jugoTableClass::BRIX, true)));
                $ph = trim(request::getInstance()->getPost(jugoTableClass::getNameField(jugoTableClass::PH, true)));
                $control_id = trim(request::getInstance()->getPost(jugoTableClass::getNameField(jugoTableClass::CONTROL_ID, true)));
             
                $ids = array(
                    jugoTableClass::ID => $id
                );

                $this->ValidateUpdate($procedencia, $brix, $ph, $control_id);

                $data = array(

                    jugoTableClass::PROCEDENCIA => $procedencia,
                    jugoTableClass::BRIX => $brix,
                    jugoTableClass::PH => $ph,
                    jugoTableClass::CONTROL_ID => $control_id
                );

                jugoTableClass::update($ids, $data);
            }
            session::getInstance()->setSuccess(i18n::__('successfulUpdate'));
            session::getInstance()->setAttribute('form_' . jugoTableClass::getNameTable(), null);
            routing::getInstance()->redirect('jugo', 'index');
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

    //funcion para validacion de campos en formulario 
    private function ValidateUpdate($procedencia, $brix, $ph, $control_id) {
        $bandera = FALSE;
        $pattern = "/^((19|20)?[0-9]{2})[\/|-](0?[1-9]|[1][012])[\/|-](0?[1-9]|[12][0-9]|3[01])$/";
        //validaciones para que no se superen el maximo de caracteres.
        if (strlen($brix) > jugoTableClass::BRIX_LENGTH) {
            session::getInstance()->setError(i18n::__('errorLengthBrix', NULL, 'default', array('%brix%' => $procedencia_caña, '%caracteres%' => jugoTableClass::BRIX_LENGTH)), 'errorBrix');
            $bandera = true;
            session::getInstance()->setFlash(jugoTableClass::getNameField(jugoTableClass::BRIX, true), true);
        }
        if (strlen($ph) > jugoTableClass::PH_LENGTH) {
            session::getInstance()->setError(i18n::__('errorLengthPh', NULL, 'default', array('%ph%' => $peso_caña, '%caracteres%' => jugoTableClass::PH_LENGTH)), 'errorPh');
            $bandera = true;
            session::getInstance()->setFlash(jugoTableClass::getNameField(jugoTableClass::PH, true), true);
        }

        //validar que el campo sea numerico.
        if (!is_numeric($brix)) {
            session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorBrix');
            $bandera = true;
            session::getInstance()->setFlash(jugoTableClass::getNameField(jugoTableClass::BRIX, true), true);
        }
        if (!is_numeric($ph)) {
            session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorPh');
            $bandera = true;
            session::getInstance()->setFlash(jugoTableClass::getNameField(jugoTableClass::PH, true), true);
        }
        
        //validar que no se envie el campo vacio o nulo
        if ($brix === '' or $brix === NULL) {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorBrix');
            $bandera = true;
            session::getInstance()->setFlash(jugoTableClass::getNameField(jugoTableClass::BRIX, true), true);
        }
        if ($ph === '' or $ph === NULL) {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorPh');
            $bandera = true;
            session::getInstance()->setFlash(jugoTableClass::getNameField(jugoTableClass::PH, true), true);
        }

        if ($bandera === true) {
            request::getInstance()->setMethod('GET');
            request::getInstance()->addParamGet(array(jugoTableClass::ID => request::getInstance()->getPost(jugoTableClass::getNameField(jugoTableClass::ID, TRUE))));
            routing::getInstance()->forward('jugo', 'edit');
        }
    }

}
