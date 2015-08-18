<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of create deleteActionClass
 * @author  Bayron Henao <bairon_henao_1995@hotmail.com> 
 * @method post  los datos de la tabla llegan por metodo post.
 * @param getNameField se especifica los nombres de los capos contenidos en la tabla.
 * $data los datos del recorrido de la tabla controlCalidad se guardan
 * en la variable $data  
 */
class deleteActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $id = request::getInstance()->getPost(bagazoTableClass::getNameField(bagazoTableClass::ID, true));

                $ids = array(
                    bagazoTableClass::ID => $id
                );
                bagazoTableClass::delete($ids, false);
                $this->arrayAjax = array(
                    'code' => 200,
                    'msg' => 'La Eliminación Fue Exitosa'
                );
                $this->defineView('delete', 'bagazo', session::getInstance()->getFormatOutput());
                session::getInstance()->setSuccess(i18n::__('successfulDelete'));
            } else {
                routing::getInstance()->redirect('bagazo', 'index');
            }
        } catch (PDOException $exc) {
             $this->arrayAjax = array(
		  'code' => 500,
		  'msg' => 'El Dato Esta Siendo Usado por Otra Tabla',
		  'modal' => 'myModalDelete' . $id
	  );
	  $this->defineView('delete', 'bagazo', session::getInstance()->getFormatOutput());
	}
  }
}
