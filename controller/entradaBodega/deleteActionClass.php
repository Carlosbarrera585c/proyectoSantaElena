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
            if (request::getInstance()->isMethod('POST')) {

                $id = request::getInstance()->getPost(entradaBodegaTableClass::getNameField(entradaBodegaTableClass::ID, true));

                $ids = array(
                entradaBodegaTableClass::ID => $id
                );
                entradaBodegaTableClass::delete($ids, false);
                $this->arrayAjax = array(
                    'code' => 200,
                    'msg' => 'La Eliminación Fue Exitosa'
                );
                $this->defineView('delete', 'entradaBodega', session::getInstance()->getFormatOutput());
                session::getInstance()->setSuccess(i18n::__('successfulDelete'));
            } else {
                routing::getInstance()->redirect('entradaBodega', 'index');
            }
        } catch (PDOException $exc) {
             $this->arrayAjax = array(
                'code' => 500,
                'msg' => 'El Dato Esta Siendo Usado por Otra Tabla',
                'modal' => 'myModalDelete' . $id
      );
      $this->defineView('delete', 'entradaBodega', session::getInstance()->getFormatOutput());
    }
    }
}