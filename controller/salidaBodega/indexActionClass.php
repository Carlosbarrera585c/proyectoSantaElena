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
 * @author Cristian Ramirez <ccristianramirezc@gmail.com>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
        
             $where = null;
          if (request::getInstance()->hasPost('filter')) {
        $filter = request::getInstance()->getPost('filter');
//aqui validar datos
        if ((isset($filter['fecha1']) and $filter['fecha1'] !== null and $filter['fecha1'] !== "") and (isset($filter['fecha2']) and $filter['fecha2'] !== null and $filter['fecha2'] !== "")) {
          $where[salidaBodegaTableClass::FECHA] = array(
          date(config::getFormatTimestamp(), strtotime($filter['fecha1'] . '00:00:00')),
          date(config::getFormatTimestamp(), strtotime($filter['fecha2'] . '23:59:59'))
          );
        }


      } else if (session::getInstance()->hasAttribute('salidaBodegaIndexFilters')) {
        $where = session::getInstance()->getAttribute('salidaBodegaIndexFilters');
      }
            $fields = array(
                salidaBodegaTableClass::ID,
                salidaBodegaTableClass::FECHA,
                salidaBodegaTableClass::PROVEEDOR_ID,
                salidaBodegaTableClass::EMPLEADO_ID
            );
            
            $orderBy = array(
                salidaBodegaTableClass::ID
            );
            
      $page = 0;
      if (request::getInstance()->hasGet('page')) {
        $this->page = request::getInstance()->getGet('page');
        $page = request::getInstance()->getGet('page') - 1;
        $page = $page * config::getRowGrid();
      }
      $this->cntPages = salidaBodegaTableClass:: getTotalPages(config::getRowGrid(), $where);
      $this->objSalidaBodega = salidaBodegaTableClass::getAll($fields, false, $orderBy, 'ASC', config::getRowGrid(), $page, $where);
      session::getInstance()->deleteAttribute('salidaBodegaIndexFilters');      
            $this->defineView('index', 'salidaBodega', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
