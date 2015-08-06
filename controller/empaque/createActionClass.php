<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Empaque
 *
 * @author Cristian Ramirez <cristianxdramirez@gmail.com>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST') === TRUE) {

                $fecha = trim(request::getInstance()->getPost(empaqueTableClass::getNameField(empaqueTableClass::FECHA, true)));
                $cantidad = trim(request::getInstance()->getPost(empaqueTableClass::getNameField(empaqueTableClass::CANTIDAD, true)));
                $empleado_id = trim(request::getInstance()->getPost(empaqueTableClass::getNameField(empaqueTableClass::EMPLEADO_ID, true)));
                $tipo_empaque_id = trim(request::getInstance()->getPost(empaqueTableClass::getNameField(empaqueTableClass::TIPO_EMPAQUE_ID, true)));
                $insumo_id = request::getInstance()->getPost(empaqueTableClass::getNameField(empaqueTableClass::INSUMO_ID, true));

                $this->Validate($fecha, $cantidad, $empleado_id, $tipo_empaque_id, $insumo_id);

                $data = array(
                    empaqueTableClass::FECHA => $fecha,
                    empaqueTableClass::CANTIDAD => $cantidad,
                    empaqueTableClass::EMPLEADO_ID => $empleado_id,
                    empaqueTableClass::TIPO_EMPAQUE_ID => $tipo_empaque_id,
                    empaqueTableClass::INSUMO_ID => $insumo_id,
                );
                empaqueTableClass::insert($data);
                session::getInstance()->setSuccess(i18n::__('successfulRegister'));
                routing::getInstance()->redirect('empaque', 'index');
            } else {
                routing::getInstance()->redirect('empaque', 'index');
            }
        } catch (PDOException $exc) {
            routing::getInstance()->redirect('empaque', 'insert');
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

    private function Validate($fecha, $cantidad, $empleado_id, $tipo_empaque_id, $insumo_id) {
        $bandera = FALSE;

        if ($fecha === '') {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorFecha');
            $bandera = true;
            session::getInstance()->setFlash(empaqueTableClass::getNameField(empaqueTableClass::FECHA, true), true);
        }

        if (strlen($cantidad) > empaqueTableClass::CANTIDAD_LEGTH) {
            session::getInstance()->setError(i18n::__('errorLenghtAmount', NULL, 'default', array('%cantidad%' => $cantidad, '%caracteres%' => empaqueTableClass::CANTIDAD_LEGTH)), 'errorCantidad');
            $bandera = true;
            session::getInstance()->setFlash(empaqueTableClass::getNameField(empaqueTableClass::CANTIDAD, true), true);
        }

        

        if ($cantidad === '') {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorCantidad');
            $bandera = true;
            session::getInstance()->setFlash(empaqueTableClass::getNameField(empaqueTableClass::CANTIDAD, true), true);
        }
        
        if (!is_numeric($cantidad)) {
             session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorCantidad');
             $bandera = true;
             session::getInstance()->setFlash(empaqueTableClass::getNameField(empaqueTableClass::CANTIDAD, true), true);
        }

        if ($bandera === true) {
            request::getInstance()->setMethod('GET');
            routing::getInstance()->forward('empaque', 'insert');
        }
    }

}
