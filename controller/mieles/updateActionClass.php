
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
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $id = request::getInstance()->getPost(mielesTableClass::getNameField(mielesTableClass::ID, true));
        $fecha = trim(request::getInstance()->getPost(mielesTableClass::getNameField(mielesTableClass::FECHA, true)));
        $turno = trim(request::getInstance()->getPost(mielesTableClass::getNameField(mielesTableClass::TURNO, true)));
        $empleadoId = trim(request::getInstance()->getPost(mielesTableClass::getNameField(mielesTableClass::EMPLEADO_ID, true)));
        $numCeba = trim(request::getInstance()->getPost(mielesTableClass::getNameField(mielesTableClass::NUM_CEBA, true)));
        $caja = request::getInstance()->getPost(mielesTableClass::getNameField(mielesTableClass::CAJA, true));
        $observacion = trim(request::getInstance()->getPost(mielesTableClass::getNameField(mielesTableClass::OBSERVACION, true)));

        $this->ValidateUpdate($fecha, $turno, $empleadoId, $numCeba, $caja, $observacion);

        $ids = array(
            mielesTableClass::ID => $id
        );
        $data = array(
            mielesTableClass::FECHA => $fecha,
            mielesTableClass::TURNO => $turno,
            mielesTableClass::EMPLEADO_ID => $empleadoId,
            mielesTableClass::NUM_CEBA => $numCeba,
            mielesTableClass::CAJA => $caja,
            mielesTableClass::OBSERVACION => $observacion
        );
        mielesTableClass::update($ids, $data);
      }
      session::getInstance()->setSuccess(i18n::__('successfulUpdate'));
      session::getInstance()->setAttribute('form_' . mielesTableClass::getNameTable(), null);
      routing::getInstance()->redirect('mieles', 'index');
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

  private function ValidateUpdate($fecha, $turno, $empleadoId, $numCeba, $caja, $observacion) {

    $bandera = FALSE;
    //VALIDAR TURNO
    if (strlen($turno) > mielesTableClass::TURNO_LENGTH) {
      session::getInstance()->setError(i18n::__('errorLengthEmployee', NULL, 'default', array('%nombre%' => $turno, '%caracteres%' => mielesTableClass::TURNO_LENGTH)), 'errorTurno');
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
      session::getInstance()->setError(i18n::__('errorLengthLastEmployee', NULL, 'default', array('%apellido%' => $empleadoId, '%caracteres%' => mielesTableClass::EMPLEADO_ID_LENGTH)), 'errorEmpleadoId');
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
      session::getInstance()->setError(i18n::__('errorLengthPhone', NULL, 'default', array('%telefono%' => $numCeba, '%caracteres%' => mielesTableClass::NUM_CEBA_LENGTH)), 'errorNumCeba');
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
      session::getInstance()->setError(i18n::__('errorLengthDirection', NULL, 'default', array('%direccion%' => $caja, '%caracteres%' => mielesTableClass::CAJA_LENGTH)), 'errorDireccion');
      $bandera = true;
      session::getInstance()->setFlash(mielesTableClass::getNameField(mielesTableClass::CAJA, true), true);
    } elseif (!is_numeric($caja)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorNumCeba');
      $bandera = true;
      session::getInstance()->setFlash(mielesTableClass::getNameField(mielesTableClass::CAJA, true), true);
    } elseif ($caja === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorDireccion');
      $bandera = true;
      session::getInstance()->setFlash(mielesTableClass::getNameField(mielesTableClass::CAJA, true), true);
    }
    //FIN VALIDAR CAJA
    //VALIDAR OBSERVACION
    if (strlen($observacion) > mielesTableClass::OBSERVACION_LENGTH) {
      session::getInstance()->setError(i18n::__('errorLengthLastEmployee', NULL, 'default', array('%apellido%' => $observacion, '%caracteres%' => mielesTableClass::OBSERVACION_LENGTH)), 'errorObservacion');
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
      request::getInstance()->addParamGet(array(mielesTableClass::ID => request::getInstance()->getPost(mielesTableClass::getNameField(mielesTableClass::ID, TRUE))));
      routing::getInstance()->forward('mieles', 'edit');
    }
  }

}
