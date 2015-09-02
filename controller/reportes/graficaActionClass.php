<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

class graficaActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      $where = null;
//      $value = session::getInstance()->getAttribute('idGrafica');
//       if ($value == 1) {
      $where = session::getInstance()->getAttribute('graficaWhere');
      $fields = array(
          controlCalidadTableClass::PROVEEDOR_ID,
          controlCalidadTableClass::FECHA,
      );
      $orderBy = array(
          controlCalidadTableClass::PROVEEDOR_ID
      );
      $objControlCalidad = controlCalidadTableClass::getAll($fields, false, $orderBy, 'ASC', null, null, $where);


      $cosPoints = array();
      foreach ($objControlCalidad as $objeto) {
        $cosPoints[] = array($objeto->proveedor_id, (date('Y-m-d', strtotime($objeto->fecha))));
//		print_r($cosPoints);
//	  exit();
      }
      $this->cosPoints = $cosPoints;
//       }
//	   $this->cosPoints = array([0,0],[2,1]);

      $this->defineView('grafica', 'reportes', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
    }
  }

}
