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
 * @author Bayron Henao <bairon_henao_1995@hotmail.com>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

   public function execute() {
    try {

      $fields = array(
      ingresoCañaTableClass::ID,
      ingresoCañaTableClass::FECHA,
      ingresoCañaTableClass::EMPLEADO_ID,
      ingresoCañaTableClass::PROVEEDOR_ID,
      ingresoCañaTableClass::CANTIDAD,
      ingresoCañaTableClass::PROCEDENCIA_CAÑA,
      ingresoCañaTableClass::PESO_CAÑA,
      ingresoCañaTableClass::NUM_VAGON,
      );
      $orderBy = array(
          ingresoCañaTableClass::ID,
      );
      $this->objIngresoCaña = ingresoCañaTableClass::getAll($fields, false, $orderBy, 'ASC');
      $this->defineView('index', 'ingresoCaña', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}