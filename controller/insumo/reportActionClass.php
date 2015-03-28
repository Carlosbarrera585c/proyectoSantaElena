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
         $where = NULL;
        if (request::getInstance()->hasPost('report')) {
                $report = request::getInstance()->getPost('report');
                if (isset($report['Descripcion']) and $report['Descripcion'] !== null and $report['Descripcion'] !== "") {
                    $where[insumoTableClass::DESC_INSUMO] = $report['Descripcion'];
                } if (isset($report['Precio']) and $report['Precio'] !== null and $report['Precio'] !== "") {
                    $where[insumoTableClass::PRECIO] = $report['Precio'];
                }
        }
        $orderBy = array(
        insumoTableClass::DESC_INSUMO
        );
        
        
      $fields = array(
      insumoTableClass::ID,
      insumoTableClass::DESC_INSUMO,
      insumoTableClass::PRECIO,
      insumoTableClass::TIPO_INSUMO_ID
      );
      $this->objInsu = insumoTableClass::getAll($fields, FALSE, $orderBy,'ASC',NULL, NULL,$where);
        
      $this->defineView('index', 'insumo', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}





