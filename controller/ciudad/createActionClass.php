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

        $nomCiudad = request::getInstance()->getPost(ciudadTableClass::getNameField(ciudadTableClass::NOM_CIUDAD, true));


        if (strlen($nomCiudad) > ciudadTableClass::NOMBRE_LENGTH) {
          throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => ciudadTableClass::NOMBRE_LENGTH)), 00001);
        }

        $data = array(
            ciudadTableClass::NOM_CIUDAD => $nomCiudad,
        );
        
        ciudadTableClass::insert($data);
        session::getInstance()->setSuccess(i18n::__('successfulRegister'));
        routing::getInstance()->redirect('ciudad', 'index');
      } else {
        routing::getInstance()->redirect('ciudad', 'index');
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
