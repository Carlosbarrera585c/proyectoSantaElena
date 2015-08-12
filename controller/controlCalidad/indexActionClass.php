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
            $where = null;
      if (request::getInstance()->hasPost('filter')) {
        $filter = request::getInstance()->getPost('filter');
//aqui validar datos
        if ((isset($filter['fecha1']) and $filter['fecha1'] !== null and $filter['fecha1'] !== "") and (isset($filter['fecha2']) and $filter['fecha2'] !== null and $filter['fecha2'] !== "")) {
          $where[controlCalidadTableClass::FECHA] = array(
          date(config::getFormatTimestamp(), strtotime($filter['fecha1'])),
          date(config::getFormatTimestamp(), strtotime($filter['fecha2']))
          );
        }
        if (isset($filter['Variedad']) and $filter['Variedad'] !== null and $filter['Variedad'] !== "") {
          $where[controlCalidadTableClass::VARIEDAD] = $filter['Variedad'];
        }
        if (isset($filter['Edad']) and $filter['Edad'] !== null and $filter['Edad'] !== "") {
          $where[controlCalidadTableClass::EDAD] = $filter['Edad'];
        }
        if (isset($filter['Brix']) and $filter['Brix'] !== null and $filter['Brix'] !== "") {
          $where[controlCalidadTableClass::BRIX] = $filter['Brix'];
        }
        if (isset($filter['Ph']) and $filter['Ph'] !== null and $filter['Ph'] !== "") {
          $where[controlCalidadTableClass::PH] = $filter['Ph'];
        }
        if (isset($filter['Ar']) and $filter['Ar'] !== null and $filter['Ar'] !== "") {
          $where[controlCalidadTableClass::AR] = $filter['Ar'];
        }
        if (isset($filter['Sacarosa']) and $filter['Sacarosa'] !== null and $filter['Sacarosa'] !== "") {
          $where[controlCalidadTableClass::SACAROSA] = $filter ['Sacarosa'];
        }
        if (isset($filter['Pureza']) and $filter['Pureza'] !== null and $filter['Pureza'] !== "") {
          $where[controlCalidadTableClass::PUREZA] = $filter ['Sacarosa'];
        }
        if (isset($filter['Empleado']) and $filter['Empleado'] !== null and $filter['Empleado'] !== "") {
          $where[controlCalidadTableClass::EMPLEADO_ID] = $filter ['Empleado'];
        }
        if (isset($filter['Proveedor']) and $filter['Proveedor'] !== null and $filter['Proveedor'] !== "") {
          $where[controlCalidadTableClass::PROVEEDOR_ID] = $filter ['Provedor'];
        }
        session::getInstance()->setAttribute('controlCalidadIndexFilters', $where);
      } else if (session::getInstance()->hasAttribute('controlCalidadIndexFilters')) {
        $where = session::getInstance()->getAttribute('controlCalidadIndexFilters');
      }
            $fields = array(
                controlCalidadTableClass::ID,
                controlCalidadTableClass::FECHA,
                controlCalidadTableClass::VARIEDAD,
                controlCalidadTableClass::EDAD,
                controlCalidadTableClass::BRIX,
                controlCalidadTableClass::PH,
                controlCalidadTableClass::AR,
                controlCalidadTableClass::SACAROSA,
                controlCalidadTableClass::PUREZA,
                controlCalidadTableClass::EMPLEADO_ID,
                controlCalidadTableClass::PROVEEDOR_ID
            );
            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }
            $this->cntPages = controlCalidadTableClass:: getTotalPages(config::getRowGrid(), $where);
            $this->objControlCalidad = controlCalidadTableClass::getAll($fields, false, null, null, config::getRowGrid(), $page, $where);
            session::getInstance()->deleteAttribute('controlCalidadIndexFilters');
            $this->defineView('index', 'controlCalidad', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
