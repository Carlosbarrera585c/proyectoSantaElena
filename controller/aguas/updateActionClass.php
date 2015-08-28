
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
 * @author Bayron Henao <bairon_henao_1995@hotmail.com>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {
                
                $id = trim(request::getInstance()->getPost(aguasTableClass::getNameField(aguasTableClass::ID, true)));
                $procedencia = trim(request::getInstance()->getPost(aguasTableClass::getNameField(aguasTableClass::PROCEDENCIA, true)));
                $arrastre_dulce = trim(request::getInstance()->getPost(aguasTableClass::getNameField(aguasTableClass::ARRASTRE_DULCE, true)));
                $ph = trim(request::getInstance()->getPost(aguasTableClass::getNameField(aguasTableClass::PH, true)));
                $cloro_residual = trim(request::getInstance()->getPost(aguasTableClass::getNameField(aguasTableClass::CLORO_RESIDUAL, true)));
                $control_id = trim(request::getInstance()->getPost(aguasTableClass::getNameField(aguasTableClass::CONTROL_ID, true)));
                $hora = trim(request::getInstance()->getPost(aguasTableClass::getNameField(aguasTableClass::HORA, true)));
    
                $ids = array(
                    aguasTableClass::ID => $id
                );

                $this->Validate($procedencia, $arrastre_dulce, $ph, $cloro_residual, $control_id, $hora);

                $data = array(
                    aguasTableClass::PROCEDENCIA => $procedencia,
                    aguasTableClass::ARRASTRE_DULCE => $arrastre_dulce,
                    aguasTableClass::PH => $ph,
                    aguasTableClass::CLORO_RESIDUAL => $cloro_residual,
                    aguasTableClass::CONTROL_ID => $control_id,
                    aguasTableClass::HORA => $hora
                );
                aguasTableClass::update($ids, $data);
            }
            session::getInstance()->setSuccess(i18n::__('successfulUpdate'));
            session::getInstance()->setAttribute('form_' . aguasTableClass::getNameTable(), null);
            routing::getInstance()->redirect('aguas', 'index');
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

//funcion para validacion de campos en formulario 
    private function Validate($hora, $arrastre_dulce, $ph, $cloro_residual, $control_id, $hora) {
        $bandera = FALSE;
        $pattern = "/^((19|20)?[0-9]{2})[\/|-](0?[1-9]|[1][012])[\/|-](0?[1-9]|[12][0-9]|3[01])$/";
        

        //validar que el campo sea solo texto
        if (!ereg("^[A-Za-z]*$", $arrastre_dulce)) {
            session::getInstance()->setError(i18n::__('errorText', NULL, 'default'), 'errorArrastre');
            $bandera = true;
            session::getInstance()->setFlash(aguasTableClass::getNameField(aguasTableClass::ARRASTRE_DULCE, true), true);
        }
        
//validaciones para que no se superen el maximo de caracteres.

        if (strlen($arrastre_dulce) > aguasTableClass::ARRASTRE_DULCE_LENGTH) {
            session::getInstance()->setError(i18n::__('errorLengthPh', NULL, 'default', array('%ph%' => $arrastre_dulce, '%caracteres%' => aguasTableClass::PH_LENGTH)), 'errorArrastre');
            $bandera = true;
            session::getInstance()->setFlash(aguasTableClass::getNameField(aguasTableClass::ARRASTRE_DULCE_LENGTH, true), true);
        }
        
        if (strlen($ph) > aguasTableClass::PH_LENGTH) {
            session::getInstance()->setError(i18n::__('errorLengthPh', NULL, 'default', array('%ph%' => $ph, '%caracteres%' => aguasTableClass::PH_LENGTH)), 'errorPh');
            $bandera = true;
            session::getInstance()->setFlash(aguasTableClass::getNameField(aguasTableClass::PH, true), true);
        }
        
        
        //validar que el campo sea numerico.

//        if (!is_numeric($ph)) {
//            session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorPh');
//            $bandera = true;
//            session::getInstance()->setFlash(aguasTableClass::getNameField(aguasTableClass::PH, true), true);
//        }
        
        if (!is_numeric($cloro_residual)) {
            session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorCloro');
            $bandera = true;
            session::getInstance()->setFlash(aguasTableClass::getNameField(aguasTableClass::CLORO_RESIDUAL, true), true);
        }
        
        
        //validar que no se envie el campo vacio o nulo
        if ($arrastre_dulce === '' or $arrastre_dulce === NULL) {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorBrix');
            $bandera = true;
            session::getInstance()->setFlash(aguasTableClass::getNameField(aguasTableClass::ARRASTRE_DULCE, true), true);
        }
        if ($ph === '' or $ph === NULL) {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorPh');
            $bandera = true;
            session::getInstance()->setFlash(aguasTableClass::getNameField(aguasTableClass::PH, true), true);
        }
        
        if ($cloro_residual === '' or $cloro_residual === NULL) {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorPh');
            $bandera = true;
            session::getInstance()->setFlash(aguasTableClass::getNameField(aguasTableClass::CLORO_RESIDUAL, true), true);
        }
        if ($bandera === true) {
            request::getInstance()->setMethod('GET');
            request::getInstance()->addParamGet(array(aguasTableClass::ID => request::getInstance()->getPost(aguasTableClass::getNameField(aguasTableClass::ID, TRUE))));
            routing::getInstance()->forward('aguas', 'edit');
        }
    }

}
     
