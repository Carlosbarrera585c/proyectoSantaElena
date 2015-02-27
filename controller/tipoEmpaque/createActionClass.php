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
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */

class createActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $desc_tipo_empaque = request::getInstance()->getPost(tipoEmpaqueTableClass::getNameField(tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE, true));
                
                               
                $data = array(
                    tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE => $desc_tipo_empaque,
                    
                );
                tipoEmpaqueTableClass::insert($data);
                routing::getInstance()->redirect('tipoEmpaque', 'index');
            } else {
                routing::getInstance()->redirect('tipoEmpaque', 'index');
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
