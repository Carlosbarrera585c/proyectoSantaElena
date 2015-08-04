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
        $fecha = request::getInstance()->getPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::FECHA, true));
        $empleado_id = request::getInstance()->getPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::EMPLEADO_ID, true));
        $proveedor_id = request::getInstance()->getPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PROVEEDOR_ID, true));
        $cantidad = request::getInstance()->getPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::CANTIDAD, true));
        $procedencia_caña = request::getInstance()->getPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PROCEDENCIA_CAÑA, true));
        $peso_caña = request::getInstance()->getPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA, true));
        $num_vagon = request::getInstance()->getPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON, true));
        

        //$this->Validate($turno, $brix, $ph, $ar, $sacarosa, $pureza);

        $data = array(
            ingresoCanaTableClass::FECHA => $fecha,
            ingresoCanaTableClass::EMPLEADO_ID => $empleado_id,
            ingresoCanaTableClass::PROVEEDOR_ID => $proveedor_id,
            ingresoCanaTableClass::CANTIDAD => $cantidad,
            ingresoCanaTableClass::PROCEDENCIA_CAÑA => $procedencia_caña,
            ingresoCanaTableClass::PESO_CAÑA => $peso_caña,
            ingresoCanaTableClass::NUM_VAGON => $num_vagon
        );


        ingresoCanaTableClass::insert($data);
        session::getInstance()->setSuccess(i18n::__('successfulRegister'));
        routing::getInstance()->redirect('ingresoCana', 'index');
      } else {
        routing::getInstance()->redirect('ingresoCana', 'index');
      }
    } catch (PDOException $exc) {
      routing::getInstance()->redirect('ingresoCana', 'insert');
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }
//funcion para validacion de campos en formulario 
  private function Validate($turno, $brix, $ph, $ar, $sacarosa, $pureza) {
    $bandera = FALSE;
//validaciones para que no se superen el maximo de caracteres.
    if (strlen($turno) > ingresoCanaTableClass::TURNO_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLenghtTurn', NULL, 'default', array('%turno%' => $turno, '%caracteres%' => ingresoCanaTableClass::TURNO_LENGHT)));
      $bandera = true;
      session::getInstance()->setFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::TURNO, true), true);
    }
    if ($brix > ingresoCanaTableClass::BRIX_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLenghtBrix', NULL, 'default', array('%brix%' => $brix, '%caracteres%' => ingresoCanaTableClass::BRIX_LENGHT)));
      $bandera = true;
      session::getInstance()->setFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::BRIX, true), true);
    }
    if ($ph > ingresoCanaTableClass::PH_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLenghtPh', NULL, 'default', array('%ph%' => $ph, '%caracteres%' => ingresoCanaTableClass::PH_LENGHT)));
      $bandera = true;
      session::getInstance()->setFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PH, true), true);
    }
    if ($ar > ingresoCanaTableClass::AR_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLenghtAr', NULL, 'default', array('%ar%' => $ar, '%caracteres%' => ingresoCanaTableClass::AR_LENGHT)));
      $bandera = true;
      session::getInstance()->setFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::AR, true), true);
    }
    if ($sacarosa > ingresoCanaTableClass::SACAROSA_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLenghtSaccharose', NULL, 'default', array('%sacarosa%' => $sacarosa, '%caracteres%' => ingresoCanaTableClass::SACAROSA_LENGHT)));
      $bandera = true;
      session::getInstance()->setFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::SACAROSA, true), true);
    }
    if ($pureza > ingresoCanaTableClass::PUREZA_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLenghtPurity', NULL, 'default', array('%pureza%' => $pureza, '%caracteres%' => ingresoCanaTableClass::PUREZA_LENGHT)));
      $bandera = true;
      session::getInstance()->setFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PUREZA, true), true);
    }
//validar que el campo sea solo texto
    if (!ereg("^[A-Za-z]*$", $turno)){
      session::getInstance()->setError(i18n::__('errorTexto', NULL, 'default'));
      $bandera = true;
      session::getInstance()->setFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PUREZA, true), true);
    }
 //validar que el campo sea numerico.
    if (!is_numeric($brix)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'));
      $bandera = true;
      session::getInstance()->setFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::BRIX, true), true);
    }
    if (!is_numeric($ph)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'));
      $bandera = true;
      session::getInstance()->setFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PH, true), true);
    }
    if (!is_numeric($ar)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'));
      $bandera = true;
      session::getInstance()->setFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::AR, true), true);
    }
    if (!is_numeric($sacarosa)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'));
      $bandera = true;
      session::getInstance()->setFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::SACAROSA, true), true);
    }
    if (!is_numeric($pureza)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'));
      $bandera = true;
      session::getInstance()->setFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PUREZA, true), true);
    }
 //validar que no se envie el campo vacio o nulo
    if($turno === '' or $turno === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
      $bandera = true;
      session::getInstance()->setFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::TURNO, true), true);
    }
    if($brix === '' or $brix === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
      $bandera = true;
      session::getInstance()->setFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::BRIX, true), true);
    }
    if($ph === '' or $ph === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
      $bandera = true;
      session::getInstance()->setFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PH, true), true);
    }
    if($ar === '' or $ar === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
      $bandera = true;
      session::getInstance()->setFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::AR, true), true);
    }
    if($sacarosa === '' or $sacarosa === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
      $bandera = true;
      session::getInstance()->setFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::SACAROSA, true), true);
    }
    if($pureza === '' or $pureza === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
      $bandera = true;
      session::getInstance()->setFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PUREZA, true), true);
    }
    if ($bandera === true) {
      request::getInstance()->setMethod('GET');
      routing::getInstance()->forward('ingresoCana', 'insert');
    }
  }

}
