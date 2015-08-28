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

                $humedad = trim(request::getInstance()->getPost(cachazaTableClass::getNameField(cachazaTableClass::HUMEDAD, true)));
                $sacaroza = trim(request::getInstance()->getPost(cachazaTableClass::getNameField(cachazaTableClass::SACAROZA, true)));
                $control_id = trim(request::getInstance()->getPost(cachazaTableClass::getNameField(cachazaTableClass::CONTROL_ID, true)));
                
                $this->Validate($humedad, $sacaroza, $control_id);

                $data = array(

                    cachazaTableClass::HUMEDAD => $humedad,
                    cachazaTableClass::SACAROZA => $sacaroza,
                    cachazaTableClass::CONTROL_ID => $control_id
                );

                
                cachazaTableClass::insert($data);
                session::getInstance()->setSuccess(i18n::__('successfulRegister'));
                routing::getInstance()->redirect('cachaza', 'index');
            } else {
                routing::getInstance()->redirect('cachaza', 'index');
            }
        } catch (PDOException $exc) {
            routing::getInstance()->redirect('cachaza', 'insert');
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

//funcion para validacion de campos en formulario 
    private function Validate($humedad, $sacaroza, $control_id) {
        $bandera = FALSE;
        $pattern = "/^((19|20)?[0-9]{2})[\/|-](0?[1-9]|[1][012])[\/|-](0?[1-9]|[12][0-9]|3[01])$/";
        //validaciones para que no se superen el maximo de caracteres.

        if (strlen($brix) > cachazaTableClass::HUMEDAD_LENGTH) {
            session::getInstance()->setError(i18n::__('errorLengthBrix', NULL, 'default', array('%brix%' => $humedad, '%caracteres%' => cachazaTableClass::HUMEDAD_LENGTH)), 'errorHumedad');
            $bandera = true;
            session::getInstance()->setFlash(cachazaTableClass::getNameField(cachazaTableClass::HUMEDAD, true), true);
        }
        if (strlen($ph) > cachazaTableClass::SACAROZA_LENGTH) {
            session::getInstance()->setError(i18n::__('errorLengthPh', NULL, 'default', array('%ph%' => $sacaroza, '%caracteres%' => cachazaTableClass::SACAROZA_LENGTH)), 'errorSacaroza');
            $bandera = true;
            session::getInstance()->setFlash(cachazaTableClass::getNameField(cachazaTableClass::SACAROZA, true), true);
        }
        
        
        //validar que el campo sea numerico.
        if (!is_numeric($humedad)) {
            session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorHumedad');
            $bandera = true;
            session::getInstance()->setFlash(cachazaTableClass::getNameField(cachazaTableClass::HUMEDAD, true), true);
        }
        if (!is_numeric($sacaroza)) {
            session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorSacaroza');
            $bandera = true;
            session::getInstance()->setFlash(cachazaTableClass::getNameField(cachazaTableClass::SACAROZA, true), true);
        }
        
        //validar que no se envie el campo vacio o nulo
        if ($humedad === '' or $humedad === NULL) {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorHumedad');
            $bandera = true;
            session::getInstance()->setFlash(cachazaTableClass::getNameField(cachazaTableClass::HUMEDAD, true), true);
        }
        if ($sacaroza === '' or $sacaroza === NULL) {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorSacaroza');
            $bandera = true;
            session::getInstance()->setFlash(cachazaTableClass::getNameField(cachazaTableClass::SACAROZA, true), true);
        }

        if ($bandera === true) {
            request::getInstance()->setMethod('GET');
            routing::getInstance()->forward('cachaza', 'insert');
        }
    }

}
