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
 * Description of ejemploClass
 *
 * @author Cristian Ramirez <ccristianramirezc@gmail.com>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $fecha = request::getInstance()->getPost(salidaBodegaTableClass::getNameField(salidaBodegaTableClass::FECHA, true));
                $proveedor_id = request::getInstance()->getPost(salidaBodegaTableClass::getNameField(salidaBodegaTableClass::PROVEEDOR_ID, true));
                $empleado_id = request::getInstance()->getPost(salidaBodegaTableClass::getNameField(salidaBodegaTableClass::EMPLEADO_ID, true));

                $this->Validate($fecha, $proveedor_id);
                
                $data = array(
                    salidaBodegaTableClass::FECHA => $fecha,
                    salidaBodegaTableClass::PROVEEDOR_ID => $proveedor_id,
                    salidaBodegaTableClass::EMPLEADO_ID => $empleado_id,
                );
                salidaBodegaTableClass::insert($data);
                session::getInstance()->setSuccess(i18n::__('successfulRegister'));
                routing::getInstance()->redirect('salidaBodega', 'index');
            } else {
                routing::getInstance()->redirect('salidaBodega', 'index');
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
            session::getInstance()->setError(i18n::__('failureToRegister'));
        }
    }

    private function Validate($fecha, $proveedor_id) {
        $bandera = FALSE;

        if ($fecha === '') {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(salidaBodegaTableClass::getNameField(salidaBodegaTableClass::FECHA, true), true);
        }

        if ($proveedor_id === '') {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(salidaBodegaTableClass::getNameField(salidaBodegaTableClass::PROVEEDOR_ID, true), true);
        }
        
        if ($proveedor_id === '') {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(salidaBodegaTableClass::getNameField(salidaBodegaTableClass::EMPLEADO_ID, true), true);
        }
        
        if ($bandera === true) {
            request::getInstance()->setMethod('GET');
            routing::getInstance()->forward('salidaBodega', 'insert');
        }
    }

}
