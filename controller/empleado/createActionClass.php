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
            if (request::getInstance()->isMethod('POST') === TRUE) {

                $nom_empleado = trim(request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::NOM_EMPLEADO, true)));
                $apell_empleado = trim(request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::APELL_EMPLEADO, true)));
                $telefono = trim(request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::TELEFONO, true)));
                $direccion = trim(request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::DIRECCION, true)));
                $tipo_id = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::TIPO_ID_ID, true));
                $numero_identificacion = trim(request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::NUMERO_IDENTIFICACION, true)));
                $credencial_id = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::CREDENCIAL_ID, true));
                $correo = trim(request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::CORREO, true) . '_1'));
                $correo2 = trim(request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::CORREO, true) . '_2'));

                $this->Validate($nom_empleado, $apell_empleado, $telefono, $direccion, $tipo_id, $numero_identificacion, $credencial_id, $correo, $correo2);

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
            routing::getInstance()->redirect('empleado', 'insert');
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

    private function Validate($nom_empleado, $apell_empleado, $telefono, $direccion, $tipo_id, $numero_identificacion, $credencial_id, $correo, $correo2) {
        $bandera = FALSE;
        if (strlen($nom_empleado) > empleadoTableClass::NOM_EMPLEADO_LENGTH) {
            session::getInstance()->setError(i18n::__('errorLengthEmployee', NULL, 'default', array('%nombre%' => $nom_empleado, '%caracteres%' => empleadoTableClass::NOM_EMPLEADO_LENGTH)));
            $bandera = true;
            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::NOM_EMPLEADO, true), true);
        }
        if (strlen($apell_empleado) > empleadoTableClass::APELL_EMPLEADO_LENGTH) {
            session::getInstance()->setError(i18n::__('errorLengthLastEmployee', NULL, 'default', array('%apellido%' => $apell_empleado, '%caracteres%' => empleadoTableClass::APELL_EMPLEADO_LENGTH)));
            $bandera = true;
            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::APELL_EMPLEADO, true), true);
        }
        if ($telefono > empleadoTableClass::TELEFONO) {
            session::getInstance()->setError(i18n::__('errorLengthPhone', NULL, 'default', array('%telefono%' => $telefono, '%caracteres%' => empleadoTableClass::TELEFONO_LENGTH)));
            $bandera = true;
            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::TELEFONO, true), true);
        }
        if (!is_numeric($telefono)) {
            session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::TELEFONO, true), true);
        }
        if (strlen($direccion) > empleadoTableClass::DIRECCION_LENGTH) {
            session::getInstance()->setError(i18n::__('errorLengthDirection', NULL, 'default', array('%direccion%' => $direccion, '%caracteres%' => empleadoTableClass::DIRECCION_LENGTH)));
            $bandera = true;
            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::DIRECCION, true), true);
        }
        if (strlen($numero_identificacion) > empleadoTableClass::NUMERO_IDENTIFICACION_LENGTH) {
            session::getInstance()->setError(i18n::__('errorLengthNumIdentification', NULL, 'default', array('%numIdentification%' => $numero_identificacion, '%caracteres%' => empleadoTableClass::NUMERO_IDENTIFICACION_LENGTH)));
            $bandera = true;
            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::NUMERO_IDENTIFICACION, true), true);
        }
        if (!is_numeric($numero_identificacion)) {
            session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::NUMERO_IDENTIFICACION, true), true);
        }
        if ($correo !== $correo2) {
            session::getInstance()->setError(i18n::__('errorMail', NULL, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::CORREO, true), true);
        }
        if (!preg_match('{^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$}', $correo)) {
            session::getInstance()->setError(i18n::__('errorMailCharacters', NULL, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::CORREO, true), true);
        }
        if ($nom_empleado === '') {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::NOM_EMPLEADO, true), true);
        }
        if ($apell_empleado === '') {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::APELL_EMPLEADO, true), true);
        }
        if ($telefono === '') {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::TELEFONO, true), true);
        }
        if ($direccion === '') {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::DIRECCION, true), true);
        }
        if ($numero_identificacion === '') {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::NUMERO_IDENTIFICACION, true), true);
        }
        if ($correo === '') {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::CORREO, true), true);
        }
        if ($correo2 === '') {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::CORREO, true), true);
        }
        if (!ereg("^[A-Za-z_]*$", $nom_empleado)) {
            session::getInstance()->setError(i18n::__('errorText', NULL, 'default', array('%texto%' => $nom_empleado)));
            $bandera = true;
            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::NOM_EMPLEADO, true), true);
        }
        if (!ereg("^[A-Za-z_]*$", $apell_empleado)) {
            session::getInstance()->setError(i18n::__('errorText', NULL, 'default', array('%texto%' => $apell_empleado)));
            $bandera = true;
            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::APELL_EMPLEADO, true), true);
        }
        if ($bandera === true) {
            request::getInstance()->setMethod('GET');
            routing::getInstance()->forward('empleado', 'insert');
        }
    }

}
