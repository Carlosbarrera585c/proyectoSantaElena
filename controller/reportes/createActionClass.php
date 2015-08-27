<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
//use mvc\validator\lotetValidatorClass as validator;
use hook\log\logHookClass as log;

class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

//      $id = session::getInstance()->getAttribute('idRegistro');
//      foreach ($id as $value) {
////      echo $value;
//      }
//      session::getInstance()->setAttribute('idGrafica', $value);
      $where = null;
//      if ($value == 1) {
        if ((request::getInstance()->hasPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::FECHA, true) . '_1') and empty(mvc\request\requestClass::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::FECHA, true) . '_1')) === false) and ( (request::getInstance()->hasPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::FECHA, true) . '_2') and empty(mvc\request\requestClass::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::FECHA, true) . '_2')) === false))) {

          if (request::getInstance()->isMethod('POST')) {

            $fechaInicial = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::FECHA, true) . '_1');
            $fechaFin = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::FECHA, true) . '_2');
            $proveedor_id = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::PROVEEDOR_ID, true));

            if (strtotime($fechaFin) < strtotime($fechaInicial)) {
              session::getInstance()->setError('La fecha final no puede ser menor a la actual', 'inputFecha');
              session::getInstance()->setFlash('modalFilters', true);
              routing::getInstance()->forward('reportes', 'insert');
            }


            session::getInstance()->setAttribute('graficaUbicacion', $proveedor_id);
            session::getInstance()->setAttribute('graficaRFecha1', $fechaInicial);
            session::getInstance()->setAttribute('graficaRFecha2', $fechaFin);

            $where[] = '(' . controlCalidadTableClass::getNameField(controlCalidadTableClass::PROVEEDOR_ID) . ' LIKE ' . '\'' . $proveedor_id . '%\'  '
                    . 'OR ' . controlCalidadTableClass::getNameField(controlCalidadTableClass::PROVEEDOR_ID) . ' LIKE ' . '\'%' . $proveedor_id . '%\' '
                    . 'OR ' . controlCalidadTableClass::getNameField(controlCalidadTableClass::PROVEEDOR_ID) . ' LIKE ' . '\'%' . $proveedor_id . '\') '
                    . ' AND ' . '(' . controlCalidadTableClass::getNameField(controlCalidadTableClass::FECHA) . ' BETWEEN ' . "'" . date(config::getFormatTimestamp(), strtotime($fechaInicial . ' 00:00:00')) . "'" . ' AND ' . "'" . date(config::getFormatTimestamp(), strtotime($fechaFin . ' 23:59:59')) . "'" . ' ) ';
//             $where[] = '(' . controlCalidadTableClass::getNameField(controlCalidadTableClass::CREATED_AT) . ' BETWEEN ' . "'" . date(config::getFormatTimestamp(), strtotime($fechaInicial . ' 00:00:00')) . "'" . ' AND ' . "'" . date(config::getFormatTimestamp(), strtotime($fechaFin . ' 23:59:59')) . "'" . ' ) ';
            session::getInstance()->setAttribute('graficaWhere', $where);
//              print_r($where);  
//          echo $fechaInicial.' '. $fechaFin;
//          exit();
            // }
//		  }
        }
      }

      routing::getInstance()->redirect('reportes', 'grafica');
      $this->defineView('grafica', 'reportes', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
    }//cierre del catch
  }

//cierre de la funcion execute
}
