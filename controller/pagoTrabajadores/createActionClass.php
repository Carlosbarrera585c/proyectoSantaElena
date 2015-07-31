<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Pago Trabajadores
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $idPago = request::getInstance()->getPost(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::ID, true));
                $fecha = request::getInstance()->getPost(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::FECHA, true));
                $periodoInicio = request::getInstance()->getPost(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_INICIO, true));
                $periodoFin = request::getInstance()->getPost(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_FIN, true));
                $idTipoPago = request::getInstance()->getPost(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::TIPO_PAGO_ID, true));
                $valor = request::getInstance()->getPost(pagoTrabajadoresTableClass::VALOR, true);
                $idEmpleado = request::getInstance()->getPost(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::TIPO_PAGO_ID, true));

                $this->Validate($idPago, $fecha, $periodoInicio, $periodoFin, $idTipoPago, $idEmpleado);

                $data = array(
                    pagoTrabajadoresTableClass::FECHA => $fecha,
                    pagoTrabajadoresTableClass::PERIODO_INICIO => $periodo_inicio,
                    pagoTrabajadoresTableClass::PERIODO_FIN => $periodo_fin,
                    pagoTrabajadoresTableClass::TIPO_PAGO_ID => $idTipoPago,
                    pagoTrabajadoresTableClass::VALOR => $valor,
                    pagoTrabajadoresTableClass::EMPLEADO_ID => $idEmpleado
                );

                PagoTrabajadoresTableClass::insert($data);
                session::getInstance()->setSuccess(i18n::__('successfulRegister'));
                routing::getInstance()->redirect('pagoTrabajadores', 'index');
            } else {
                routing::getInstance()->redirect('pagoTrabajadores', 'index');
            }
        } catch (PDOException $exc) {
            routing::getInstance()->redirect('empleado', 'insert');
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

    private function Validate($idPago, $fecha, $periodoInicio, $periodoFin, $idTipoPago, $idEmpleado) {
        $bandera = false;

        if ($idEmpleado === '') {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::EMPLEADO_ID, true), true);
        }
        if ($idTipoPago === '') {
            session::getInstance()->setError(i18n::__('errorNull', Null, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::TIPO_PAGO_ID, true), true);
        }
        if ($bandera === true) {
            request::getInstance()->setMethod('GET');
            routing::getInstance()->forward('pagoTrabajadores', 'insert');
        }
    }

}
