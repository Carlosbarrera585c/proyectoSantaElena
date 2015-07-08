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
class deleteSelectActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

              $idsToDelete = request::getInstance()->getPost('chk');              
              foreach ($idsToDelete as $id){
                  $ids = array(
                      detalleEntradaTableClass::ID => $id
                );
                detalleEntradaTableClass::delete($ids, false);
              }              
               session::getInstance()->setSuccess(i18n::__('successfulDelete'));
               routing::getInstance()->redirect('entradaBodega', 'index');
            } else {
                routing::getInstance()->redirect('entradaBodega', 'index');
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }
}