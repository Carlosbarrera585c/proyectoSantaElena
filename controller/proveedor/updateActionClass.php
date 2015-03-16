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
* @author Cristian Ramirez <cristianRamirezXD@outlook.es>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $id = request::getInstance()->getPost(proveedorTableClass::getNameField(proveedorTableClass::ID, true));
        $razon_social = request::getInstance()->getPost(proveedorTableClass::getNameField(proveedorTableClass::RAZON_SOCIAL, true));
        $direccion = request::getInstance()->getPost(proveedorTableClass::getNameField(proveedorTableClass::DIRECCION, true));
        $telefono = request::getInstance()->getPost(proveedorTableClass::getNameField(proveedorTableClass::TELEFONO, true));
        $ciudad_id = request::getInstance()->getPost(proveedorTableClass::getNameField(proveedorTableClass::CIUDAD_ID, true));
  
        $ids = array(
            proveedorTableClass::ID => $id
        );

        $data = array(
            proveedorTableClass::RAZON_SOCIAL => $razon_social
        );

        proveedorTableClass::update($ids, $data);
      }
      session::getInstance()->setSuccess(i18n::__('successfulUpdate'));
      routing::getInstance()->redirect('proveedor', 'index');
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}
