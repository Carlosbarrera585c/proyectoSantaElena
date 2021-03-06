
<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Empleado
 *
* @author Cristian Ramirez <cristianRamirezXD@outlook.es>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {
                $id = trim(request::getInstance()->getPost(empaqueTableClass::getNameField(empaqueTableClass::ID, true)));
                $fecha = trim(request::getInstance()->getPost(empaqueTableClass::getNameField(empaqueTableClass::FECHA, true)));
                $cantidad = trim(request::getInstance()->getPost(empaqueTableClass::getNameField(empaqueTableClass::CANTIDAD, true)));
                $empleado_id = trim(request::getInstance()->getPost(empaqueTableClass::getNameField(empaqueTableClass::EMPLEADO_ID, true)));
                $tipo_empaque_id = trim(request::getInstance()->getPost(empaqueTableClass::getNameField(empaqueTableClass::TIPO_EMPAQUE_ID, true)));
               
                $this->Validate($fecha, $cantidad, $empleado_id, $tipo_empaque_id);
                $ids = array(
                    empaqueTableClass::ID => $id
                );
                
                $this->Validate($fecha, $cantidad, $empleado_id, $tipo_empaque_id);
                
                $data = array(
                    empaqueTableClass::FECHA => $fecha,
                    empaqueTableClass::CANTIDAD => $cantidad,
                    empaqueTableClass::EMPLEADO_ID => $empleado_id,
                    empaqueTableClass::TIPO_EMPAQUE_ID => $tipo_empaque_id,
                    
                );
                empaqueTableClass::update($ids, $data);
            }
            session::getInstance()->setSuccess(i18n::__('successfulUpdate'));
            routing::getInstance()->redirect('empaque', 'index');
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }
    
    private function Validate($fecha, $cantidad, $empleado_id, $tipo_empaque_id) {
        $bandera = FALSE;
        $pattern = "/^((19|20)?[0-9]{2})[\/|-](0?[1-9]|[1][012])[\/|-](0?[1-9]|[12][0-9]|3[01])$/";
        if ($fecha === '' or $fecha === NULL) {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorFecha');
            $bandera = true;
            session::getInstance()->setFlash(empaqueTableClass::getNameField(empaqueTableClass::FECHA, true), true);
        }

        if (strlen($cantidad) > empaqueTableClass::CANTIDAD_LEGTH) {
            session::getInstance()->setError(i18n::__('errorLengthAmount', NULL, 'default', array('%cantidad%' => $cantidad, '%caracteres%' => empaqueTableClass::CANTIDAD_LEGTH)), 'errorCantidad');
            $bandera = true;
            session::getInstance()->setFlash(empaqueTableClass::getNameField(empaqueTableClass::CANTIDAD, true), true);
        }
        if ($cantidad === '' or $cantidad === NULL) {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorCantidad');
            $bandera = true;
            session::getInstance()->setFlash(empaqueTableClass::getNameField(empaqueTableClass::CANTIDAD, true), true);
        }

        if ($empleado_id === '' or $empleado_id === NULL) {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorEmpleado');
            $bandera = true;
            session::getInstance()->setFlash(empaqueTableClass::getNameField(empaqueTableClass::EMPLEADO_ID, true), true);
        }
        
        if ($tipo_empaque_id === '' or $tipo_empaque_id === NULL) {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorTipo');
            $bandera = true;
            session::getInstance()->setFlash(empaqueTableClass::getNameField(empaqueTableClass::TIPO_EMPAQUE_ID, true), true);
        }
        
        if (!is_numeric($cantidad)) {
            session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorCantidad');
            $bandera = true;
            session::getInstance()->setFlash(empaqueTableClass::getNameField(empaqueTableClass::CANTIDAD, true), true);
        }
        if (!is_numeric($empleado_id)) {
            session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorEmpleado');
            $bandera = true;
            session::getInstance()->setFlash(empaqueTableClass::getNameField(empaqueTableClass::EMPLEADO_ID, true), true);
        }
         if (!is_numeric($tipo_empaque_id)) {
            session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorTipo');
            $bandera = true;
            session::getInstance()->setFlash(empaqueTableClass::getNameField(empaqueTableClass::TIPO_EMPAQUE_ID, true), true);
        }
       
        //validar fecha
        if (!preg_match($pattern, $fecha)) {
            session::getInstance()->setError(i18n::__('errorDate', NULL, 'default'), 'errorFecha');
            $bandera = true;
            session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::FECHA, true), true);
        }
        if ($bandera === true) {
            request::getInstance()->setMethod('GET');
            request::getInstance()->addParamGet(array(empaqueTableClass::ID => request::getInstance()->getPost(empaqueTableClass::getNameField(empaqueTableClass::ID, TRUE))));
            routing::getInstance()->forward('empaque', 'edit');
        }
    
    }

    
    }