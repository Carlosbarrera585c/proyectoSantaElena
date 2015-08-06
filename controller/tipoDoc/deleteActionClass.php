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
class deleteActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST') and request::getInstance()->isAjaxRequest()) {

        $id = request::getInstance()->getPost(tipoDocTableClass::getNameField(tipoDocTableClass::ID, true));
        
        $ids = array(
            tipoDocTableClass::ID => $id
        );
        tipoDocTableClass::delete($ids, false);
        //routing::getInstance()->redirect('ciudad', 'index');
        $this->arrayAjax = array(
          'code'=> 200, 
          'msg' => 'La eliminacion del registro fue exitosa'
        );
        session::getInstance()->setSuccess(i18n::__('successfulDelete'));
        $this->defineView('delete', 'tipoDoc', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('tipoDoc', 'index');
      }
    } catch (PDOException $exc) {
       $this->arrayAjax = array(
                'code' => 500,
                'msg' => 'El Dato Esta Siendo Usado por Otra Tabla',
                'modal' => 'myModalDelete' . $id
            );
                 $this->defineView('delete', 'tipoDoc', session::getInstance()->getFormatOutput());
        }
  }

}
