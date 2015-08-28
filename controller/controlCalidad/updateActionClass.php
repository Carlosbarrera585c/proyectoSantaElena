
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
 * @author Bayron Henao <bairon_henao_1995@hotmail.com>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
        $id = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::ID, true));
        $fecha = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::FECHA, true));
        $variedad = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::VARIEDAD, true));
        $edad = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::EDAD, true));
        $brix = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::BRIX, true));
        $ph = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::PH, true));
        $ar = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::AR, true));
        $sacarosa = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::SACAROSA, true));
        $pureza = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::PUREZA, true));
        $empleado_id = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::EMPLEADO_ID, true));
        $proveedor_id = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::PROVEEDOR_ID, true));
        $this->Validate($variedad, $brix, $ph, $ar, $sacarosa, $pureza ,$empleado_id, $proveedor_id, $fecha, $edad);
        $post = array(
            controlCalidadTableClass::FECHA => $fecha,
            controlCalidadTableClass::VARIEDAD => $variedad,
            controlCalidadTableClass::EDAD => $edad,
            controlCalidadTableClass::BRIX => $brix,
            controlCalidadTableClass::PH => $ph,
            controlCalidadTableClass::AR => $ar,
            controlCalidadTableClass::SACAROSA => $sacarosa,
            controlCalidadTableClass::PUREZA => $pureza,
            controlCalidadTableClass::EMPLEADO_ID => $empleado_id,
            controlCalidadTableClass::PROVEEDOR_ID => $proveedor_id
        );
        
        $ids = array(
            controlCalidadTableClass::ID => $id
        );

        $data = array(
            controlCalidadTableClass::ID => $id,
            controlCalidadTableClass::FECHA => $fecha,
            controlCalidadTableClass::VARIEDAD => $variedad,
            controlCalidadTableClass::EDAD => $edad,
            controlCalidadTableClass::BRIX => $brix,
            controlCalidadTableClass::PH => $ph,
            controlCalidadTableClass::AR => $ar,
            controlCalidadTableClass::SACAROSA => $sacarosa,
            controlCalidadTableClass::PUREZA => $pureza,
            controlCalidadTableClass::EMPLEADO_ID => $empleado_id,
            controlCalidadTableClass::PROVEEDOR_ID => $proveedor_id
        );

        controlCalidadTableClass::update($ids, $data);
      session::getInstance()->setSuccess(i18n::__('successfulUpdate'));
      session::getInstance()->setAttribute('form_'.controlCalidadTableClass::getNameTable(), null);
      routing::getInstance()->redirect('controlCalidad', 'index');
      }

    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
    }
  }
//funcion para validacion de campos en formulario 
  private function Validate($variedad, $brix, $ph, $ar, $sacarosa, $pureza, $empleado_id, $proveedor_id, $fecha,$edad) {
    $bandera = FALSE;
    $pattern="/^((19|20)?[0-9]{2})[\/|-](0?[1-9]|[1][012])[\/|-](0?[1-9]|[12][0-9]|3[01])$/";
//validaciones para que no se superen el maximo de caracteres.
    if (strlen($variedad) > controlCalidadTableClass::VARIEDAD_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLengthVariety', NULL, 'default', array('%variedad%' => $variedad, '%caracteres%' => controlCalidadTableClass::VARIEDAD)),'errorVariedad');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::VARIEDAD, true), true);
    }
     if (strlen($edad) > controlCalidadTableClass::EDAD_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLengthAge', NULL, 'default', array('%edad%' => $edad, '%caracteres%' => controlCalidadTableClass::EDAD)),'errorEdad');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::EDAD, true), true);
    }
    if (strlen($brix) > controlCalidadTableClass::BRIX_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLengthBrix', NULL, 'default', array('%brix%' => $brix, '%caracteres%' => controlCalidadTableClass::BRIX_LENGHT)),'errorBrix');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::BRIX, true), true);
    }
    if (strlen($ph) > controlCalidadTableClass::PH_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLengthPh', NULL, 'default', array('%ph%' => $ph, '%caracteres%' => controlCalidadTableClass::PH_LENGHT)),'errorPh');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::PH, true), true);
    }
    if (strlen($ar) > controlCalidadTableClass::AR_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLengthAr', NULL, 'default', array('%ar%' => $ar, '%caracteres%' => controlCalidadTableClass::AR_LENGHT)),'errorAr');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::AR, true), true);
    }
    if (strlen($sacarosa) > controlCalidadTableClass::SACAROSA_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLengthSaccharose', NULL, 'default', array('%sacarosa%' => $sacarosa, '%caracteres%' => controlCalidadTableClass::SACAROSA_LENGHT)),'errorSacarosa');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::SACAROSA, true), true);
    }
    if (strlen($pureza) > controlCalidadTableClass::PUREZA_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLengthPurity', NULL, 'default', array('%pureza%' => $pureza, '%caracteres%' => controlCalidadTableClass::PUREZA_LENGHT)),'errorPureza');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::PUREZA, true), true);
    }
//validar que el campo sea solo texto
     if (!preg_match('/^[a-zA-Z ]*$/', $variedad)) {
            session::getInstance()->setError(i18n::__('errorText', NULL, 'default'), 'errorVariedad');
            $bandera = true;
            session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::VARIEDAD, true), true);
        }
 //validar que el campo sea numerico.
     if (!is_numeric($edad)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'),'errorEdad');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::EDAD, true), true);
    }
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
    if($variedad === '' or $variedad === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'),'errorVariedad');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::VARIEDAD, true), true);
    }
     if($edad === '' or $edad === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'),'errorEdad');
      $bandera = true;
      session::getInstance()->setFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::EDAD, true), true);
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
      request::getInstance()->addParamGet(array(controlCalidadTableClass::ID => request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::ID, TRUE))));
      routing::getInstance()->forward('controlCalidad', 'edit');
    }
  }

}
