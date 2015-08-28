<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use hook\log\logHookClass as bitacora;

/**
 * Description of create CreateActionClass
 * @author  cristian ramirez <ccristianramirezc@gmail.com> 
 * @method post  los datos de la tabla llegan por metodo post.
 * @param getNameField se especifica los nombres de los capos contenidos en la tabla.
 * $data los datos del recorrido de la tabla controlCalidad se guardan
 * en la variable $data  
 */
class createActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {
                $procedencia = trim(request::getInstance()->getPost(aguasTableClass::getNameField(aguasTableClass::PROCEDENCIA, true)));
                $arrastre_dulce = trim(request::getInstance()->getPost(aguasTableClass::getNameField(aguasTableClass::ARRASTRE_DULCE, true)));
                $ph = trim(request::getInstance()->getPost(aguasTableClass::getNameField(aguasTableClass::PH, true)));
                $cloro_residual = trim(request::getInstance()->getPost(aguasTableClass::getNameField(aguasTableClass::CLORO_RESIDUAL, true)));
                $control_id = trim(request::getInstance()->getPost(aguasTableClass::getNameField(aguasTableClass::CONTROL_ID, true)));
                $hora = trim(request::getInstance()->getPost(aguasTableClass::getNameField(aguasTableClass::HORA, true)));
                
                $this->Validate($procedencia, $arrastre_dulce, $ph, $cloro_residual, $control_id, $hora);

                $data = array(

                    aguasTableClass::PROCEDENCIA => $procedencia,
                    aguasTableClass::ARRASTRE_DULCE => $arrastre_dulce,
                    aguasTableClass::PH => $ph,
                    aguasTableClass::CLORO_RESIDUAL => $cloro_residual,
                    aguasTableClass::CONTROL_ID => $control_id,
                    aguasTableClass::HORA => $hora
                );

                
                aguasTableClass::insert($data);
                session::getInstance()->setSuccess(i18n::__('successfulRegister'));
                routing::getInstance()->redirect('aguas', 'index');
            } else {
                routing::getInstance()->redirect('aguas', 'index');
            }
        } catch (PDOException $exc) {
            routing::getInstance()->redirect('aguas', 'insert');
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

//funcion para validacion de campos en formulario 
    private function Validate($procedencia, $arrastre_dulce, $ph, $cloro_residual, $control_id, $hora) {
        $bandera = FALSE;
        $pattern = "/^((19|20)?[0-9]{2})[\/|-](0?[1-9]|[1][012])[\/|-](0?[1-9]|[12][0-9]|3[01])$/";
        

        //validar que el campo sea solo texto
        
        if (!ereg("^[A-Za-z]*$", $procedencia)) {
            session::getInstance()->setError(i18n::__('errorText', NULL, 'default'), 'errorProcedencia');
            $bandera = true;
            session::getInstance()->setFlash(aguasTableClass::getNameField(aguasTableClass::PROCEDENCIA, true), true);
        }
        
        
        if (!ereg("^[A-Za-z]*$", $arrastre_dulce)) {
            session::getInstance()->setError(i18n::__('errorText', NULL, 'default'), 'errorArrastre');
            $bandera = true;
            session::getInstance()->setFlash(aguasTableClass::getNameField(aguasTableClass::ARRASTRE_DULCE, true), true);
        }
        
//validaciones para que no se superen el maximo de caracteres.

        if (strlen($procedencia) > aguasTableClass::PROCEDENCIA_LENGTH) {
            session::getInstance()->setError(i18n::__('errorLengthPh', NULL, 'default', array('%ph%' => $procedencia, '%caracteres%' => aguasTableClass::PROCEDENCIA_LENGTH)), 'errorProcedencia');
            $bandera = true;
            session::getInstance()->setFlash(aguasTableClass::getNameField(aguasTableClass::PROCEDENCIA, true), true);
        }
        
        if (strlen($arrastre_dulce) > aguasTableClass::ARRASTRE_DULCE_LENGTH) {
            session::getInstance()->setError(i18n::__('errorLengthPh', NULL, 'default', array('%ph%' => $arrastre_dulce, '%caracteres%' => aguasTableClass::ARRASTRE_DULCE_LENGTH)), 'errorArrastre');
            $bandera = true;
            session::getInstance()->setFlash(aguasTableClass::getNameField(aguasTableClass::ARRASTRE_DULCE, true), true);
        }
        
        if (strlen($ph) > aguasTableClass::PH_LENGTH) {
            session::getInstance()->setError(i18n::__('errorLengthPh', NULL, 'default', array('%ph%' => $ph, '%caracteres%' => aguasTableClass::PH_LENGTH)), 'errorPh');
            $bandera = true;
            session::getInstance()->setFlash(aguasTableClass::getNameField(aguasTableClass::PH, true), true);
        }
        
        
        //validar que el campo sea numerico.

        if (!is_numeric($ph)) {
            session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorPh');
            $bandera = true;
            session::getInstance()->setFlash(aguasTableClass::getNameField(aguasTableClass::PH, true), true);
        }
        
        if (!is_numeric($cloro_residual)) {
            session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorCloro');
            $bandera = true;
            session::getInstance()->setFlash(aguasTableClass::getNameField(aguasTableClass::CLORO_RESIDUAL, true), true);
        }
        
        
        //validar que no se envie el campo vacio o nulo
        
        if ($procedencia === '' or $procedencia === NULL) {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorProcedencia');
            $bandera = true;
            session::getInstance()->setFlash(aguasTableClass::getNameField(aguasTableClass::PROCEDENCIA, true), true);
        }
        
        if ($arrastre_dulce === '' or $arrastre_dulce === NULL) {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorArrastre');
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
            routing::getInstance()->forward('aguas', 'insert');
        }
    }

}
