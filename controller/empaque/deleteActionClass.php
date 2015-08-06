<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of empaque
 *
 * @author Cristian Ramirez <cristianxdramirez@gmail.com>
 */
class deleteActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $id = request::getInstance()->getPost(empaqueTableClass::getNameField(empaqueTableClass::ID, true));

        $ids = array(
            empaqueTableClass::ID => $id
        );
        empaqueTableClass::delete($ids, false);
        $this->arrayAjax = array(
            'code' => 200,
            'msg' => 'La Eliminación Fue Exitosa'
        );
        $this->defineView('delete', 'empleado', session::getInstance()->getFormatOutput());
        session::getInstance()->setSuccess(i18n::__('successfulDelete'));
      } else {
        routing::getInstance()->redirect('empaque', 'index');
      }
    } catch (PDOException $exc) {
      $this->arrayAjax = array(
                'code' => 500,
                'msg' => 'El Dato Esta Siendo Usado por Otra Tabla',
                'modal' => 'myModalDelete' . $id
            );
            $this->defineView('delete', 'controlCalidad', session::getInstance()->getFormatOutput());
        }
  }

}
