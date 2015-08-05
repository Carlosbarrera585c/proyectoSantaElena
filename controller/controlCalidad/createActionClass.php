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
 * Description of create CreateActionClass
 * @author  Bayron Henao <bairon_henao_1995@hotmail.com> 
 * @method post  los datos de la tabla llegan por metodo post.
 * @param getNameField se especifica los nombres de los capos contenidos en la tabla.
 * $data los datos del recorrido de la tabla controlCalidad se guardan
 * en la variable $data  
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
        $fecha = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::FECHA, true));
        $turno = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::TURNO, true));
        $brix = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::BRIX, true));
        $ph = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::PH, true));
        $ar = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::AR, true));
        $sacarosa = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::SACAROSA, true));
        $pureza = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::PUREZA, true));
        $empleado_id = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::EMPLEADO_ID, true));
        $proveedor_id = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::PROVEEDOR_ID, true));
//        echo $empleado_id;
//        echo $proveedor_id;
//        exit();
        $this->Validate($turno, $brix, $ph, $ar, $sacarosa, $pureza, $empleado_id, $proveedor_id, $fecha);

        $data = array(
            controlCalidadTableClass::FECHA => $fecha,
            controlCalidadTableClass::TURNO => $turno,
            controlCalidadTableClass::BRIX => $brix,
            controlCalidadTableClass::PH => $ph,
            controlCalidadTableClass::AR => $ar,
            controlCalidadTableClass::SACAROSA => $sacarosa,
            controlCalidadTableClass::PUREZA => $pureza,
            controlCalidadTableClass::EMPLEADO_ID => $empleado_id,
            controlCalidadTableClass::PROVEEDOR_ID => $proveedor_id
        );


        controlCalidadTableClass::insert($data);
        session::getInstance()->setSuccess(i18n::__('successfulRegister'));
        routing::getInstance()->redirect('controlCalidad', 'index');
      } else {
        routing::getInstance()->redirect('controlCalidad', 'index');
      }
    } catch (PDOException $exc) {
      routing::getInstance()->redirect('controlCalidad', 'insert');
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }
//funcion para validacion de campos en formulario 
  private function Validate($turno, $brix, $ph, $ar, $sacarosa, $pureza, $empleado_id, $proveedor_id, $fecha) {
    $bandera = FALSE;
    $pattern="/^((19|20)?[0-9]{2})[\/|-](0?[1-9]|[1][012])[\/|-](0?[1-9]|[12][0-9]|3[01])$/";
//validaciones para que no se superen el maximo de caracteres.
    if (strlen($turno) > controlCalidadTableClass::TURNO_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLenghtTurn', NULL, 'default', array('%turno%' => $turno, '%caracteres%' => controlCalidadTableClass::TURNO_LENGHT)),'errorTurno');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::TURNO, true), true);
    }
    if (strlen($brix) > controlCalidadTableClass::BRIX_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLenghtBrix', NULL, 'default', array('%brix%' => $brix, '%caracteres%' => controlCalidadTableClass::BRIX_LENGHT)),'errorBrix');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::BRIX, true), true);
    }
    if (strlen($ph) > controlCalidadTableClass::PH_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLenghtPh', NULL, 'default', array('%ph%' => $ph, '%caracteres%' => controlCalidadTableClass::PH_LENGHT)),'errorPh');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::PH, true), true);
    }
    if (strlen($ar) > controlCalidadTableClass::AR_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLenghtAr', NULL, 'default', array('%ar%' => $ar, '%caracteres%' => controlCalidadTableClass::AR_LENGHT)),'errorAr');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::AR, true), true);
    }
    if (strlen($sacarosa) > controlCalidadTableClass::SACAROSA_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLenghtSaccharose', NULL, 'default', array('%sacarosa%' => $sacarosa, '%caracteres%' => controlCalidadTableClass::SACAROSA_LENGHT)),'errorSacarosa');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::SACAROSA, true), true);
    }
    if (strlen($pureza) > controlCalidadTableClass::PUREZA_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLenghtPurity', NULL, 'default', array('%pureza%' => $pureza, '%caracteres%' => controlCalidadTableClass::PUREZA_LENGHT)),'errorPureza');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::PUREZA, true), true);
    }
//validar que el campo sea solo texto
    if (!ereg("^[A-Za-z]*$", $turno)){
      session::getInstance()->setError(i18n::__('errorTexto', NULL, 'default'),'errorTurno');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::TURNO, true), true);
    }
 //validar que el campo sea numerico.
    if (!is_numeric($brix)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'),'errorBrix');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::BRIX, true), true);
    }
    if (!is_numeric($ph)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'),'errorPh');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::PH, true), true);
    }
    if (!is_numeric($ar)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'),'errorAr');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::AR, true), true);
    }
    if (!is_numeric($sacarosa)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'),'errorSacarosa');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::SACAROSA, true), true);
    }
    if (!is_numeric($pureza)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'),'errorPureza');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::PUREZA, true), true);
    }
    if (!is_numeric($empleado_id)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'),'errorEmpleado');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::EMPLEADO_ID, true), true);
    }
     if (!is_numeric($proveedor_id)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'),'errorProveedor');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::PROVEEDOR_ID, true), true);
    }
 //validar que no se envie el campo vacio o nulo
    if($turno === '' or $turno === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default').'errorTurno');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::TURNO, true), true);
    }
    if($brix === '' or $brix === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'),'errorBrix');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::BRIX, true), true);
    }
    if($ph === '' or $ph === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'),'errorPh');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::PH, true), true);
    }
    if($ar === '' or $ar === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'),'errorAr');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::AR, true), true);
    }
    if($sacarosa === '' or $sacarosa === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'),'errorSacarosa');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::SACAROSA, true), true);
    }
    if($pureza === '' or $pureza === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'),'errorPureza');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::PUREZA, true), true);
    }
     if($empleado_id === '' or $empleado_id === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'),'errorEmpleado');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::EMPLEADO_ID, true), true);
    }
    if($proveedor_id === '' or $proveedor_id === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'),'errorProveedor');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::PROVEEDOR_ID, true), true);
    }
    //validar fecha
    if(!preg_match($pattern, $fecha)){
      session::getInstance()->setError(i18n::__('errorDate', NULL, 'default'),'errorFecha');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::FECHA, true), true);
    }
    if ($bandera === true) {
      request::getInstance()->setMethod('GET');
      routing::getInstance()->forward('controlCalidad', 'insert');
    }
  }

}
