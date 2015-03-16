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

        $desc_tipo_doc = request::getInstance()->getPost(tipoDocTableClass::getNameField(tipoDocTableClass::DESC_TIPO_DOC, true));


        if (strlen($desc_tipo_doc) > tipoDocTableClass::DESC_LENGTH) {
          throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => tipoDocTableClass::DESC_LENGTH)), 00001);
        }

        $data = array(
            tipoDocTableClass::DESC_TIPO_DOC => $desc_tipo_doc,
        );
        
        tipoDocTableClass::insert($data);
        session::getInstance()->setSuccess(i18n::__('successfulRegister'));
        routing::getInstance()->redirect('tipoDoc', 'index');
      } else {
        routing::getInstance()->redirect('tipoDoctipoDocTableClass', 'index');
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
