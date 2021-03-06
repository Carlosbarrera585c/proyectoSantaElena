
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
                $this->Validate($desc_tipo_empaque);
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
      private function Validate($desc_tipo_empaque) {
        $bandera = FALSE;
        if (strlen($desc_tipo_empaque) > tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE_LENGHT) {
            session::getInstance()->setError(i18n::__('errorLengthDescription', NULL, 'default', array('%descripcion%' => $desc_tipo_empaque, '%caracteres%' => tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE_LENGHT)), 'errorDescripcion');
            $bandera = true;
            session::getInstance()->setFlash(tipoEmpaqueTableClass::getNameField(tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE, true), true);
        }
        if (!preg_match('/^[a-zA-Z0-9 ]*$/', $desc_tipo_empaque)) {
            session::getInstance()->setError(i18n::__('errorText', NULL, 'default', array('%texto%' => $desc_tipo_empaque)), 'errorDescripcion');
            $bandera = true;
            session::getInstance()->setFlash(tipoEmpaqueTableClass::getNameField(tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE, true), true);
        }
        if ($desc_tipo_empaque === '' or $desc_tipo_empaque === NULL) {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorDescripcion');
            $bandera = true;
            session::getInstance()->setFlash(tipoEmpaqueTableClass::getNameField(tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE, true), true);
        }
        if ($bandera === true) {
            request::getInstance()->setMethod('GET');
            request::getInstance()->addParamGet(array(tipoEmpaqueTableClass::ID => request::getInstance()->getPost(tipoEmpaqueTableClass::getNameField(tipoEmpaqueTableClass::ID, TRUE))));
            routing::getInstance()->forward('tipoEmpaque', 'edit');
        }
}
}