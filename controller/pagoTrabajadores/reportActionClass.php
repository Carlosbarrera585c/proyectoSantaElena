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
class reportActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      $where = NULL;
      if (request::getInstance()->hasPost('report')) {
        $report = request::getInstance()->getPost('report');

        if (isset($report['PeriodoInicio']) and $report['PeriodoInicio'] !== NULL and $report['PeriodoInicio'] !== '') {
          $where[pagoTrabajadoresTableClass::PERIODO_INICIO] = $report['PeriodoInicio'];
        }
        if (isset($report['PeriodoFin']) and $report['PeriodoFin'] !== NULL and $report['PeriodoFin'] !== '') {
          $where[pagoTrabajadoresTableClass::PERIODO_FIN] = $report['PeriodoFin'];
        }
        if (isset($report['ValorInicial']) and $report['ValorInicial'] !== NULL and $report['ValorInicial'] !== '') {
          $where[pagoTrabajadoresTableClass::VALOR] = $report['ValorInicial'];
        }
        if (isset($report['ValorFinal']) and $report['ValorFinal'] !== NULL and $report['ValorFinal'] !== '') {
          $where[pagoTrabajadoresTableClass::VALOR] = $report['ValorFinal'];
        }
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
          pagoTrabajadoresTableClass::VALOR,
          pagoTrabajadoresTableClass::EMPLEADO_ID
      );
      $this->objPagoTrabajadores = pagoTrabajadoresTableClass::getAll($fields, FALSE, $orderBy, 'ASC', NULL, NULL, $where);
      $this->defineView('index', 'pagoTrabajadores', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
