<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

class reportActionClass extends controllerClass implements controllerActionInterface {
  public function execute() {
    try {

      $img = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', request::getInstance()->getPost('imgData')));
      file_put_contents(config::getPathAbsolute() . 'web/img/report.png', $img);

      //$this->mensaje = 'Hola a todos';
      $where = null;
      $where = session::getInstance()->getAttribute('graficaWhere');
//      print_r($where);
//     exit();
//      $this->mensaje = 'Informacion de produccion';
//      $this->mensaje1 = 'Informacion de lotes';
      $fields = array(
          controlCalidadTableClass::EMPLEADO_ID,
          controlCalidadTableClass::PROVEEDOR_ID,
          controlCalidadTableClass::VARIEDAD,
          controlCalidadTableClass::BRIX,
          controlCalidadTableClass::PH,
          controlCalidadTableClass::AR,
          controlCalidadTableClass::SACAROSA,
		  controlCalidadTableClass::PUREZA,
		  controlCalidadTableClass::FECHA,
		  controlCalidadTableClass::EDAD,
      );
      $orderBy = array(
          controlCalidadTableClass::ID
      );
      $this->objControlCalidad = controlCalidadTableClass::getAll($fields, false, $orderBy, 'ASC', null, null, $where);

      $this->defineView('index', 'reportes', session::getInstance()->getFormatOutput());
    } //cierre del try
    catch (PDOException $exc) {
//      echo $exc->getMessage();
//      echo '<br>';
//      echo '<pre>';
//      print_r($exc->getTrace());
//      echo '</pre>';
    }//cierre del catch
  }

//cierre de la funcion execute
}

//cierre de la clase