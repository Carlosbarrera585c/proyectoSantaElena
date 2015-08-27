<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Mieles
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST') === TRUE) {

        $fecha = trim(request::getInstance()->getPost(mielesTableClass::getNameField(mielesTableClass::FECHA, true)));
        $turno = trim(request::getInstance()->getPost(mielesTableClass::getNameField(mielesTableClass::TURNO, true)));
        $empleadoId = trim(request::getInstance()->getPost(mielesTableClass::getNameField(mielesTableClass::EMPLEADO_ID, true)));
        $numCeba = trim(request::getInstance()->getPost(mielesTableClass::getNameField(mielesTableClass::NUM_CEBA, true)));
        $caja = request::getInstance()->getPost(mielesTableClass::getNameField(mielesTableClass::CAJA, true));
        $observacion = trim(request::getInstance()->getPost(mielesTableClass::getNameField(mielesTableClass::OBSERVACION, true)));

        $this->ValidateMieles($fecha, $turno, $empleadoId, $numCeba, $caja, $observacion);

        $data = array(
            mielesTableClass::FECHA => $fecha,
            mielesTableClass::TURNO => $turno,
            mielesTableClass::EMPLEADO_ID => $empleadoId,
            mielesTableClass::NUM_CEBA => $numCeba,
            mielesTableClass::CAJA => $caja,
            mielesTableClass::OBSERVACION => $observacion
        );
        mielesTableClass::insert($data);
        session::getInstance()->setSuccess(i18n::__('successfulRegister'));
        routing::getInstance()->redirect('mieles', 'index');
      } else {
        routing::getInstance()->redirect('mieles', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

  private function ValidateMieles($fecha, $turno, $empleadoId, $numCeba, $caja, $observacion) {
    $bandera = FALSE;
    //VALIDAR TURNO
    if (strlen($turno) > mielesTableClass::TURNO_LENGTH) {
      session::getInstance()->setError(i18n::__('errorLengthTurn', NULL, 'default', array('%nombre%' => $turno, '%caracteres%' => mielesTableClass::TURNO_LENGTH)), 'errorTurno');
      $bandera = true;
      session::getInstance()->setFlash(mielesTableClass::getNameField(mielesTableClass::TURNO, true), true);
    } elseif (!preg_match('/^[a-zA-Z ]*$/', $turno)) {
      session::getInstance()->setError(i18n::__('errorText', NULL, 'default', array('%texto%' => $turno)), 'errorTurno');
      $bandera = true;
      session::getInstance()->setFlash(mielesTableClass::getNameField(mielesTableClass::TURNO, true), true);
    } elseif ($turno === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorTurno');
      $bandera = true;
      session::getInstance()->setFlash(mielesTableClass::getNameField(mielesTableClass::TURNO, true), true);
    }
    //FIN VALIDAR TURNO
    //VALIDAR EMPLEADO
    if (strlen($empleadoId) > mielesTableClass::EMPLEADO_ID_LENGTH) {
      session::getInstance()->setError(i18n::__('errorLengthEmployee', NULL, 'default', array('%nombre%' => $empleadoId, '%caracteres%' => mielesTableClass::EMPLEADO_ID_LENGTH)), 'errorEmpleadoId');
      $bandera = true;
      session::getInstance()->setFlash(mielesTableClass::getNameField(mielesTableClass::EMPLEADO_ID, true), true);
    } elseif ($empleadoId === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorEmpleadoId');
      $bandera = true;
      session::getInstance()->setFlash(mielesTableClass::getNameField(mielesTableClass::EMPLEADO_ID, true), true);
    }
    //FIN VALIDAR EMPLEADO
    //VALIDAR CEBA
    if (strlen($numCeba) > mielesTableClass::NUM_CEBA_LENGTH) {
      session::getInstance()->setError(i18n::__('errorLengthFattening', NULL, 'default', array('%ceba%' => $numCeba, '%caracteres%' => mielesTableClass::NUM_CEBA_LENGTH)), 'errorNumCeba');
      $bandera = true;
      session::getInstance()->setFlash(mielesTableClass::getNameField(mielesTableClass::NUM_CEBA, true), true);
    } elseif (!is_numeric($numCeba)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorNumCeba');
      $bandera = true;
      session::getInstance()->setFlash(mielesTableClass::getNameField(mielesTableClass::NUM_CEBA, true), true);
    } elseif ($numCeba === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorNumCeba');
      $bandera = true;
      session::getInstance()->setFlash(mielesTableClass::getNameField(mielesTableClass::NUM_CEBA, true), true);
    }
    //FIN VALIDAR CEBA
    //VALIDAR CAJA
    if (strlen($caja) > mielesTableClass::CAJA_LENGTH) {
      session::getInstance()->setError(i18n::__('errorLengthBox', NULL, 'default', array('%caja%' => $caja, '%caracteres%' => mielesTableClass::CAJA_LENGTH)), 'errorCaja');
      $bandera = true;
      session::getInstance()->setFlash(mielesTableClass::getNameField(mielesTableClass::CAJA, true), true);
    } elseif (!is_numeric($caja)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorNumCeba');
      $bandera = true;
      session::getInstance()->setFlash(mielesTableClass::getNameField(mielesTableClass::CAJA, true), true);
    } elseif ($caja === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorCaja');
      $bandera = true;
      session::getInstance()->setFlash(mielesTableClass::getNameField(mielesTableClass::CAJA, true), true);
    }
    //FIN VALIDAR CAJA
    //VALIDAR OBSERVACION
    if (strlen($observacion) > mielesTableClass::OBSERVACION_LENGTH) {
      session::getInstance()->setError(i18n::__('errorLengthCredential', NULL, 'default', array('%descripcion%' => $observacion, '%caracteres%' => mielesTableClass::OBSERVACION_LENGTH)), 'errorObservacion');
      $bandera = true;
      session::getInstance()->setFlash(mielesTableClass::getNameField(mielesTableClass::OBSERVACION, true), true);
    } elseif ($observacion === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorObservacion');
      $bandera = true;
      session::getInstance()->setFlash(mielesTableClass::getNameField(mielesTableClass::OBSERVACION, true), true);
    }
    //FIN VALIDAR OBSERVACION
    if ($bandera === true) {
      request::getInstance()->setMethod('GET');
      routing::getInstance()->forward('mieles', 'insert');
    }
  }

}

//    
//     if (!preg_match('{^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$}', $correo)) {
//          throw new PDOException('Correo Invalido');
//        }
//        if (preg_match('{^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$}', $correo)) {
//          throw new PDOException('Correo Valido');
//        }
    