<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Pago Trabajadores
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      $where = null;
      if (request::getInstance()->hasPost('filter') and request::getInstance()->isMethod('POST')) {
        $filter = request::getInstance()->getPost('filter');
        if ((isset($filter['fecha1']) and $filter['fecha1'] !== null and $filter['fecha1'] !== "") and ( isset($filter['fecha2']) and $filter['fecha2'] !== null and $filter['fecha2'] !== "")) {
          $where[pagoTrabajadoresTableClass::FECHA] = array(
              date(config::getFormatTimestamp(), strtotime($filter['fecha1'] . '00:00:00')),
              date(config::getFormatTimestamp(), strtotime($filter['fecha2'] . '23:59:59'))
          );
        }
        if ((isset($filter['fechaInicio1']) and $filter['fechaInicio1'] !== null and $filter['fechaInicio1'] !== "") and ( isset($filter['fechaInicio2']) and $filter['fechaInicio2'] !== null and $filter['fechaInicio2'] !== "")) {
          $where[pagoTrabajadoresTableClass::PERIODO_INICIO] = array(
              date(config::getFormatTimestamp(), strtotime($filter['fechaInicio1'] . '00:00:00')),
              date(config::getFormatTimestamp(), strtotime($filter['fechaInicio2'] . '23:59:59'))
          );
        }
        if ((isset($filter['fechaFin1']) and $filter['fechaFin1'] !== null and $filter['fechaFin1'] !== "") and ( isset($filter['fechaFin2']) and $filter['fechaFin2'] !== null and $filter['fechaFin2'] !== "")) {
          $where[pagoTrabajadoresTableClass::PERIODO_FIN] = array(
              date(config::getFormatTimestamp(), strtotime($filter['fechaFin1'] . '00:00:00')),
              date(config::getFormatTimestamp(), strtotime($filter['fechaFin2'] . '23:59:59'))
          );
        }

        //aqui validar datos
        session::getInstance()->setAttribute('pagoTrabajadoresIndexFilters', $where);
      } else if (session::getInstance()->hasAttribute('pagoTrabajadoresIndexFilters')) {
        $where = session::getInstance()->getAttribute('pagoTrabajadoresIndexFilters');
      }
      $orderBy = array(
          pagoTrabajadoresTableClass::ID
      );
      $fields = array(
          pagoTrabajadoresTableClass::ID,
          pagoTrabajadoresTableClass::FECHA,
          pagoTrabajadoresTableClass::PERIODO_INICIO,
          pagoTrabajadoresTableClass::PERIODO_FIN,
          pagoTrabajadoresTableClass::TIPO_PAGO_ID,
          pagoTrabajadoresTableClass::VALOR
      );
      $page = 0;
      if (request::getInstance()->hasGet('page')) {
        $this->page = request::getInstance()->getGet('page');
        $page = request::getInstance()->getGet('page') - 1;
        $page = $page * config::getRowGrid();
      }
      $this->cntPages = pagoTrabajadoresTableClass::getTotalPages(config::getRowGrid(), $where);
      $this->objPagoTrabajadores = pagoTrabajadoresTableClass::getAll($fields, false, $orderBy, 'ASC', config::getRowGrid(), $page, $where);
      session::getInstance()->deleteAttribute('pagoTrabajadoresIndexFilters');
      $this->defineView('index', 'pagoTrabajadores', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
