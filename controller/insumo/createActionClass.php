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
class createActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $desc_insumo = request::getInstance()->getPost(insumoTableClass::getNameField(insumoTableClass::DESC_INSUMO, true));
                $precio = request::getInstance()->getPost(insumoTableClass::getNameField(insumoTableClass::PRECIO, true));
                $tipo_insumo_id = request::getInstance()->getPost(insumoTableClass::getNameField(insumoTableClass::TIPO_INSUMO_ID, true));

                if (strlen($desc_insumo) > insumoTableClass::DESC_INSUMO_LENGTH) {
                    throw new PDOException('El Nombre No Puede Ser Mayor A: ' . insumoTableClass::DESC_INSUMO_LENGTH . ' Caracteres');
                }
                if (strlen($precio) > insumoTableClass::PRECIO_LENGTH) {
                    throw new PDOException('El Nombre No Puede Ser Mayor A: ' . insumoTableClass::PRECIO_LENGTH . ' Caracteres');
                }
                if (strlen($tipo_insumo_id) > insumoTableClass::TIPO_INSUMO_ID_LENGTH) {
                    throw new PDOException('El Nombre No Puede Ser Mayor A: ' . insumoTableClass::TIPO_INSUMO_ID_LENGTH . ' Caracteres');
                }
                $data = array(
                    insumoTableClass::DESC_INSUMO => $desc_insumo,
                    insumoTableClass::PRECIO => $precio,
                    insumoTableClass::TIPO_INSUMO_ID => $tipo_insumo_id
                );
                insumoTableClass::insert($data);
                session::getInstance()->setSuccess(i18n::__('successfulRegister'));
                routing::getInstance()->redirect('insumo', 'index');
            } else {
                routing::getInstance()->redirect('insumo', 'index');
            }
      } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc',$exc);
      routing::getInstance()->forward('shfSecurity', 'execption');
    }
  }

}

