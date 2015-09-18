<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\model\modelClass as model;
use mvc\i18n\i18nClass as i18n;
use mvc\view\viewClass as view;
//use mvc\validator\lotetValidatorClass as validator;
use hook\log\logHookClass as log;

class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {


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
        $sql1 = 'SELECT ' . controlCalidadTableClass::getNameField(controlCalidadTableClass::ID) . ' as id,
    ' . controlCalidadTableClass::getNameField(controlCalidadTableClass::FECHA) . ' as fecha,
	' . controlCalidadTableClass::getNameField(controlCalidadTableClass::BRIX) . ' as brix,
	' . controlCalidadTableClass::getNameField(controlCalidadTableClass::PH) . ' as ph,
      ' . controlCalidadTableClass::getNameField(controlCalidadTableClass::AR) . ' as ar,
        ' . controlCalidadTableClass::getNameField(controlCalidadTableClass::PUREZA) . ' as pureza,
          ' . controlCalidadTableClass::getNameField(controlCalidadTableClass::SACAROSA) . ' as sacarosa,
          ' . controlCalidadTableClass::getNameField(controlCalidadTableClass::PROVEEDOR_ID) . ' as proveedor
    FROM ' . controlCalidadTableClass::getNameTable() .
                ' WHERE ' . controlCalidadTableClass::getNameField(controlCalidadTableClass::PROVEEDOR_ID) . '=' . $proveedor_id
                . ' AND ' . controlCalidadTableClass::getNameField(controlCalidadTableClass::FECHA) . ' BETWEEN ' . "'$fechaInicial'" . 'AND' . "'$fechaFin'" . ' GROUP BY ' . 'id';

        $twd = model::getInstance()->query($sql1)->fetchAll(\PDO::FETCH_OBJ);
        $x = 1;
        foreach ($twd as $dato) {
          $brix[] = array($dato->fecha, (int) $dato->brix, array('proveedor' => controlCalidadTableClass::getNameProveedor($proveedor_id), 'fecha' => $dato->fecha, 'control' => 'Brix', 'porcentaje' => $dato->brix . '%'));
          $ph[] = array($dato->fecha, (int) $dato->ph, array('proveedor' => controlCalidadTableClass::getNameProveedor($proveedor_id), 'fecha' => $dato->fecha, 'control' => 'Ph', 'porcentaje' => $dato->ph . '%'));
          $ar[] = array($dato->fecha, (int) $dato->ar, array('proveedor' => controlCalidadTableClass::getNameProveedor($proveedor_id), 'fecha' => $dato->fecha, 'control' => 'Ar', 'porcentaje' => $dato->ar . '%'));
          $pureza[] = array($dato->fecha, (int) $dato->pureza, array('proveedor' => controlCalidadTableClass::getNameProveedor($proveedor_id), 'fecha' => $dato->fecha, 'control' => 'Pureza', 'porcentaje' => $dato->pureza . '%'));
          $sacarosa[] = array($dato->fecha, (int) $dato->sacarosa, array('proveedor' => controlCalidadTableClass::getNameProveedor($proveedor_id), 'fecha' => $dato->fecha, 'control' => 'Sacarosa', 'porcentaje' => $dato->sacarosa . '%'));
          $x++;
        }
        if (isset($brix) and isset($ph) and isset($ar) and isset($pureza) and isset($sacarosa)) {

          $this->datos = array(
              $brix,
              $ph,
              $ar,
              $pureza,
              $sacarosa
          );
        } else {
          session::getInstance()->setError(i18n::__('noDatos'), 'errorDatos');
          routing::getInstance()->redirect('reportes', 'index');

          $this->datos = array();
        }
        $this->fechaInicial = $fechaInicial;
        $this->fechaFin = $fechaFin;

        $this->defineView('grafica', 'reportes', session::getInstance()->getFormatOutput());
//            $where[] = '(' . controlCalidadTableClass::PROVEEDOR_ID . ' = ' . $proveedor_id . ') '
//                    . ' AND ' . '(' . controlCalidadTableClass::getNameField(controlCalidadTableClass::FECHA) . ' BETWEEN ' . "'" . date(config::getFormatTimestamp(), strtotime($fechaInicial . ' 00:00:00')) . "'" . ' AND ' . "'" . date(config::getFormatTimestamp(), strtotime($fechaFin . ' 23:59:59')) . "'" . ' ) ';
//             $where[] = '(' . controlCalidadTableClass::getNameField(controlCalidadTableClass::CREATED_AT) . ' BETWEEN ' . "'" . date(config::getFormatTimestamp(), strtotime($fechaInicial . ' 00:00:00')) . "'" . ' AND ' . "'" . date(config::getFormatTimestamp(), strtotime($fechaFin . ' 23:59:59')) . "'" . ' ) ';
//            session::getInstance()->setAttribute('graficaWhere', $where);
//              print_r($where);  
//          echo $fechaInicial.' '. $fechaFin;
//          exit();
        // }
//		  }
        //}$this->defineView('grafica', 'reportes', session::getInstance()->getFormatOutput());
        //}
//      routing::getInstance()->redirect('reportes', 'grafica');
      }
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
    }//cierre del catch
  }

//cierre de la funcion execute
}
