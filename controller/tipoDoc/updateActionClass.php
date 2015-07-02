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

        $id = trim(request::getInstance()->getPost(tipoDocTableClass::getNameField(tipoDocTableClass::ID, true)));
        $desc_tipo_doc = trim(request::getInstance()->getPost(tipoDocTableClass::getNameField(tipoDocTableClass::DESC_TIPO_DOC, true)));

        $ids = array(
            tipoDocTableClass::ID => $id
        );

        $data = array(
            tipoDocTableClass::DESC_TIPO_DOC => $desc_tipo_doc
        );

        tipoDocTableClass::update($ids, $data);
      }
      session::getInstance()->setSuccess(i18n::__('successfulUpdate'));
      routing::getInstance()->redirect('tipoDoc', 'index');
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}
