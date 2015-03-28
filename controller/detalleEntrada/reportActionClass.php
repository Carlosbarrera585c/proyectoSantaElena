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
            if(request::getInstance()->hasPost('report')){
                $report = request::getInstance()->getPost('report');
                // aqui validar datos de filtros
                if(isset($report['fechaFB1']) and $report['fechaFB1'] !== NULL and $report['fechaFB1'] !== '' and isset($report['fechaFB2']) and $report['fechaFB2'] !== NULL and $report['fechaFB2'] !== ''){
                    $where[detalleEntradaTableClass::FECHA_FABRICACION] = array(
                        $report['fechaFB1'],
                        $report['fechaFB2']
//                        date(config::getFormatTimestamp(),  strtotime($report['fechaFB']. ' 00:00:00')) se puede de dos maneras
//                        date(config::getFormatTimestamp(),  strtotime($report['fechaCreacion2']. ' 23:59:59'))
                    );
                }
                if(isset($report['fechaVC1']) and $report['fechaVC1'] !== NULL and $report['fechaVC1'] !== '' and isset($report['fechaVC2']) and $report['fechaVC2'] !== NULL and $report['fechaVC2'] !== ''){
                    $where[detalleEntradaTableClass::FECHA_VENCIMIENTO] = array(
                        $report['fechaVC1'],
                        $report['fechaVC2']
//                        date(config::getFormatTimestamp(),  strtotime($report['fechaVC']. ' 00:00:00')) se puede de dos maneras
//                        date(config::getFormatTimestamp(),  strtotime($report['fechaCreacion2']. ' 23:59:59'))
                    );                   
                }
                if (isset($report['cantidad']) and $report['cantidad'] !== NULL and $report['cantidad'] !== '') {
                  $where[detalleEntradaTableClass::CANTIDAD] = $report['cantidad'];
        }
                if (isset($report['valor']) and $report['valor'] !== NULL and $report['valor'] !== '') {
                  $where[detalleEntradaTableClass::VALOR] = $report['valor'];
        }
            } 
      
      
      $fields = array(
      detalleEntradaTableClass::ID,
      detalleEntradaTableClass::FECHA_FABRICACION,
      detalleEntradaTableClass::FECHA_VENCIMIENTO    


      );
      $this->objDetalleEntrada = detalleEntradaTableClass::getAll($fields, FALSE);
      $this->defineView('index', 'detalleEntrada', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}



