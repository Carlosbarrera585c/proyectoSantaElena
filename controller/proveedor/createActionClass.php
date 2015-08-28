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
 *  @author Cristian Ramirez <cristianRamirezXD@outlook.es>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $razon_social = trim(request::getInstance()->getPost(proveedorTableClass::getNameField(proveedorTableClass::RAZON_SOCIAL, true)));
        $direccion = request::getInstance()->getPost(proveedorTableClass::getNameField(proveedorTableClass::DIRECCION, true));
        $telefono = request::getInstance()->getPost(proveedorTableClass::getNameField(proveedorTableClass::TELEFONO, true));
        $ciudad_id = request::getInstance()->getPost(proveedorTableClass::getNameField(proveedorTableClass::CIUDAD_ID, true));
        $this->Validate($razon_social, $direccion, $telefono, $ciudad_id);

        $data = array(
            proveedorTableClass::RAZON_SOCIAL => $razon_social,
            proveedorTableClass::DIRECCION => $direccion,
            proveedorTableClass::TELEFONO => $telefono,
            proveedorTableClass::CIUDAD_ID => $ciudad_id
        );
        
        proveedorTableClass::insert($data);
        session::getInstance()->setSuccess(i18n::__('successfulRegister'));
        routing::getInstance()->redirect('proveedor', 'index');
      } else {
        routing::getInstance()->redirect('proveedor', 'index');
      }
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }
private function Validate($razon_social, $direccion, $telefono, $ciudad_id) {
    $bandera = FALSE;
    
    //validaciones para que no se superen el maximo de caracteres.
    if (strlen($razon_social) > proveedorTableClass::RAZON_SOCIAL_LENGTH) {
      session::getInstance()->setError(i18n::__('errorLengthBusinessName', NULL, 'default', array('%social%' => $razon_social, '%caracteres%' => proveedorTableClass::RAZON_SOCIAL_LENGTH)),'errorSocial');
      $bandera = true;
      session::getInstance()->setFlash(proveedorTableClass::getNameField(proveedorTableClass::RAZON_SOCIAL, true), true);
    }
    if (strlen($direccion) > proveedorTableClass::DIRECCION_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLengthDirection', NULL, 'default', array('%direccion%' => $direccion, '%caracteres%' => proveedorTableClass::DIRECCION_LENGHT)),'errorDireccion');
      $bandera = true;
      session::getInstance()->setFlash(proveedorTableClass::getNameField(proveedorTableClass::DIRECCION, true), true);
    }
     if (strlen($telefono) > proveedorTableClass::TELEFONO_LENGHT) {
      session::getInstance()->setError(i18n::__('errorLengthPhone', NULL, 'default', array('%telefono%' => $telefono, '%caracteres%' => proveedorTableClass::TELEFONO_LENGHT)),'errorTelefono');
      $bandera = true;
      session::getInstance()->setFlash(proveedorTableClass::getNameField(proveedorTableClass::TELEFONO, true), true);
    }
    //validar que el campo sea solo texto
    if (!ereg("^[A-Za-z]*$", $razon_social)){
      session::getInstance()->setError(i18n::__('errorText', NULL, 'default'),'errorSocial');
      $bandera = true;
      session::getInstance()->setFlash(proveedorTableClass::getNameField(proveedorTableClass::RAZON_SOCIAL, true), true);
    }
    //validar que el campo sea numerico.
    if (!is_numeric($telefono)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'),'errorTelefono');
      $bandera = true;
      session::getInstance()->setFlash(proveedorTableClass::getNameField(proveedorTableClass::TELEFONO, true), true);
    }
     if (!is_numeric($ciudad_id)) {
      session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'),'errorCiudad');
      $bandera = true;
      session::getInstance()->setFlash(proveedorTableClass::getNameField(proveedorTableClass::CIUDAD_ID, true), true);
    }
    //validar que no se envie el campo vacio o nulo
     if($razon_social === '' or $razon_social === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'),'errorSocial');
      $bandera = true;
      session::getInstance()->setFlash(proveedorTableClass::getNameField(proveedorTableClass::RAZON_SOCIAL, true), true);
    }
     if($direccion === '' or $direccion === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'),'errorDireccion');
      $bandera = true;
      session::getInstance()->setFlash(proveedorTableClass::getNameField(proveedorTableClass::DIRECCION, true), true);
    }
     if($telefono === '' or $telefono === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'),'errorTelefono');
      $bandera = true;
      session::getInstance()->setFlash(proveedorTableClass::getNameField(proveedorTableClass::TELEFONO, true), true);
    }
    if($ciudad_id === '' or $ciudad_id === NULL) {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'),'errorCiudad');
      $bandera = true;
      session::getInstance()->setFlash(proveedorTableClass::getNameField(proveedorTableClass::CIUDAD_ID, true), true);
    }
    if ($bandera === true) {
      request::getInstance()->setMethod('GET');
      routing::getInstance()->forward('proveedor', 'insert');
    }
}
}