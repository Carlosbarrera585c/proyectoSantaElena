
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
                $insumo_id = request::getInstance()->getPost(empaqueTableClass::getNameField(empaqueTableClass::INSUMO_ID, true));

                $ids = array(
                    empaqueTableClass::ID => $id
                );
                
                $this->Validate($fecha, $cantidad, $empleado_id, $tipo_empaque_id, $insumo_id);
                
                $data = array(
                    empaqueTableClass::FECHA => $fecha,
                    empaqueTableClass::CANTIDAD => $cantidad,
                    empaqueTableClass::EMPLEADO_ID => $empleado_id,
                    empaqueTableClass::TIPO_EMPAQUE_ID => $tipo_empaque_id,
                    empaqueTableClass::INSUMO_ID => $insumo_id,
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
    


    private function Validate($fecha, $cantidad, $empleado_id, $tipo_empaque_id, $insumo_id) {
        $bandera = FALSE;
        if (strlen($cantidad) > empaqueTableClass::CANTIDAD_LEGTH) {
            session::getInstance()->setError(i18n::__('errorLenghtAmount', NULL, 'default', array('%cantidad%' => $cantidad, '%caracteres%' => empaqueTableClass::CANTIDAD_LEGTH)));
            $bandera = true;
            session::getInstance()->setFlash(empaqueTableClass::getNameField(empaqueTableClass::CANTIDAD, true), true);
        }        
        if ($bandera === true) {
            request::getInstance()->setMethod('GET');
            routing::getInstance()->forward('empaque', 'insert');
        }
    
    }

}
