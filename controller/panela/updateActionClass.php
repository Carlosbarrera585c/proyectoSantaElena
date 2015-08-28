
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
                
                $id = trim(request::getInstance()->getPost(panelaTableClass::getNameField(panelaTableClass::ID, true)));
                $hora = trim(request::getInstance()->getPost(panelaTableClass::getNameField(panelaTableClass::HORA, true)));
                $proveedor_id = trim(request::getInstance()->getPost(panelaTableClass::getNameField(panelaTableClass::PROVEEDOR_ID, true)));
                $sedimento = trim(request::getInstance()->getPost(panelaTableClass::getNameField(panelaTableClass::SEDIMENTO, true)));
                $control_id = trim(request::getInstance()->getPost(panelaTableClass::getNameField(panelaTableClass::CONTROL_ID, true)));
                $this->Validate($hora, $proveedor_id, $sedimento, $control_id);
                $ids = array(
                    panelaTableClass::ID => $id
                );

               

                $data = array(

                    panelaTableClass::HORA => $hora,
                    panelaTableClass::PROVEEDOR_ID => $proveedor_id,
                    panelaTableClass::SEDIMENTO => $sedimento,
                    panelaTableClass::CONTROL_ID => $control_id
                );

                panelaTableClass::update($ids, $data);
            }
            session::getInstance()->setSuccess(i18n::__('successfulUpdate'));
            session::getInstance()->setAttribute('form_' . panelaTableClass::getNameTable(), null);
            routing::getInstance()->redirect('panela', 'index');
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

//funcion para validacion de campos en formulario 
    private function Validate($hora, $proveedor_id, $sedimento, $control_id) {
        $bandera = FALSE;
//		$patternHora="/^([0-1][0-9]|[2][0-3])[\:]([0-5][0-9])[\:]([0-5][0-9])$/";
        //validaciones para que no se superen el maximo de caracteres.

        if (strlen($sedimento) > panelaTableClass::SEDIMENTO_LENGHT) {
            session::getInstance()->setError(i18n::__('errorLengthSediment', NULL, 'default', array('%sedimento%' => $sedimento, '%caracteres%' => panelaTableClass::SEDIMENTO_LENGHT)), 'errorSedimento');
            $bandera = true;
            session::getInstance()->setFlash(panelaTableClass::getNameField(panelaTableClass::SEDIMENTO, true), true);
        } else  if (!is_numeric($sedimento)) {
            session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorSedimento');
            $bandera = true;
            session::getInstance()->setFlash(panelaTableClass::getNameField(panelaTableClass::SEDIMENTO, true), true);
        } else if (empty($sedimento) === true) {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorSedimento');
            $bandera = true;
            session::getInstance()->setFlash(panelaTableClass::getNameField(panelaTableClass::SEDIMENTO, true), true);
        }
        if (!is_numeric($proveedor_id)) {
            session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorProcedencia');
            $bandera = true;
            session::getInstance()->setFlash(panelaTableClass::getNameField(panelaTableClass::PROVEEDOR_ID, true), true);
		} else if (empty($proveedor_id) === true) {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorProcedencia');
            $bandera = true;
            session::getInstance()->setFlash(panelaTableClass::getNameField(panelaTableClass::PROVEEDOR_ID, true), true);
        }
		if (!is_numeric($control_id)) {
            session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorControl');
            $bandera = true;
            session::getInstance()->setFlash(panelaTableClass::getNameField(panelaTableClass::CONTROL_ID, true), true);
		} else if (empty($control_id) === true) {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorProcedencia');
            $bandera = true;
            session::getInstance()->setFlash(panelaTableClass::getNameField(panelaTableClass::CONTROL_ID, true), true);
        }
		  //validar hora
//    if(!preg_match($patternHora, $hora)){
//      session::getInstance()->setError(i18n::__('errorHour', NULL, 'default'),'errorHora');
//      $bandera = true;
//      session::getInstance()->setFlash(panelaTableClass::getNameField(panelaTableClass::HORA, true), true);
//    }  
		
        if ($bandera === true) {
            request::getInstance()->setMethod('GET');
            request::getInstance()->addParamGet(array(panelaTableClass::ID => request::getInstance()->getPost(panelaTableClass::getNameField(panelaTableClass::ID, TRUE))));
            routing::getInstance()->forward('panela', 'edit');
        }
    }

}
