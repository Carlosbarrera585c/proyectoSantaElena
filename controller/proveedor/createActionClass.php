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
        if (strlen($fecha) > proveedorTableClass::RAZON_SOCIAL_LENGTH_LENGHT) {
          throw new PDOException('La RAzon Social No Puede Ser Mayor A: ' . proveedorTableClass::RAZON_SOCIAL_LENGTH . ' Caracteres');
        }
        if (strlen($fecha) > proveedorTableClass::DIRECCION_LENGHT) {
          throw new PDOException('La Direccion No Puede Ser Mayor A: ' . proveedorTableClass::DIRECCION_LENGHT . ' Caracteres');
        }
        if (strlen($turno) > proveedorTableClass::TELEFONO_LENGHT) {
          throw new PDOException('El Numero De Telefono No Puede Ser Mayor A: ' . proveedorTableClass::TELEFONO_LENGHT . ' Caracteres');
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
