<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Clarificacion
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST') === TRUE) {

        $fecha = trim(request::getInstance()->getPost(clarificacionTableClass::getNameField(clarificacionTableClass::FECHA, true)));
        $numBache = trim(request::getInstance()->getPost(clarificacionTableClass::getNameField(clarificacionTableClass::NUM_BACHE, true)));
        $turno = trim(request::getInstance()->getPost(clarificacionTableClass::getNameField(clarificacionTableClass::TURNO, true)));
        $empleadoId = trim(request::getInstance()->getPost(clarificacionTableClass::getNameField(clarificacionTableClass::EMPLEADO_ID, true)));
        $proveedorId = request::getInstance()->getPost(clarificacionTableClass::getNameField(clarificacionTableClass::PROVEEDOR_ID, true));
        $brix = trim(request::getInstance()->getPost(clarificacionTableClass::getNameField(clarificacionTableClass::BRIX, true)));
        $phDiluido = request::getInstance()->getPost(clarificacionTableClass::getNameField(clarificacionTableClass::PH_DILUIDO, true));
        $phClarificado = trim(request::getInstance()->getPost(clarificacionTableClass::getNameField(clarificacionTableClass::PH_CLARIFICADO, true)));
        $calDosificada = trim(request::getInstance()->getPost(clarificacionTableClass::getNameField(clarificacionTableClass::CAL_DOSIFICADA, true)));
        $floculante = trim(request::getInstance()->getPost(clarificacionTableClass::getNameField(clarificacionTableClass::FLOCULANTE, true)));

        $this->Validate($fecha, $numBache, $turno, $empleadoId, $proveedorId, $brix, $phDiluido, $phClarificado, $calDosificada, $floculante);

        $data = array(
            clarificacionTableClass::FECHA => $fecha,
            clarificacionTableClass::NUM_BACHE => $numBache,
            clarificacionTableClass::TURNO => $turno,
            clarificacionTableClass::EMPLEADO_ID => $empleadoId,
            clarificacionTableClass::PROVEEDOR_ID => $proveedorId,
            clarificacionTableClass::BRIX => $brix,
            clarificacionTableClass::PH_DILUIDO => $phDiluido,
            clarificacionTableClass::PH_CLARIFICADO => $phClarificado,
            clarificacionTableClass::CAL_DOSIFICADA => $calDosificada,
            clarificacionTableClass::FLOCULANTE => $floculante
        );
        clarificacionTableClass::insert($data);
        session::getInstance()->setSuccess(i18n::__('successfulRegister'));
        routing::getInstance()->redirect('clarificacion', 'index');
      } else {
        routing::getInstance()->redirect('clarificacion', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

  private function Validate($fecha, $numBache, $turno, $empleadoId, $proveedorId, $brix, $phDiluido, $phClarificado, $calDosificada, $floculante) {
    $bandera = FALSE;
    $pattern = "/^((19|20)?[0-9]{2})[\/|-](0?[1-9]|[1][012])[\/|-](0?[1-9]|[12][0-9]|3[01])$/";
    //validar fecha
    if (!preg_match($pattern, $fecha)) {
      session::getInstance()->setError(i18n::__('errorDate', NULL, 'default'), 'errorFecha');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::FECHA, true), true);
    } elseif ($fecha == '') {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorFecha');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::FECHA, true), true);
    }
    //validar Bache
    if (strlen($numBache) > clarificacionTableClass::NUM_BACHE_LENGTH) {
      session::getInstance()->setError(i18n::__('errorLengthEmployee', NULL, 'default', array('%nombre%' => $numBache, '%caracteres%' => clarificacionTableClass::NUM_BACHE_LENGTH)), 'errorBache');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::NUM_BACHE, true), true);
    } elseif ($numBache === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorBache');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::NUM_BACHE, true), true);
    } elseif (!is_numeric($numBache)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorBache');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::NUM_BACHE, true), true);
    }
    //validar Turno
    if (strlen($turno) > clarificacionTableClass::TURNO_LENGTH) {
      session::getInstance()->setError(i18n::__('errorLengthLastEmployee', NULL, 'default', array('%apellido%' => $turno, '%caracteres%' => clarificacionTableClass::TURNO_LENGTH)), 'errorTurno');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::TURNO, true), true);
    } elseif (!preg_match('/^[a-zA-Z ]*$/', $turno)) {
      session::getInstance()->setError(i18n::__('errorText', NULL, 'default', array('%texto%' => $turno)), 'errorTurno');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::TURNO, true), true);
    } elseif ($turno === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorTurno');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::TURNO, true), true);
    }
    //validar empleado
    if (strlen($empleadoId) > clarificacionTableClass::EMPLEADO_ID_LENGTH) {
      session::getInstance()->setError(i18n::__('errorLengthEmployee', NULL, 'default', array('%nombre%' => $empleadoId, '%caracteres%' => clarificacionTableClass::EMPLEADO_ID_LENGTH)), 'errorEmpleado');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::EMPLEADO_ID, true), true);
    } elseif ($empleadoId === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorEmpleado');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::EMPLEADO_ID, true), true);
    } elseif (!is_numeric($empleadoId)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorEmpleado');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::EMPLEADO_ID, true), true);
    }
    //validar proveedor
    if (strlen($proveedorId) > clarificacionTableClass::PROVEEDOR_ID_LENGTH) {
      session::getInstance()->setError(i18n::__('errorLengthEmployee', NULL, 'default', array('%nombre%' => $proveedorId, '%caracteres%' => clarificacionTableClass::PROVEEDOR_ID_LENGTH)), 'errorProveedor');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::PROVEEDOR_ID, true), true);
    } elseif ($proveedorId === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorProveedor');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::PROVEEDOR_ID, true), true);
    } elseif (!is_numeric($proveedorId)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorProveedor');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::PROVEEDOR_ID, true), true);
    }
    //validar brix
    if (strlen($brix) > clarificacionTableClass::BRIX_LENGTH) {
      session::getInstance()->setError(i18n::__('errorLengthEmployee', NULL, 'default', array('%nombre%' => $brix, '%caracteres%' => clarificacionTableClass::BRIX_LENGTH)), 'errorBrix');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::BRIX, true), true);
    } elseif ($brix === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorBrix');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::BRIX, true), true);
    } elseif (!is_numeric($brix)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorBrix');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::BRIX, true), true);
    }
    //validar ph diluido
    if (strlen($phDiluido) > clarificacionTableClass::PH_DILUIDO_LENGTH) {
      session::getInstance()->setError(i18n::__('errorLengthEmployee', NULL, 'default', array('%nombre%' => $phDiluido, '%caracteres%' => clarificacionTableClass::PH_DILUIDO_LENGTH)), 'errorPhDiluido');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::PH_DILUIDO, true), true);
    } elseif ($phDiluido === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorPhDiluido');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::PH_DILUIDO, true), true);
    } elseif (!is_numeric($phDiluido)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorPhDiluido');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::PH_DILUIDO, true), true);
    }
    //validar ph clarificado
    if (strlen($phClarificado) > clarificacionTableClass::PH_CLARIFICADO_LENGTH) {
      session::getInstance()->setError(i18n::__('errorLengthEmployee', NULL, 'default', array('%nombre%' => $phClarificado, '%caracteres%' => clarificacionTableClass::PH_CLARIFICADO_LENGTH)), 'errorPhClarificado');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::PH_CLARIFICADO, true), true);
    } elseif ($phClarificado === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorPhClarificado');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::PH_CLARIFICADO, true), true);
    } elseif (!is_numeric($phClarificado)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorPhClarificado');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::PH_CLARIFICADO, true), true);
    }
    //validar ph cal dosificada
    if (strlen($calDosificada) > clarificacionTableClass::CAL_DOSIFICADA_LENGTH) {
      session::getInstance()->setError(i18n::__('errorLengthEmployee', NULL, 'default', array('%nombre%' => $calDosificada, '%caracteres%' => clarificacionTableClass::CAL_DOSIFICADA_LENGTH)), 'errorCalDosificado');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::CAL_DOSIFICADA, true), true);
    } elseif ($calDosificada === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorCalDosificado');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::CAL_DOSIFICADA, true), true);
    } elseif (!is_numeric($calDosificada)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorCalDosificado');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::CAL_DOSIFICADA, true), true);
    }
    //validar ph floculante
    if (strlen($floculante) > clarificacionTableClass::FLOCULANTE_LENGTH) {
      session::getInstance()->setError(i18n::__('errorLengthEmployee', NULL, 'default', array('%nombre%' => $floculante, '%caracteres%' => clarificacionTableClass::FLOCULANTE_LENGTH)), 'errorFloculante');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::FLOCULANTE, true), true);
    } elseif ($floculante === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorFloculante');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::FLOCULANTE, true), true);
    } elseif (!is_numeric($floculante)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorFloculante');
      $bandera = true;
      session::getInstance()->setFlash(clarificacionTableClass::getNameField(clarificacionTableClass::FLOCULANTE, true), true);
    }
    if ($bandera === true) {
      request::getInstance()->setMethod('GET');
      routing::getInstance()->forward('clarificacion', 'insert');
    }
  }

}
