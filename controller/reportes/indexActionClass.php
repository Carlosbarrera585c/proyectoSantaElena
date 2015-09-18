<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * @author Bayron, Cristian, Carlos.
 * @date: fecha de inicio del desarrollo.
 * @category: modulo de defautl.
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      $where = null;

     $fields = array(
          reporteTableClass::ID,
          reporteTableClass::NOMBRE,
          reporteTableClass::DESCRIPCION,
          reporteTableClass::DIRECCION,
      );
      $orderBy = array(
          reporteTableClass::ID
      );
      $this->objReportes = reporteTableClass::getAll($fields, false, $orderBy, 'ASC', null, null, $where);

      $this->defineView('index', 'reportes', session::getInstance()->getFormatOutput());
    } //cierre del try
    catch (PDOException $exc) {
      routing::getInstance()->redirect('reportes', 'index');
//      echo $exc->getMessage();
//      echo '<br>';
//      echo $exc->getTraceAsString();
    }//cierre del catch
  }

//cierre de la funcion execute
}

//cierre de la clase
