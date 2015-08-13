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
class editActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasGet(proveedorTableClass::ID)) {
        $fields = array(
          proveedorTableClass::ID,
          proveedorTableClass::RAZON_SOCIAL,
          proveedorTableClass::DIRECCION,
          proveedorTableClass::TELEFONO,
          proveedorTableClass::CIUDAD_ID
        );
        $where = array(
            proveedorTableClass::ID => request::getInstance()->getGet(proveedorTableClass::ID)
        );
        $this->objProveedor = proveedorTableClass::getAll($fields, false, null, null, null, null, $where);
        
        $fields = array(
                ciudadTableClass::ID,
                ciudadTableClass::NOM_CIUDAD
            );
            
       $this->objCiudad = ciudadTableClass::getAll($fields, false);
        
        $this->defineView('edit', 'proveedor', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('proveedor', 'index');
      }
//      if (request::getInstance()->isMethod('POST')) {
//
//        $usuario = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USUARIO, true));
//        $password = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true));
//
//        if (strlen($usuario) > usuarioTableClass::USUARIO_LENGTH) {
//          throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => usuarioTableClass::USUARIO_LENGTH)), 00001);
//        }
//
//        $data = array(
//            usuarioTableClass::USUARIO => $usuario,
//            usuarioTableClass::PASSWORD => md5($password)
//        );
//        usuarioTableClass::insert($data);
//        routing::getInstance()->redirect('default', 'index');
//      } else {
//        routing::getInstance()->redirect('default', 'index');
//      }
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}
