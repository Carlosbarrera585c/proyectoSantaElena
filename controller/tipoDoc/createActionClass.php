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

        $this->Validate($desc_tipo_doc);
        
        $data = array(
            tipoDocTableClass::DESC_TIPO_DOC => $desc_tipo_doc,
        );
        
        tipoDocTableClass::insert($data);
                session::getInstance()->setSuccess(i18n::__('successfulRegister'));
                routing::getInstance()->redirect('tipoDoc', 'index');
            } else {
                routing::getInstance()->redirect('tipoDoc', 'index');
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
            session::getInstance()->setError(i18n::__('failureToRegister'));
        }
    }
  
  private function Validate($desc_tipo_doc) {
    $bandera = FALSE;
    if (strlen($desc_tipo_doc) > tipoDocTableClass::DESC_LENGTH) {
      session::getInstance()->setError(i18n::__('errorLenghtDesc', NULL, 'default', array('%$desc_tipo_doc%' => $desc_tipo_doc, '%caracteres%' => tipoDocTableClass::DESC_LENGTH)));
      $bandera = true;
      session::getInstance()->setFlash(tipoDocTableClass::getNameField(tipoDocTableClass::DESC_LENGTH, true), true);
    }
    if($desc_tipo_doc === '') {
      session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
      $bandera = true;
      session::getInstance()->setFlash(tipoDocTableClass::getNameField(tipoDocTableClass::DESC_TIPO_DOC, true), true);
    }
    if ($bandera === true) {
      request::getInstance()->setMethod('GET');
      routing::getInstance()->forward('tipoDoc', 'insert');
    }
  }

}
