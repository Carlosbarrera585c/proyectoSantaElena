
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
 * @author yefri alexander <yefri-1994@hotmail.com>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $id = request::getInstance()->getPost(insumoTableClass::getNameField(insumoTableClass::ID, true));
                $desc_insumo = request::getInstance()->getPost(insumoTableClass::getNameField(insumoTableClass::DESC_INSUMO, true));
                $precio = request::getInstance()->getPost(insumoTableClass::getNameField(insumoTableClass::PRECIO, true));
                $tipo_insumo_id = request::getInstance()->getPost(insumoTableClass::getNameField(insumoTableClass::TIPO_INSUMO_ID, true));

                $this->Validate($id, $desc_insumo, $precio, $tipo_insumo_id);

                $ids = array(
                    insumoTableClass::ID => $id
                );

                $data = array(
                    insumoTableClass::DESC_INSUMO => $desc_insumo,
                    insumoTableClass::PRECIO => $precio,
                    insumoTableClass::TIPO_INSUMO_ID => $tipo_insumo_id
                );

                insumoTableClass::update($ids, $data);
                session::getInstance()->setSuccess(i18n::__('successfulUpdate'));
                routing::getInstance()->redirect('insumo', 'index');
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

//funcion para validacion de campos en formulario 
    private function Validate($id, $desc_insumo, $precio, $tipo_insumo_id) {
        $bandera = FALSE;
        //validaciones para que no se superen el maximo de caracteres.
        if (strlen($desc_insumo) > insumoTableClass::DESC_INSUMO_LENGTH) {
            session::getInstance()->setError(i18n::__('errorLengthDescription', NULL, 'default', array('%descripcion%' => $desc_insumo, '%caracteres%' => insumoTableClass::DESC_INSUMO_LENGTH)), 'errorDescripcion');
            $bandera = true;
            session::getInstance()->setFlash(insumoTableClass::getNameField(insumoTableClass::DESC_INSUMO, true), true);
        }
        if (strlen($precio) > insumoTableClass::PRECIO_LENGTH) {
            session::getInstance()->setError(i18n::__('errorLengthPrice', NULL, 'default', array('%precio%' => $precio, '%caracteres%' => insumoTableClass::PRECIO_LENGTH)), 'errorPrecio');
            $bandera = true;
            session::getInstance()->setFlash(insumoTableClass::getNameField(insumoTableClass::PRECIO, true), true);
        }
        //validar que el campo sea solo texto
        if (!ereg("^[A-Za-z]*$", $desc_insumo)) {
            session::getInstance()->setError(i18n::__('errorText', NULL, 'default'), 'errorDescripcion');
            $bandera = true;
            session::getInstance()->setFlash(insumoTableClass::getNameField(insumoTableClass::DESC_INSUMO, true), true);
        }
        //validar que el campo sea numerico.
        if (!is_numeric($precio)) {
            session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorPrecio');
            $bandera = true;
            session::getInstance()->setFlash(insumoTableClass::getNameField(insumoTableClass::PRECIO, true), true);
        }
        if (!is_numeric($tipo_insumo_id)) {
            session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorTipo');
            $bandera = true;
            session::getInstance()->setFlash(insumoTableClass::getNameField(insumoTableClass::TIPO_INSUMO_ID, true), true);
        }
        //validar que no se envie el campo vacio o nulo
        if ($desc_insumo === '' or $desc_insumo === NULL) {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorDescripcion');
            $bandera = true;
            session::getInstance()->setFlash(insumoTableClass::getNameField(insumoTableClass::DESC_INSUMO, true), true);
        }
        if ($precio === '' or $precio === NULL) {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorPrecio');
            $bandera = true;
            session::getInstance()->setFlash(insumoTableClass::getNameField(insumoTableClass::PRECIO, true), true);
        }
        if ($tipo_insumo_id === '' or $tipo_insumo_id === NULL) {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'), 'errorTipo');
            $bandera = true;
            session::getInstance()->setFlash(insumoTableClass::getNameField(insumoTableClass::TIPO_INSUMO_ID, true), true);
        }

       if ($bandera === true) {
      request::getInstance()->setMethod('GET');
      request::getInstance()->addParamGet(array(insumoTableClass::ID => request::getInstance()->getPost(insumoTableClass::getNameField(insumoTableClass::ID, TRUE))));
      routing::getInstance()->forward('insumo', 'edit');
    }
    }

}
