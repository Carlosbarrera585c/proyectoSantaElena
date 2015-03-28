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
                    $where[tipoinsumoTableClass::DESC_TIPO_INSUMO] = $report['Descripcion'];
                }
        }
        
       $orderBy = array(
       tipoInsumoTableClass::ID
       );
      $fields = array(
          tipoInsumoTableClass::ID,
          tipoInsumoTableClass::DESC_TIPO_INSUMO
         
    
      );
      $this->objTipoInsumo = tipoinsumoTableClass::getAll($fields, FALSE, $orderBy,'ASC',NULL, NULL,$where);
      $this->defineView('index', 'tipoInsumo', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}





