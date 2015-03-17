
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
class updateActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $id = request::getInstance()->getPost(empaqueTableClass::getNameField(empaqueTableClass::ID, true));
                $fecha = request::getInstance()->getPost(empaqueTableClass::getNameField(empaqueTableClass::FECHA, true));
                $empleado_id = request::getInstance()->getPost(empaqueTableClass::getNameField(empaqueTableClass::EMPLEADO_ID, true));
                $tipo_empaque_id = request::getInstance()->getPost(empaqueTableClass::getNameField(empaqueTableClass::TIPO_EMPAQUE_ID, true));

                $ids = array(
                    empaqueTableClass::ID => $id
                );

                $data = array(
                    empaqueTableClass::FECHA => $fecha,
                    empaqueTableClass::EMPLEADO_ID => $empleado_id,
                    empaqueTableClass::TIPO_EMPAQUE_ID => $tipo_empaque_id
                );

                empaqueTableClass::update($ids, $data);
            }
            session::getInstance()->setSuccess(i18n::__('successfulUpdate'));
            routing::getInstance()->redirect('empaque', 'index');
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
