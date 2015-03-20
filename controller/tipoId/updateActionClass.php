
<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Tipo Identificación
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $id = request::getInstance()->getPost(tipoIdTableClass::getNameField(tipoIdTableClass::ID, true));
                $desc_tipo_id = request::getInstance()->getPost(tipoIdTableClass::getNameField(tipoIdTableClass::DESC_TIPO_ID, true));

                $ids = array(
                    tipoIdTableClass::ID => $id
                );

                $data = array(
                    tipoIdTableClass::DESC_TIPO_ID => $desc_tipo_id,
                );

                tipoIdTableClass::update($ids, $data);
            }
            session::getInstance()->setSuccess(i18n::__('successfulUpdate'));
            routing::getInstance()->redirect('tipoId', 'index');
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
