
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
                
                $id = trim(request::getInstance()->getPost(bagazoTableClass::getNameField(bagazoTableClass::ID, true)));
                $humedad = trim(request::getInstance()->getPost(bagazoTableClass::getNameField(bagazoTableClass::HUMEDAD, true)));
				$brix = trim(request::getInstance()->getPost(bagazoTableClass::getNameField(bagazoTableClass::BRIX, true)));
				$sacarosa = trim(request::getInstance()->getPost(bagazoTableClass::getNameField(bagazoTableClass::SACAROSA, true)));
                $control_id = trim(request::getInstance()->getPost(bagazoTableClass::getNameField(bagazoTableClass::CONTROL_ID, true)));
                $this->Validate($humedad, $brix, $sacarosa, $control_id);
                $ids = array(
                    bagazoTableClass::ID => $id
                );

                

                $data = array(
                    bagazoTableClass::HUMEDAD => $humedad,
					bagazoTableClass::BRIX => $brix,
					bagazoTableClass::SACAROSA => $sacarosa,
					bagazoTableClass::CONTROL_ID => $control_id,
                    
                );

                bagazoTableClass::update($ids, $data);
            }
            session::getInstance()->setSuccess(i18n::__('successfulUpdate'));
            session::getInstance()->setAttribute('form_' . bagazoTableClass::getNameTable(), null);
            routing::getInstance()->redirect('bagazo', 'index');
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
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
            request::getInstance()->addParamGet(array(bagazoTableClass::ID => request::getInstance()->getPost(bagazoTableClass::getNameField(bagazoTableClass::ID, TRUE))));
            routing::getInstance()->forward('bagazo', 'edit');
        }
    }

}
