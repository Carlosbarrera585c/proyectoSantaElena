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

        $razon_social = request::getInstance()->getPost(proveedorTableClass::getNameField(proveedorTableClass::RAZON_SOCIAL, true));
        $direccion = request::getInstance()->getPost(proveedorTableClass::getNameField(proveedorTableClass::DIRECCION, true));
        $telefono = request::getInstance()->getPost(proveedorTableClass::getNameField(proveedorTableClass::TELEFONO, true));
        $ciudad_id = request::getInstance()->getPost(proveedorTableClass::getNameField(proveedorTableClass::CIUDAD_ID, true));

  

        if (strlen($razon_social) > proveedorTableClass::RAZON_SOCIAL_LENGTH) {
          throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => proveedorTableClass::RAZON_SOCIAL_LENGTH)), 00001);
        }

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

}