
<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Tipo Empaque
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $id = request::getInstance()->getPost(tipoEmpaqueTableClass::getNameField(tipoEmpaqueTableClass::ID, true));
                $desc_tipo_empaque = request::getInstance()->getPost(tipoEmpaqueTableClass::getNameField(tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE, true));

                $ids = array(
                    tipoEmpaqueTableClass::ID => $id
                );

                $data = array(
                    tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE => $desc_tipo_empaque,
                );

                tipoEmpaqueTableClass::update($ids, $data);
            }
            session::getInstance()->setSuccess(i18n::__('successfulUpdate'));
            routing::getInstance()->redirect('tipoEmpaque', 'index');
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
