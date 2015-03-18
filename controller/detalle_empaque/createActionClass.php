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
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $cantidad = request::getInstance()->getPost(detalleEmpaqueTableClass::getNameField(detalleEmpaqueTableClass::CANTIDAD, true));
                $insumo_id = request::getInstance()->getPost(detalleEmpaqueTableClass::getNameField(detalleEmpaqueTableClass::INSUMO_ID, true));
                $empaque_id = request::getInstance()->getPost(detalleEmpaqueTableClass::getNameField(detalleEmpaqueTableClass::EMPAQUE_ID, true));

                $data = array(
                    detalleEmpaqueTableClass::CANTIDAD => $cantidad,
                    detalleEmpaqueTableClass::INSUMO_ID => $insumo_id,
                    detalleEmpaqueTableClass::EMPAQUE_ID => $empaque_id
                );
                detalleEmpaqueTableClass::insert($data);
                session::getInstance()->setSuccess(i18n::__('successfulRegister'));
                routing::getInstance()->redirect('detalleEmpaque', 'index');
            } else {
                routing::getInstance()->redirect('detalleEmpaque', 'index');
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
            session::getInstance()->setError(i18n::__('failureToRegister'));
        }
    }

}
