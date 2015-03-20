<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Empaque
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class deleteSelectActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $idsToDelete = request::getInstance()->getPost('chk');
                foreach ($idsToDelete as $id) {
                    $ids = array(
                        empaqueTableClass::ID => $id
                    );
                    empaqueTableClass::delete($ids, false);
                }
                session::getInstance()->setSuccess(i18n::__('successfulDelete'));
                routing::getInstance()->redirect('empaque', 'index');
            } else {
                routing::getInstance()->redirect('empaque', 'index');
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
