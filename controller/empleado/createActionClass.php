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
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $nom_empleado = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::NOM_EMPLEADO, true));
                $apell_empleado = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::APELL_EMPLEADO, true));
                $telefono = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::TELEFONO, true));
                $direccion = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::DIRECCION, true));
                $tipo_id = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::TIPO_ID_ID, true));
                $numero_identificacion = request::getInstance()->getPost(empleadoTableClass::NUMERO_IDENTIFICACION, true);
                $credencial_id = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::CREDENCIAL_ID, true));
                $correo = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::CORREO, true));

                $data = array(
                    empleadoTableClass::NOM_EMPLEADO => $nom_empleado,
                    empleadoTableClass::APELL_EMPLEADO => $apell_empleado,
                    empleadoTableClass::TELEFONO => $telefono,
                    empleadoTableClass::DIRECCION => $direccion,
                    empleadoTableClass::TIPO_ID_ID => $tipo_id,
                    empleadoTableClass::NUMERO_IDENTIFICACION => $numero_identificacion,
                    empleadoTableClass::CREDENCIAL_ID => $credencial_id,
                    empleadoTableClass::CORREO => $correo
                );
                empleadoTableClass::insert($data);
                session::getInstance()->setSuccess(i18n::__('successfulRegister'));
                routing::getInstance()->redirect('empleado', 'index');
            } else {
                routing::getInstance()->redirect('empleado', 'index');
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
            session::getInstance()->setError(i18n::__('failureToRegister'));
        }
    }

}
