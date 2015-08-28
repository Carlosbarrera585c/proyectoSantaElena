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
                $humedad = trim(request::getInstance()->getPost(bagazoTableClass::getNameField(bagazoTableClass::HUMEDAD, true)));
				$brix = trim(request::getInstance()->getPost(bagazoTableClass::getNameField(bagazoTableClass::BRIX, true)));
				$sacarosa = trim(request::getInstance()->getPost(bagazoTableClass::getNameField(bagazoTableClass::SACAROSA, true)));
                $control_id = trim(request::getInstance()->getPost(bagazoTableClass::getNameField(bagazoTableClass::CONTROL_ID, true)));
                
                $this->Validate($humedad, $brix, $sacarosa, $control_id);

                $data = array(
                    bagazoTableClass::HUMEDAD => $humedad,
					bagazoTableClass::BRIX => $brix,
					bagazoTableClass::SACAROSA => $sacarosa,
					bagazoTableClass::CONTROL_ID => $control_id,
                );

                
                bagazoTableClass::insert($data);
                session::getInstance()->setSuccess(i18n::__('successfulRegister'));
                routing::getInstance()->redirect('bagazo', 'index');
            } else {
                routing::getInstance()->redirect('jugo', 'index');
            }
        } catch (PDOException $exc) {
            routing::getInstance()->redirect('bagazo', 'insert');
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

//funcion para validacion de campos en formulario 
    private function Validate($humedad, $brix, $sacarosa, $control_id) {
        $bandera = FALSE;
        //validaciones para que no se superen el maximo de caracteres.

        if (strlen($brix) > bagazoTableClass::BRIX_LENGHT) {
            session::getInstance()->setError(i18n::__('errorLengthBrix', NULL, 'default', array('%brix%' => $brix, '%caracteres%' => bagazoTableClass::BRIX_LENGHT)), 'errorBrix');
            $bandera = true;
            session::getInstance()->setFlash(bagazoTableClass::getNameField(bagazoTableClass::BRIX, true), true);
        } else if (!is_numeric($brix)) {
            session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorBrix');
            $bandera = true;
            session::getInstance()->setFlash(bagazoTableClass::getNameField(bagazoTableClass::BRIX, true), true);
        } else if ($brix === '' or $brix === NULL) {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorBrix');
            $bandera = true;
            session::getInstance()->setFlash(bagazoTableClass::getNameField(bagazoTableClass::BRIX, true), true);
        } 
		if (strlen($humedad) > bagazoTableClass::HUMEDAD_LENGTH) {
            session::getInstance()->setError(i18n::__('errorLengthHumidity', NULL, 'default', array('%humedad%' => $humedad, '%caracteres%' => bagazoTableClass::HUMEDAD_LENGTH)), 'errorHumedad');
            $bandera = true;
            session::getInstance()->setFlash(bagazoTableClass::getNameField(bagazoTableClass::HUMEDAD, true), true);
        } else if (!is_numeric($humedad)) {
            session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorHumedad');
            $bandera = true;
            session::getInstance()->setFlash(bagazoTableClass::getNameField(bagazoTableClass::HUMEDAD, true), true);
        } else if ($humedad === '' or $humedad === NULL) {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorHumedad');
            $bandera = true;
            session::getInstance()->setFlash(bagazoTableClass::getNameField(bagazoTableClass::HUMEDAD, true), true);
        } 
        if (strlen($sacarosa) > bagazoTableClass::SACAROSA_LENGHT) {
            session::getInstance()->setError(i18n::__('errorLengthSaccharose', NULL, 'default', array('%sacarosa%' => $sacarosa, '%caracteres%' => bagazoTableClass::SACAROSA_LENGHT)), 'errorSacarosa');
            $bandera = true;
            session::getInstance()->setFlash(bagazoTableClass::getNameField(bagazoTableClass::SACAROSA, true), true);
        }if (!is_numeric($sacarosa)) {
            session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorSacarosa');
            $bandera = true;
            session::getInstance()->setFlash(bagazoTableClass::getNameField(bagazoTableClass::SACAROSA, true), true);
        } else if ($sacarosa === '' or $sacarosa === NULL) {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorSacarosa');
            $bandera = true;
            session::getInstance()->setFlash(bagazoTableClass::getNameField(bagazoTableClass::SACAROSA, true), true);
        }    
        if ($bandera === true) {
            request::getInstance()->setMethod('GET');
            routing::getInstance()->forward('bagazo', 'insert');
        }
    }

}
