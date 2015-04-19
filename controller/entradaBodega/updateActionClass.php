
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
class updateActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $id = request::getInstance()->getPost(entradaBodegaTableClass::getNameField(entradaBodegaTableClass::ID, true));
                $fecha = request::getInstance()->getPost(entradaBodegaTableClass::getNameField(entradaBodegaTableClass::FECHA, true));
                $proveedor_id = request::getInstance()->getPost(entradaBodegaTableClass::getNameField(entradaBodegaTableClass::PROVEEDOR_ID, true));
                
                $ids = array(
                    entradaBodegaTableClass::ID => $id
                );
                
                $this->Validate($fecha, $proveedor_id);

                $data = array(
                    entradaBodegaTableClass::FECHA => $fecha,
                    entradaBodegaTableClass::PROVEEDOR_ID => $proveedor_id,
                    
                );

                entradaBodegaTableClass::update($ids, $data);
            }
            session::getInstance()->setSuccess(i18n::__('successfulUpdate'));
            routing::getInstance()->redirect('entradaBodega', 'index');
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }
    
       private function Validate($fecha, $proveedor_id) {
        $bandera = FALSE;

        if ($fecha === '') {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(entradaBodegaTableClass::getNameField(entradaBodegaTableClass::FECHA, true), true);
        }

        if ($proveedor_id === '') {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(entradaBodegaTableClass::getNameField(entradaBodegaTableClass::PROVEEDOR_ID, true), true);
        }
        if ($bandera === true) {
            request::getInstance()->setMethod('GET');
            routing::getInstance()->forward('entradaBodega', 'insert');
        }
    }


}
